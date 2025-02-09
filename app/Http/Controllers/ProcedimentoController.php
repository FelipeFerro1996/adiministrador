<?php

namespace App\Http\Controllers;

use App\Providers\ServicePets;
use App\Providers\ServiceProcedimento;
use Illuminate\Http\Request;

class ProcedimentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $descricao_procedimentos = ServiceProcedimento::getDescricoesAgrupadas();

        return view('procedimentos.formCadastroProcedimento', [
            'pet'=>$pet, 
            'pets'=>$pets,
            'descricao_procedimentos'=>$descricao_procedimentos??[]
        ]);

    } 


    public function edit($id=NULL){
        $procedimento = ServiceProcedimento::getProcedimentoById($id);
        $pet = ServicePets::getPetById($procedimento->pet_id);

        $pets = ServicePets::getPetsByBusca(nao_paginar:1);
        $descricao_procedimentos = ServiceProcedimento::getDescricoesAgrupadas();

        return view('procedimentos.formCadastroProcedimento', [
            'pet'=>$pet, 
            'procedimento'=>$procedimento, 
            'pets'=>$pets,
            'descricao_procedimentos'=>$descricao_procedimentos
        ]);

    }

    public function store(Request $request){
        // dd($request);
        $procedimento = ServiceProcedimento::insertUpdateProcedimento($request);

        return back()->with(['sucesso'=>'Procedimento cadastrado com sucesso!','procedimento'=>1]);

    }

    public function update($id=NULL, Request $request){

        $procedimento = ServiceProcedimento::insertUpdateProcedimento($request, $id);

        return back()->with(['sucesso'=>'Procedimento alterado com sucesso!','procedimento'=>1]);
    }

    public function marcarRealizado($id = NULL){

        $procedimento = ServiceProcedimento::marcarRealizado($id);

        return back()->with(['sucesso'=>'Procedimento realizado com sucesso!','procedimento'=>1]);
    }

    public function desmarcarRealizado($id = NULL){

        $procedimento = ServiceProcedimento::desmarcarRealizado($id);
        return back()->with(['sucesso'=>'Procedimento não realizado!','procedimento'=>1]);
    }

    public function destroy($id=NULL){
        $procedimento = ServiceProcedimento::deleteProcedimento($id);

        if(!empty($procedimento)){
            return back()->with(['sucesso'=>'Procedimento excluído com sucesso!','procedimento'=>1]);
        }else{
            return back()->with(['sucesso'=>'Erro ao excluir o procedimento!','procedimento'=>1]);
        }
        
    }
}
