@extends('layouts.main')

@section('title', 'cadastro contas')

@section('header')
    @include('componentes.cabecalhoPagina', ['titulo'=>'Contas', 'subtitulo'=>'Cadastro'])
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <form action="{{route('insertConta')}}" method="post">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-12">
                            @include('componentes.campoDinamicoComponente', [
                                'label_descricao'=>'Descrição',
                                'id_name'=>'descricao',
                                'required'=>'required',
                                'tipo'=>'input',
                                'type'=>'text',
                                'campo_descricao'=>'descricao',
                                'class_campo'=>($errors->has('descricao')?'is-invalid':''),
                                'mensagem'=>($errors->has('descricao')?$errors->first('descricao'):''),
                            ])
                        </div>
                    </div>
        
                    <div class="row mt-2">
                        <div class="col-md-6">
                            @include('componentes.campoDinamicoComponente', [
                                'label_descricao'=>'Tipo Conta',
                                'id_name'=>'tipo_conta',
                                'required'=>'required',
                                'tipo'=>'select',
                                'objeto'=>$tipo_conta,
                                'value'=>(old('tipo_conta')??''),
                                'campo_valor'=>'id',
                                'campo_descricao'=>'descricao',
                                'class_campo'=>($errors->has('tipo_conta')?'is-invalid':''),
                                'mensagem'=>($errors->has('tipo_conta')?$errors->first('tipo_conta'):''),
                            ])
                        </div>
                    </div>
        
                    <div class="row mt-3">
                        <div class="col-md-2 col-sm-12">
                            <button type="submit" class="btn btn-success w-100">Cadastrar</button>
                        </div>
                    </div>
        
                </form>
            </div>
        </div>
    </div>
</div>

@endsection