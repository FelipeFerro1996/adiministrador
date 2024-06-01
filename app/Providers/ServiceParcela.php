<?php

namespace App\Providers;

use App\Models\Conta;
use App\Models\Parcela;
use Illuminate\Support\Facades\DB;
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

        try {
            // Iniciando a transação
            DB::beginTransaction();

            
            $conta = Conta::find($request->conta_id);
            
            $totalParcela = floatval(str_replace(',', '', $request->valor_parcela));
            $conta->total = $conta->total+($totalParcela*$request->parcelas);
            $conta->parcelas = $conta->parcelas+$request->parcelas;
            // dd($conta->total);
            $conta->save();

            $proximaParcela = ServiceParcela::getProximaParcela($conta->id);

            $data = explode('-', $request->Mes_Primeiro_vencimento);
            $mes = $data[1];
            $ano = $data[0];

            $m = $mes;
        
            for($i=0; $i<$request->parcelas; $i++){

                $proximaParcela++;
    
                $parcela = new Parcela();
                $parcela->conta_id = $request->conta_id;
                $parcela->valor = $totalParcela;
                $parcela->total_pago = 0;
                $parcela->status = 1;
                $parcela->numero = $proximaParcela;
                $parcela->vencimento = $ano.'-'.( ($m<10) ? '0'.$m : $m).'-'.$request->dia_vencimento;
                $parcela->save();
    
                $m++;
    
                if($m>12){
                    $ano = $ano+1;
                    $m = 1;   
                }
            }
        
            // Se chegou até aqui sem erros, commita as alterações no banco de dados
            DB::commit();

            return true;
        
            // Redireciona ou retorna uma resposta de sucesso para o usuário
        } catch (\Exception $e) {
            // Caso ocorra algum erro, a transação será revertida e as alterações desfeitas
            DB::rollBack();

            return false;

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

    static function getProximaParcela($conta_id){
        $proxima = new Parcela();
        $proxima = $proxima->where('conta_id', $conta_id);
        $proxima = $proxima->max('numero');
        return $proxima;
    }

    static function getDadosParcelasDebitosGrafico($mes){
        $query = Parcela::query()
            ->leftJoin('contas', 'parcelas.conta_id', '=', 'contas.id')
            ->selectRaw('IF(`parcelas`.`status` = 2, "Contas Pagas", "Contas à pagar") as descricao, SUM(`parcelas`.`valor`) as soma_valor')
            ->where('parcelas.vencimento', 'LIKE', $mes.'%')
            ->where('contas.tipo', '2')
            ->groupBy('parcelas.status');

        // dd($query->toSql());
        
        $parcelas = $query->get();

        return $parcelas;
    }

    static function getParcelaByIdConta($id_conta){
        $parcelas = new Parcela();
        $parcelas = $parcelas->where('conta_id', $id_conta);
        return $parcelas->get();
    }

    static function removeParcela($id){
        $parcela = Parcela::find($id);
        return $parcela->delete();
    }

}
