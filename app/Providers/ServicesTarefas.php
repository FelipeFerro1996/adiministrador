<?php

namespace App\Providers;

use App\Models\Tarefa;
use Illuminate\Support\ServiceProvider;

class ServicesTarefas extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    static function getAllTarefas($request=NULL, $nao_paginar=NULL, $status=NULL){
        $tarefas = new Tarefa();

        if(!empty($status)){
            $tarefas = $tarefas->where('status', $status);
        }

        if(!empty($nao_paginar)){
            $tarefas = $tarefas->get();
        }else{

            $tarefas = $tarefas->paginate(10);
            
            foreach($tarefas as $tarefa){
                $tarefa->botaoEditar = view('componentes.botaoEditarComponente', ['rota'=>route('editarTarefa', [ 'id'=>$tarefa->id])]);
                $tarefa->botaoDelete = view('componentes.botaoDeleteComponente', ['rota'=>route('removeTarefa', ['id'=>$tarefa->id])]);
                $tarefa->botaoStatus = view('componentes.botaoStatusComponente', [
                    'rota' => route('alterarStatusTarefa', [
                        'id'=>$tarefa->id, 
                        'status'=>($tarefa->status == 1 ? 2 : 1)
                    ]), 
                    'type' => $tarefa->status
                ]);
            }

        }
        
        return $tarefas;
    }

    static function insertUpdateTarefa($request=NULL, $id=NULL){
        if(!empty($id)){
            $tarefa = Tarefa::find($id);
        }else{
            $tarefa = new Tarefa();
            $tarefa->status = 1;
        }

        $tarefa->descricao = $request->descricao;
        $tarefa->data_tarefa = $request->data_tarefa.' '.$request->hora_tarefa;
        $tarefa->save();

        return $tarefa;
    }

    static function getTarefaById($id){
        $tarefa = Tarefa::find($id);
        return $tarefa;
    }

    static function getTableHeader(){
        $tableHead = [
            (object)[
                'campo'=>'descricao',
                'descricao'=>'Descrição',
            ],
            (object)[
                'campo'=>'data_tarefa_data_formatada',
                'descricao'=>'Data',
            ],
            (object)[
                'campo'=>'data_tarefa_hora_formatada',
                'descricao'=>'Hora',
            ],
            (object)[
                'campo'=>'botaoEditar',
                'descricao'=>'Editar',
            ],
            (object)[
                'campo'=>'botaoStatus',
                'descricao'=>'Status',
            ],
            (object)[
                'campo'=>'botaoDelete',
                'descricao'=>'Excluir',
            ],
        ];

        return $tableHead;
    }

    static function removeTarefa($id){
        $tarefa = Tarefa::find($id);

        return $tarefa->delete();
    }

    static function marcarDesmarcarTarefaRealizada($id, $status){
        $tarefa = Tarefa::find($id);
        $tarefa->status = $status;
        return $tarefa->save();
    }
}
