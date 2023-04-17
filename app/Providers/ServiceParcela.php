<?php

namespace App\Providers;

use App\Models\Conta;
use App\Models\Parcela;
use Illuminate\Support\ServiceProvider;

class ServiceParcela extends ServiceProvider
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

    static function getParcelasMes($mes = NULL){

        $query = Parcela::query()
            ->leftJoin('contas', 'parcelas.conta_id', '=', 'contas.id')
            ->select('parcelas.*', 'parcelas.id as parcela_id', 'contas.id as conta_id', )
            ->where('parcelas.vencimento', 'LIKE', $mes.'%')
            ->orderBy('contas.tipo', 'asc')
            ->orderBy('parcelas.status', 'desc')
            ->orderBy('parcelas.vencimento', 'desc');
        
        $parcelas = $query->get();

        return $parcelas;
    }

    static function insertParcelas($request = NULL){

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

    }

    static function pagarParcela($id=NULL){

        $parcela = Parcela::find($id);
        $parcela->status = 2;
        $parcela->total_pago = $parcela->valor;
        $parcela->save();

        return $parcela;

    }

    static function getTotalParcelaByTipoConta($tipo=NULL, $mes=NULL){

        $totalParcela = Parcela::leftJoin('contas', 'parcelas.conta_id', '=', 'contas.id')
            ->where('parcelas.vencimento', 'LIKE', $mes.'%')
            ->where('contas.tipo', '=', $tipo)
            ->sum('parcelas.valor');

        return $totalParcela;

    }
}
