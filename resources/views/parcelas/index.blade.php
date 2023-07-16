@extends('layouts.main')

@section('title', 'parcelas')

@section('header')
<div class="row ">
    <div class="col-md-8 d-flex justify-content-between p-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Parcelas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listagem parcelas</li>
            </ol>
        </nav>
    </div>
    <div class="col-md-2 p-1">
        <a href={{route('cadastroParcela', ['tipo'=>'1'])}} class="btn btn-warning btn-sm w-100">
            <i class="fa-solid fa-plus fa-lg" title="Cadastrar Crédito"></i>
            Crédito
        </a>
    </div>
    <div class="col-md-2 p-1">
        <a href={{route('cadastroParcela', ['tipo'=>'2'])}} class="btn btn-info btn-sm w-100">
            <i class="fa-solid fa-plus fa-lg" title="Cadastrar Parcela"></i>
            Débito
        </a>
    </div>
</div>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 ">
                <label for="mesParcelas" class="form-label  m-0">Selecione um mês:</label>
                <div class="input-group">
                    <input type="month" id="mesParcelas" value="{{(!empty(session('mes_parcela')) ? session('mes_parcela') : date('Y-m'))}}" class="form-control">
                    <button class="btn btn-success" type="button" id="buscarParcelasMes">Buscar</button>
                </div>
            </div>
        </div>
        
        <div id="conteudoParcelas">
        
        </div>
    </div>
</div>

@endsection

@section('javascript')
    @if(session('mes_parcela'))
        <script>
            
            $(document).ready(()=>{
                mes = '{{session('mes_parcela')}}';
                buscarParcelaMes(mes);
            })
        </script>
    @endif
@endsection