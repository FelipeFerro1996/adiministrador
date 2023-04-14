<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParcelasRequest;
use App\Models\Conta;
use App\Models\Parcela;
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
        
        $conta = Conta::find($request->conta_id);
        
        $totalParcela = floatval(str_replace(',', '', $request->valor_parcela));
        $conta->total = $conta->total+($totalParcela*$request->parcelas);
        $conta->parcelas = $conta->parcelas+$request->parcelas;
        // dd($conta->total);
        $conta->save();

        $data = explode('-', $request->Mes_Primeiro_vencimento);
        $mes = $data[1];
        $ano = $data[0];

        for($i=0; $i<$request->parcelas; $i++){

            $parcela = new Parcela();
            $parcela->conta_id = $request->conta_id;
            $parcela->valor = $totalParcela;
            $parcela->total_pago = 0;
            $parcela->status = 1;
            $parcela->numero = $i+1;

            $m = (int)$mes+$i;
            if($m==13){
                $ano = $ano+1;
            }
            if($m>12){
                $m = $m-12;   
            }
            
            $parcela->vencimento = $ano.'-'.( ($m<10) ? '0'.$m : $m).'-'.$request->dia_vencimento;
    
            $parcela->save();
        }

        return redirect('/parcelas')->with(['msg' => 'Parcelas cadastradas com sucesso!', 'tipo' => 'success']);

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

        $query = Parcela::query()
            ->leftJoin('contas', 'parcelas.conta_id', '=', 'contas.id')
            ->select('parcelas.*', 'parcelas.id as parcela_id', 'contas.id as conta_id', )
            ->where('parcelas.vencimento', 'LIKE', $mes.'%')
            ->orderBy('contas.tipo', 'asc')
            ->orderBy('parcelas.status', 'desc')
            ->orderBy('parcelas.vencimento', 'desc');
        
        $parcelas = $query->paginate(10);
        

        return view('parcelas.parcelasMes', ['parcelas'=>$parcelas, 'mes'=> $mes]);

    }

    public function pagarParcela($id = NULL){
        $parcela = Parcela::find($id);
        $data = date('Y-m', strtotime($parcela->vencimento));
        $parcela->status = 2;
        $parcela->total_pago = $parcela->valor;
        $parcela->save();

        // return view('parcelas.index', ['mes_parcela'=>$data])->with(['msg' => 'Parcela paga!', 'tipo' => 'success']);
        return redirect('/parcelas')->with(['msg' => 'Parcela paga!', 'tipo' => 'success', 'mes_parcela' => $data]);
    }
}
