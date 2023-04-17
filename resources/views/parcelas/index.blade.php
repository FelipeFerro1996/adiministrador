@extends('layouts.main')

@section('title', 'parcelas')

@section('content')

{{-- @include('componentes.cabecalhoPagina', ['titulo'=>'Parcela', 'subtitulo'=>'Lista Parcelas', 'linkcadastro'=> 'parcelas/create/2', 'linkcadastro2'=>'parcelas/create/1']) --}}
<div class="row shadow-lg p-2 align-items-center">
    <div class="col d-flex justify-content-between">
        <h3 class="text-white">Parcelas | Listagem de parcelas</h3>
    
        <div>
            <a href="/parcelas/create/1" class="btn btn-warning">
                <i class="fa-solid fa-plus fa-lg" title="Cadastrar Crédito"></i>
                Crédito
            </a>
            <a href="/parcelas/create/2" class="btn btn-info">
                <i class="fa-solid fa-plus fa-lg" title="Cadastrar Parcela"></i>
                Débito
            </a>
        </div>
    </div>
</div>

<div class="row mt-2 shadow-lg pt-3 pb-3">
    <div class="col-md-6">
        <label for="mesParcelas" class="form-label text-white m-0">Selecione um mês:</label>
        <input type="month" id="mesParcelas" value="{{(!empty(session('mes_parcela')) ? session('mes_parcela') : date('Y-m'))}}" class="form-control">
    </div>

    <div class="col-md-6 mt-2 pt-3">
        <button class="btn btn-success" type="button" id="buscarParcelasMes">Buscar</button>
    </div>
</div>

<div id="conteudoParcelas">

</div>

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

@endsection