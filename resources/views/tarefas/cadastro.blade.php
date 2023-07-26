@extends('layouts.main')

@section('title', 'Cadastro Tarefas')

@section('header')
<div class="row ">
    <div class="col-md-10 d-flex justify-content-between p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Taefas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{!empty($tarefa->id) ? route('updateTarefa', $tarefa->id) : route('insertTarefa')}}" method="POST">
                @csrf
                @if(!empty($tarefa->id))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-6 p-2">
                        @include('componentes.campoDinamicoComponente', [
                            'label_descricao'=>'Descrição',
                            'id_name'=>'descricao',
                            'required'=>'required',
                            'tipo'=>'input',
                            'type'=>'text',
                            'value'=>($tarefa->descricao??old('descricao')??''),
                            'class_campo'=>($errors->has('descricao')?'is-invalid':''),
                            'mensagem'=>($errors->has('descricao')?$errors->first('descricao'):''),
                        ])
                    </div>
                    <div class="col-md-4 p-2">
                        @include('componentes.campoDinamicoComponente', [
                            'label_descricao'=>'Data',
                            'id_name'=>'data_tarefa',
                            'required'=>'required',
                            'tipo'=>'input',
                            'type'=>'date',
                            'value'=>(old('data_tarefa')??((!empty($tarefa->data_tarefa) ? date('Y-m-d', strtotime($tarefa->data_tarefa)) : '' ))),
                            'class_campo'=>($errors->has('data_tarefa')?'is-invalid':''),
                            'mensagem'=>($errors->has('data_tarefa')?$errors->first('data_tarefa'):''),
                        ])
                    </div>
                    <div class="col-md-2 p-2">
                        @include('componentes.campoDinamicoComponente', [
                            'label_descricao'=>'Hora',
                            'id_name'=>'hora_tarefa',
                            'required'=>'required',
                            'tipo'=>'input',
                            'type'=>'time',
                            'value'=>(old('hora_tarefa')??(!empty($tarefa->data_tarefa) ? date('H:i:s', strtotime($tarefa->data_tarefa)) : '' )),
                            'class_campo'=>($errors->has('hora_tarefa')?'is-invalid':''),
                            'mensagem'=>($errors->has('hora_tarefa')?$errors->first('hora_tarefa'):''),
                        ])
                    </div>
                </div>
                <div class="row">
                    <div class="col p-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i>
                            Salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection