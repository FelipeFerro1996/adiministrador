<?php

namespace App\Providers;

use App\Models\Pet;
use App\Models\Procedimento;
use Illuminate\Support\ServiceProvider;

class ServiceProcedimento extends ServiceProvider
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

    static function getAllProcedimentosByBusca($request=NULL){
        $procedimentos = new Procedimento();

        if(!empty($request->descricao)){
            $procedimentos = $procedimentos->where('descricao', 'LIKE', '%'.$request->descricao.'%');
        }
        
        if(!empty($request->pet_id)){
            $procedimentos = $procedimentos->where('pet_id', '=', $request->pet_id);
        }

        if(!empty($request->data_inicio)){
            $procedimentos = $procedimentos->where('data_procedimento', '>=', $request->data_inicio);
        }

        if(!empty($request->data_fim)){
            $procedimentos = $procedimentos->where('data_procedimento', '<=', $request->data_fim);
        }

        $procedimentos = $procedimentos->orderBy('status');
        return $procedimentos->paginate(10);

    }

    static function getProcedimentosByIdPet($id_pet=NULL){
        $procedimentos = new Procedimento();
        $procedimentos = $procedimentos->where('pet_id', '=', $id_pet);
        $procedimentos = $procedimentos->orderBy('status');
        return $procedimentos->paginate(10);
    }

    static function insertUpdateProcedimento($request=NULL, $id=NULL){

        $procedimento = new Procedimento();

        if(!empty($id)){
            $procedimento = $procedimento->find($id);
        }

        $procedimento->descricao = $request->descricao;
        $procedimento->data_procedimento = $request->data_procedimento;
        $procedimento->valor = floatval(str_replace(',', '', $request->valor));
        $procedimento->status = !empty($request->status) ? 1 : 0;
        $procedimento->pet_id = $request->id_pet;

        $procedimento->save();

        return $procedimento;

    }

    static function marcarRealizado($id=NULL){

        $procedimento = new Procedimento();
        $procedimento = $procedimento->find($id);
        $procedimento->status = 1;
        $procedimento->save();
        return $procedimento;

    }

    static function desmarcarRealizado($id=NULL){

        $procedimento = new Procedimento();
        $procedimento = $procedimento->find($id);
        $procedimento->status = 0;
        $procedimento->save();
        return $procedimento;

    }

    static function getProcedimentoById($id=NULL){
        $procedimento = new Procedimento();
        $procedimento = $procedimento->find($id);
        return $procedimento;
    }

    static function deleteProcedimento($id = NULL){
        $procedimento = new Procedimento();
        $procedimento = $procedimento->find($id);
        return $procedimento->delete();
    }
}
