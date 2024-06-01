<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetsRequest;
use App\Models\Pet;
use App\Providers\ServiceEspecie;
use App\Providers\ServicePets;
use App\Providers\ServiceProcedimento;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $pets = ServicePets::getPetsByBusca($request);
        $tableHead = ServicePets::getPeTableHead();
        
        return view('pets.index', ['pets'=>$pets, 'request'=>$request, 'tableHead'=>$tableHead]);

    }

    public function create(){

        $especies = ServiceEspecie::getAllEspecies();

        return view('pets.cadastro', ['especies'=>$especies]);

    }

    public function store(PetsRequest $request){

        $pets = ServicePets::insertUpdatePet(request:$request);

        return redirect(route('listarPets'))->with(['sucesso'=>'Pet Cadastrado com sucesso']);
    }

    public function edit($id=NULL){

        $pet = ServicePets::getPetById(id:$id);
        $especies = ServiceEspecie::getAllEspecies();
        $procedimentos = ServiceProcedimento::getProcedimentosByIdPet($id);

        return view('pets.cadastro', ['pet'=>$pet, 'especies'=>$especies, 'procedimentos'=>$procedimentos]);

    }

    public function destroy($id){
        $pet = ServicePets::excluirPet($id);
        return redirect(route('listarPets'))->with(['sucesso'=>'Pet excluído com sucesso']);
    }

    public function update(PetsRequest $request, $id){
        $pet = ServicePets::insertUpdatePet(id:$id, request:$request);

        return redirect(route('editarPet', $pet->id))->with(['sucesso'=>'Pet atualizado com sucesso']);
    }
}
