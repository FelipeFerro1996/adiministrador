<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContasRequest;
use App\Models\Conta;
use App\Models\Parcela;
use App\Providers\ServiceContas;
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

        return view('contas.cadastro');
        
    }

    public function store(ContasRequest $request){
    
        $conta = new Conta();
        $conta->descricao = $request->descricao;
        $conta->tipo = $request->tipo_conta;
        $conta->parcelas = 0;
        $conta->total = 0;

        $conta->save();

        return redirect('/contas')->with(['msg' => 'Conta cadastrado com sucesso!', 'tipo' => 'success']);

    }
}
