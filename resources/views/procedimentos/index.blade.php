@extends('layouts.main')

@section('title', 'Lista de Pets')

@section('content')

@include('componentes.cabecalhoPagina', ['titulo'=>'Procedimentos', 'subtitulo'=>'lista de Procedimentos', 'linkcadastro'=> '', 'onclick'=>'abrirModalcadastrarProcedimento()'])

<div class="row shadow-lg mt-2">
    <div class="col card text-white">
        <div class="card-header">
            Busca
        </div>
        <div class="card-body">
            <form action="/procedimentos" method="GET">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <label for="nome">Descrição</label>
                        <input type="text" name="descricao" class="form-control form-control-sm" value="{{$request->descricao??''}}">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="nome">Pet</label>
                        <select name="pet_id" id="pet_id" class="form-control select2">
                            <option value="">Selecione</option>
                            @foreach($pets as &$pet)
                                <option value="{{$pet->id}}" {{$request->pet_id == $pet->id ? 'selected' : ''}}>{{$pet->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="data_inicio">Data Inicio</label>
                        <input type="date" name="data_inicio" class="form-control form-control-sm" value="{{$request->data_inicio??''}}">
                    </div>
                    <div class="col-md-6 p-2">
                        <label for="data_fim">Data Fim</label>
                        <input type="date" name="data_fim" class="form-control form-control-sm" value="{{$request->data_fim??''}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-success btn-sm" type="submit">Buscar</button>
                        <a href="/procedimentos" class="btn btn-sm btn-warning" type="button">Limpar</a>
                    </div>
                </div>
            </form> 
        </div>
    </div>
</div>

@include('procedimentos.listaProcedimento')

@section('javascript')
    <script src="{{asset('js/pets/listaPet.js')}}"></script>
@endsection

@endsection