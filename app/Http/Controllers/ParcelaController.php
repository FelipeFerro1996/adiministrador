<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcelasRequest;
use App\Models\Conta;
use App\Models\Parcela;
use App\Providers\ServiceParcela;
use Illuminate\Http\Request;

class ParcelaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        return view('parcelas.index');

    }

    public function store(ParcelasRequest $request){

        $parcela = ServiceParcela::insertParcelas($request);

        return redirect('/parcelas')->with(['sucesso' => 'Parcelas cadastradas com sucesso!']);

    }

    public function create($tipo=NULL){

        $contas = Conta::where('tipo', '=', $tipo)->get();

        $subitulo = ($tipo == 1) ? 'Cadastro de crédito' : 'Cadastro de Parcelas' ;

        return view('parcelas.cadastro', ['contas'=>$contas, 'subitulo'=>$subitulo]);

    }

    public function getCadastroParcelaByTipo($tipo=NULL){

        // dd($tipo);

        if($tipo == 1){
            $contas = Conta::where('tipo', '=', '1')->get();

            return view('parcelas.formCadastroCredito', ['contas'=>$contas]);
        }else{
            $contas = Conta::where('tipo', '=', '2')->get();

            return view('parcelas.formCadastroDebito', ['contas'=>$contas]);
        }

    }

    public function meselecionado($mes=null){

        $parcelas = ServiceParcela::getParcelasMes($mes);
        
        $totalDebitos = ServiceParcela::getTotalParcelaByTipoConta('2', $mes);
        $totalCreditos = ServiceParcela::getTotalParcelaByTipoConta('1', $mes);

        return view('parcelas.parcelasMes', ['parcelas'=>$parcelas, 'mes'=> $mes, 'totalDebitos'=>$totalDebitos, 'totalCreditos'=>$totalCreditos]);

    }

    public function pagarParcela($id = NULL){
        
        $parcela = ServiceParcela::pagarParcela($id);

        $data = date('Y-m', strtotime($parcela->vencimento));

        return redirect('/parcelas')->with(['sucesso' => 'Parcela paga!', 'mes_parcela' => $data]);
    }
}
