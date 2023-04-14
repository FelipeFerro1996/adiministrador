@extends('layouts.main')

@section('title', 'cadastro parcelas')

@section('content')

@include('componentes.cabecalhoPagina', ['titulo'=>'Parcela', 'subtitulo'=>$subitulo])



<div class="row mt-3 shadow-lg p-2">
    <div class="col">
        <form action="/parcelas/cadastrar" method="post" class="text-white">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <label for="">Conta</label>
                    <select name="conta_id" class="mb-2 select2 form-control {{$errors->has('conta_id')?'is-invalid':''}}" id="conta_id_debito">
                        <option value="">Selecione</option>
                        @foreach ($contas as $c)
                            <option value="{{$c->id}}"  {{($c->id == old('conta_id')) ? 'selected' : '' }}>{{$c->descricao}}</option>
                        @endforeach
                    </select>
                    @error('conta_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="">Quantidade Parcelas</label>
                    <input type="number" id="parcelas" class="form-control mb-2 {{$errors->has('parcelas')?'is-invalid':''}}" name="parcelas" value="{{old('parcelas')}}">
                    @error('parcelas')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <label for="">Valor Parcela</label>
                    <input type="text" id="valor_parcela" class="form-control valor mb-2 {{$errors->has('valor_parcela')?'is-invalid':''}}" name="valor_parcela" value="{{old('valor_parcela')}}"> 
                    @error('valor_parcela')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="">Dia vencimento parcela</label>
                    <input type="number" id="dia_vencimento" class="form-control mb-2 {{$errors->has('dia_vencimento')?'is-invalid':''}}" name="dia_vencimento" pattern="[0-9]*" value="{{old('dia_vencimento')}}"> 
                    @error('dia_vencimento')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="">Mês primeira parcela</label>
                    <input type="month" id="Mes_Primeiro_vencimento" class="form-control mb-2 {{$errors->has('Mes_Primeiro_vencimento')?'is-invalid':''}}" name="Mes_Primeiro_vencimento" pattern="[0-9]*" value="{{old('Mes_Primeiro_vencimento')}}"> 
                    @error('Mes_Primeiro_vencimento')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-2">
                    <button class="btn btn-success w-100" type="submit" >Cadastrar</button>
                </div>
            </div>

        </form>
    </div>
</div>

@section('javascript')
@if(!empty(old('tipoConta')))
    <script>
        buscarTipoCadastro({{old('tipoConta')}})
    </script>
@endif

@endsection
@endsection