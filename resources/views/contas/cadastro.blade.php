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
                            <label for="descricao" class="form-label m-0">Descrição</label>
                            <input type="text" class="form-control {{$errors->has('descricao')?'is-invalid':''}}" id="descricao" name="descricao" value="{{old('descricao')}}"> 
                            @error('descricao')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
        
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="tipo_conta" class="form-label m-0">Tipo Conta</label>
                            <select name="tipo_conta" class="form-select {{$errors->has('tipo_conta')?'is-invalid':''}}" id="tipo_conta">
                                <option value="">Selecione</option>
                                <option value="1" {{(old('tipo_conta') == 1 ? 'selected' : '')}}>Crédito</option>
                                <option value="2" {{(old('tipo_conta') == 2 ? 'selected' : '')}}>Débito</option>
                            </select>
                            @error('tipo_conta')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
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