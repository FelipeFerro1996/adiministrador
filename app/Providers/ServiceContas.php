<?php

namespace App\Providers;

use App\Models\Conta;
use App\Models\Parcela;
use Illuminate\Support\ServiceProvider;

class ServiceContas extends ServiceProvider
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

    static function getContasByBusca($request=NULL, $nao_paginar=NULL){
        $contas =  new Conta();
        
        if(!empty($nao_paginar)){
            $contas = $contas->get();
        }else{
            $contas = $contas->paginate(10);

            foreach($contas as &$conta){
                $conta->descricao_tipo = ($conta->tipo == 1 ? 'Crédito' : 'Débito');
                $conta->total_conta =' R$ '.number_format($conta->total, 2, '.', ',');
                $conta->botaoEditar = view('componentes.botaoEditarComponente', ['rota'=>route('editarConta',$conta->id)]);
            }
        }

        return $contas;
    }

    static function getTableHeaderContas(){
        $tableHead = [
            (object)[
                'campo'=>'descricao',
                'descricao'=>'Descrição',
            ],
            (object)[
                'campo'=>'descricao_tipo',
                'descricao'=>'Tipo Conta',
            ],
            (object)[
                'campo'=>'parcelas',
                'descricao'=>'Quantidade Parcelas',
            ],
            (object)[
                'campo'=>'total_conta',
                'descricao'=>'Total',
            ],
            (object)[
                'campo'=>'botaoEditar',
                'descricao'=>'Editar',
            ],
            // (object)[
            //     'campo'=>'botaoDelete',
            //     'descricao'=>'Excluir',
            // ],
        ];

        return $tableHead;
    }

    static function getContaById($id){

        $conta = Conta::find($id);
        return $conta;

    }

    static function insertUpdateConta($request=NULL, $id=NULL){

        if(!empty($id)){

            $conta = Conta::find($id);

        }else{

            $conta = new Conta();    

            $conta->parcelas = 0;
            $conta->total = 0;
        }
        
        $conta->descricao = $request->descricao;
        $conta->tipo = $request->tipo_conta;

        $conta->save();

        return $conta;

    }

    static function removeTodasParcelas($conta_id){
        $parcelas = new Parcela();
        $parcelas = $parcelas->where('conta_id', $conta_id)->get();
        return $parcelas->each->delete();
    }

    static function atualizaQuantidadeParcelasConta($conta_id){

        $totalParcelas = ServiceParcela::getProximaParcela($conta_id);

        $conta = Conta::find($conta_id);
        $conta->parcelas = $totalParcelas-1;
        $conta->save();

        return $conta;

    }

    static function atualizaParcelasByConta($conta_id){

        $parcelas = new Parcela();
        $parcelas = $parcelas->where('conta_id', $conta_id);
        $parcelas = $parcelas->orderBy('vencimento', 'ASC');
        $parcelas = $parcelas->get();

        foreach($parcelas as $key => &$parcela){
            $parcela->numero = $key+1;
            $parcela->save();
        }

        $conta = Conta::find($conta_id);
        $conta->parcelas = $parcelas->count();
        $conta->save();

    }
}
