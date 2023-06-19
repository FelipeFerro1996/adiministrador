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
        $pets->sexo = $request->sexo;
        $pets->especie_id = $request->especie;

        $pets->save();

        return $pets;
    }

    static function getPetById($id = NULL){
        $pet = Pet::find($id);
        return $pet;
    }

    static function getPetsByBusca($request=NULL, $nao_paginar=NULL){

        $pets = new Pet();

        if(!empty($request->nome)){
            $pets = $pets->where('nome', 'LIKE', '%'.$request->nome.'%');
        }

        if(!empty($request->raca)){
            $pets = $pets->where('raca', 'LIKE', '%'.$request->raca.'%');
        }

        if(!empty($request->data_nascimento)){
            $pets = $pets->where('data_nascimento', '=', $request->data_nascimento);
        }
        if(!empty($nao_paginar)){
            $pets = $pets->get();
        }else{
            $pets = $pets->paginate(10);

            foreach($pets as &$pet){
                $pet->botaoEditar = view('componentes.botaoEditarComponente', ['rota'=>route('editarPet', [ 'id'=>$pet->id])]);
                $pet->botaoDelete = view('componentes.botaoDeleteComponente', ['rota'=>route('removePet', ['id'=>$pet->id])]);
                $pet->especie = $pet->especie->descricao;
                $pet->data_nascimento = date('d/m/Y', strtotime($pet->data_nascimento));
            }

        }

        return $pets;

    }

    static function excluirPet($id=NULL){
        $pet = Pet::findOrFail($id);
        $pet->delete();
    }

    static function getPeTableHead(){
        $tableHead = [
            (object)[
                'campo'=>'nome',
                'descricao'=>'Nome',
            ],
            (object)[
                'campo'=>'especie',
                'descricao'=>'Espécie',
            ],
            (object)[
                'campo'=>'raca',
                'descricao'=>'Raça',
            ],
            (object)[
                'campo'=>'data_nascimento',
                'descricao'=>'Data Nascimento',
            ],
            (object)[
                'campo'=>'botaoEditar',
                'descricao'=>'Editar',
            ],
            (object)[
                'campo'=>'botaoDelete',
                'descricao'=>'Excluir',
            ],
        ];

        return $tableHead;
    }
}
