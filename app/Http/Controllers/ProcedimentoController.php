<?php

namespace App\Http\Controllers;

use App\Providers\ServicePets;
use App\Providers\ServiceProcedimento;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{
    public function index(Request $request){
        $procedimentos = ServiceProcedimento::getAllProcedimentosByBusca($request);
        $pets = ServicePets::getPetsByBusca(nao_paginar:1);

        $dados = [
            'procedimentos'=>$procedimentos, 
            'request'=>$request,
            'pets'=>$pets
        ];

        return view('procedimentos.index', $dados);
    }

    public function create($id_pet=NULL){
        // dd($id_pet);
        if(!empty($id_pet)){
            $pet = ServicePets::getPetById($id_pet);
        }else{
            $pet = '';
        }
        
        $pets = ServicePets::getPetsByBusca(nao_paginar:1);

        return view('procedimentos.formCadastroProcedimento', ['pet'=>$pet, 'pets'=>$pets]);

    } 


    public function edit($id=NULL){
        $procedimento = ServiceProcedimento::getProcedimentoById($id);
        $pet = ServicePets::getPetById($procedimento->pet_id);

        return view('procedimentos.formCadastroProcedimento', ['pet'=>$pet, 'procedimento'=>$procedimento]);

    }

    public function store(Request $request){
        // dd($request);
        $procedimento = ServiceProcedimento::insertUpdateProcedimento($request);

        return back()->with(['msg'=>'Procedimento cadastrado com sucesso!','procedimento'=>1]);

    }

    public function update($id=NULL, Request $request){

        $procedimento = ServiceProcedimento::insertUpdateProcedimento($request, $id);

        return back()->with(['msg'=>'Procedimento alterado com sucesso!','procedimento'=>1]);
    }

    public function marcarRealizado($id = NULL){

        $procedimento = ServiceProcedimento::marcarRealizado($id);

        return back()->with(['msg'=>'Procedimento realizado com sucesso!','procedimento'=>1]);
    }

    public function desmarcarRealizado($id = NULL){

        $procedimento = ServiceProcedimento::desmarcarRealizado($id);
        return back()->with(['msg'=>'Procedimento não realizado!','procedimento'=>1]);
    }

    public function destroy($id=NULL){
        $procedimento = ServiceProcedimento::deleteProcedimento($id);

        if(!empty($procedimento)){
            return back()->with(['msg'=>'Procedimento excluído com sucesso!','procedimento'=>1]);
        }else{
            return back()->with(['msg'=>'Erro ao excluir o procedimento!','procedimento'=>1]);
        }
        
    }
}
