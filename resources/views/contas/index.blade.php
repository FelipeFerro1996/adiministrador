@extends('layouts.main')

@section('title', 'home')

@section('header')
<div class="row ">
    <div class="col-md-10 d-flex justify-content-between p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Contas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listagem Contas</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-2 p-1">
        <a href={{route('cadastroConta')}} class="btn btn-primary w-100 btn-sm">
            <i class="fa-solid fa-plus fa-lg" title="Cadastrar Cona
            "></i>
            Novo
        </a>
    </div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        @include('componentes.tabelaComponente', ['tableHead'=> $tableHead, 'objetos'=>$contas])
    </div>
</div>

@endsection