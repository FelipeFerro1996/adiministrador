@extends('layouts.main')

@section('title', 'Cadastrar Pet')

@section('content')

@include('componentes.cabecalhoPagina', ['titulo'=>'Pets', 'subtitulo'=>'Cadatro de Pets'])

<div class="row shadow-lg mt-2 p-2">
    <div class="col">
        <form action="{{!empty($pet)? '/pets/update/'.$pet->id : '/pets/cadastrar' }}" class="text-white" method="POST">
            @csrf
            @if(!empty($pet->id))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-12">
                    <label for="" class="form-label m-0">Nome</label>
                    <input type="text" class="form-control mb-2 {{$errors->has('nome')?'is-invalid':''}}" name="nome" id="nome" value="{{old('nome')??$pet->nome??''}}">
                    @error('nome')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="raca" class="form-label m-0">Raça</label>
                    <input type="text" class="form-control mb-2 {{$errors->has('raca')?'is-invalid':''}}" name="raca" id="raca" value="{{old('raca')??$pet->raca??''}}">
                    @error('raca')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="data_nascimento" class="form-label m-0">Data Nascimento</label>
                    <input type="date" class="form-control mb-2 {{$errors->has('data_nascimento')?'is-invalid':''}}" name="data_nascimento" id="data_nascimento" value="{{old('data_nascimento')??$pet->data_nascimento??''}}">
                    @error('data_nascimento')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">{{!empty($pet)?'Alterar':'Cadastrar'}}</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection