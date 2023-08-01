<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContasRequest;
use App\Models\Conta;
use App\Models\Parcela;
use App\Providers\ServiceContas;
use App\Providers\ServiceParcela;
use App\Providers\ServicesContas;
use Illuminate\Http\Request;

class ContaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        // $contas = Conta::query()->paginate(10);
        $contas = ServiceContas::getContasByBusca();
        $tableHead = ServiceContas::getTableHeaderContas();

        return view('contas.index', ['contas' => $contas, 'tableHead'=>$tableHead]);

    }

    public function create(){

        $tipo_conta = array(
            (object)[
                'id'=>'1',
                'descricao'=>'Crédito'
            ],
            (object)[
                'id'=>'2',
                'descricao'=>'Débito'
            ]
        );

        return view('contas.cadastro', ['tipo_conta'=>$tipo_conta]);
        
    }

    public function store(ContasRequest $request){
    
        $conta = ServiceContas::insertUpdateConta($request);

        if(!empty($conta->id)){
            return redirect(route('editarConta', $conta->id))->with(['sucesso' => 'Conta cadastrado com sucesso!']);
        }

        return back()->with(['erro' => 'Erro ao cadastrar a conta!']);

    }

    public function edit($id){

        $conta = ServiceContas::getContaById($id);

        $parcelas = ServiceParcela::getParcelaByIdConta($conta->id);

        $tipo_conta = array(
            (object)[
                'id'=>'1',
                'descricao'=>'Crédito'
            ],
            (object)[
                'id'=>'2',
                'descricao'=>'Débito'
            ]
        );

        $dados = [
            'conta'=>$conta,
            'parcelas'=>$parcelas,
            'tipo_conta'=>$tipo_conta
        ];

        return view('contas.cadastro', $dados);

    }

    public function update($id, ContasRequest $request){

        $conta = ServiceContas::insertUpdateConta($request, $id);

        if(!empty($conta->id)){
            return redirect(route('editarConta', $conta->id))->with(['sucesso' => 'Conta atualizada com sucesso!']);
        }

        return back()->with(['erro' => 'Erro ao atualizar a conta!']);

    }

    public function removeTodasParcelas($id){
        $return = ServiceContas::removeTodasParcelas($id);

        if($return){

            $conta = ServiceContas::atualizaParcelasByConta($id);

            return back()->with(['sucesso' => 'Parcelas removidas com sucesso!']);
        }

        return back()->with(['erro' => 'Erro ao remover as parcelas!']);

    }
}
