@extends('layouts.main')

@section('title', 'Lista de Tarefas')

@section('header')
<div class="row ">
    <div class="col-md-10 d-flex justify-content-between p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tarefas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listagem de Tarefas</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-2 p-1">
        <a href={{route('cadastroTarefa')}} title="Cadastrar Pet
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
            <div class="row">
                <div class="col table-responsive">
                    @include('componentes.tabelaComponente',['objetos'=>$tarefas, 'tableHead'=>$tableHead])
                </div>
            </div>
            {{-- <div class="row">
                <div class="col">
                    <ul class="list-group list-group-flush">
                        @forelse ($tarefas as $tarefa)
                            <li class="list-group-item d-flex justify-content-between align-items-center">      
                                <div>
                                    {!!$tarefa->descricao.($tarefa->status == 1 ? ' <span class="text-danger">(pendente)</span>' : ' <span class="text-success">(realizada)</span>')!!}
                                </div>
                                <div>
                                    <i class="fa-regular fa-square-check text-success"></i>
                                    <i class="fa-solid fa-trash-can text-danger cursor-pointer"></i>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">Nenuma Tarefa cadastrada</li>
                        @endforelse
                        
                    </ul>
                </div>
            </div> --}}
        </div>
    </div>
@endsection