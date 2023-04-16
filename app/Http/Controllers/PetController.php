<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetsRequest;
use App\Models\Pet;
use App\Providers\ServicePets;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){

        $pets = ServicePets::getPetsByBusca($request);
        
        return view('pets.index', ['pets'=>$pets]);

    }

    public function create(){

        return view('pets.cadastro');

    }

    public function store(PetsRequest $request){

        $pets = ServicePets::insertUpdatePet(request:$request);

        return redirect('/pets')->with(['msg'=>'Pet Cadastrado com sucesso']);
    }

    public function edit($id=NULL){

        $pet = ServicePets::getPetById(id:$id);

        return view('pets.cadastro', ['pet'=>$pet]);

    }

    public function destroy($id){
        $pet = ServicePets::excluirPet($id);
        return redirect('/pets')->with(['msg'=>'Pet excluído com sucesso']);
    }

    public function update(PetsRequest $request, $id){
        $pet = ServicePets::insertUpdatePet(id:$id, request:$request);

        return redirect('/pets/'.$id)->with(['msg'=>'Pet atualizado com sucesso']);
    }
}
