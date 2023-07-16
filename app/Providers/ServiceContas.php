<?php

namespace App\Providers;

use App\Models\Conta;
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
            // (object)[
            //     'campo'=>'botaoEditar',
            //     'descricao'=>'Editar',
            // ],
            // (object)[
            //     'campo'=>'botaoDelete',
            //     'descricao'=>'Excluir',
            // ],
        ];

        return $tableHead;
    }
}
