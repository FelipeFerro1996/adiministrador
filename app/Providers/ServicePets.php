<?php

namespace App\Providers;

use App\Models\Pet;
use Illuminate\Support\ServiceProvider;

class ServicePets extends ServiceProvider
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

    static function insertUpdatePet($request = NULL, $id = NULL){
        
        if(!empty($id)){
            $pets = Pet::find($id);
        }else{
            $pets = new Pet();
        }

        $pets->nome = $request->nome;
        $pets->raca = $request->raca;
        $pets->data_nascimento = $request->data_nascimento;

        $pets->save();

        return $pets;
    }

    static function getPetById($id = NULL){
        $pet = Pet::find($id);
        return $pet;
    }

    static function getPetsByBusca($request=NULL){

        $pets = new Pet();

        $pets = $pets->paginate(2);

        return $pets;

    }

    static function excluirPet($id=NULL){
        $pet = Pet::findOrFail($id);
        $pet->delete();
    }
}
