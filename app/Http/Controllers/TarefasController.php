<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\ServicesTarefas;
use Illuminate\Http\Request;

class TarefasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $tarefas = ServicesTarefas::getAllTarefas();
        $tableHead = ServicesTarefas::getTableHeader();

        $dados = [
            'tarefas'=>$tarefas,
            'tableHead'=>$tableHead
        ];
        return view('tarefas.index', $dados);
    }

    public function create(){
        return view('tarefas.cadastro');
    }

    public function store(Request $request){
        $tarefa = ServicesTarefas::insertUpdateTarefa($request);
        if(!empty($tarefa->id)){
            return redirect(route('listarTarefas'))->with('sucesso', 'Tarefa incluida com sucesso');
        }

        return back()->with('erro', 'Erro ao incluir a tarefa');
    }

    public function edit($id){
        $tarefa = ServicesTarefas::getTarefaById($id);

        $dados = [
            'tarefa'=>$tarefa
        ];

        return view('tarefas.cadastro', $dados);

    }

    public function update($id, Request $request){

        $tarefa = ServicesTarefas::insertUpdateTarefa($request, $id);

        if(!empty($tarefa->id)){
            return redirect(route('listarTarefas'))->with('sucesso', 'Tarefa atualizada com sucesso');
        }

        return back()->with('erro', 'Erro ao atualizar a tarefa');

    }

    public function destroy($id){
        $return = ServicesTarefas::removeTarefa($id);

        if($return){
            return redirect(route('listarTarefas'))->with('sucesso', 'Tarefa removida com sucesso');
        }else{
            return back()->with('erro', 'Erro ao remover a tarefa');
        }
    }

    public function marcarDesmarcarTarefaRealizada($id = NULL, $status=NULL){

        $return = ServicesTarefas::marcarDesmarcarTarefaRealizada($id, $status);

        if($return){

            return back()->with(['sucesso'=>'Tarefa '.($status == 1 ? 'Desmarcada' : 'Marcada').' como realizada!']);
        }

        return back()->with(['erro'=>'Erro ao alterar o status da tarefa!']);
    }
}
