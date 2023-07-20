@extends('layouts.main')

@section('title', 'Lista de Pets')

@section('header')
<div class="row ">
    <div class="col-md-10 d-flex justify-content-between p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pets</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listagem Pets</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-2 p-1">
        <a href={{route('cadastroPet')}} title="Cadastrar Pet
        " class="btn btn-primary w-100 btn-sm">
            <i class="fa-solid fa-plus fa-lg" ></i>
            Novo
        </a>
    </div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-body">

        <div class="accordion mt-2 mb-2" id="accordionBuscaPet">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button {{!empty($request->busca)?'':'collapsed'}} p-2" type="button" data-bs-toggle="collapse" data-bs-target="#buscaPet" aria-expanded="{{!empty($request->busca)?'true':'false'}}" aria-controls="buscaPet">
                    Busca
                    </button>
                </h2>
                <div id="buscaPet" class="accordion-collapse {{!empty($request->busca)?'':'collapse'}}" data-bs-parent="#accordionBuscaPet">
                    <div class="accordion-body">
                        <form action="{{route('listarPets')}}" method="GET">
                            <input type="hidden" value="1" name="busca">
                            <div class="row">
                                <div class="col-md-12 p-1">
                                    @include('componentes.campoDinamicoComponente', [
                                        'label_descricao'=>'Nome',
                                        'id_name'=>'nome',
                                        'required'=>'',
                                        'tipo'=>'input',
                                        'type'=>'text',
                                        'value'=>$request->nome??''
                                    ])
                                </div>
                                <div class="col-md-6 p-1">
                                    @include('componentes.campoDinamicoComponente', [
                                        'label_descricao'=>'Raça',
                                        'id_name'=>'raca',
                                        'required'=>'',
                                        'tipo'=>'input',
                                        'type'=>'text',
                                        'value'=>$request->raca??''
                                    ])
                                </div>
                                <div class="col-md-6 p-1">
                                    @include('componentes.campoDinamicoComponente', [
                                        'label_descricao'=>'Raça',
                                        'id_name'=>'data_nascimento',
                                        'required'=>'',
                                        'tipo'=>'input',
                                        'type'=>'date',
                                        'value'=>$request->data_nascimento??''
                                    ])
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button class="btn btn-success btn-sm" type="submit">Buscar</button>
                                    <a href="{{route('listarPets')}}" class="btn btn-sm btn-warning" type="button">Limpar</a>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col table-responsive">
                @include('componentes.tabelaComponente',['objetos'=>$pets, 'tableHead'=>$tableHead])
            </div>
        </div>

    </div>
</div>

{{-- <!-- Modal -->
<div class="modal fade" id="cadastrarProcedimento" tabindex="-1" aria-labelledby="cadastrarProcedimentoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg bg-warning">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cadastrarProcedimentoLabel">Cadastrar Procedimento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="conteudoCadastroProcedimento">
               
            </div>
        </div>
    </div>
</div> --}}

@section('javascript')
    <script src="{{asset('js/pets/listaPet.js')}}"></script>
@endsection

@endsection