@extends('layouts.main')

@section('title', 'home')

@section('content')

@include('componentes.cabecalhoPagina', ['titulo'=>'Contas', 'subtitulo'=>'lista Contas', 'linkcadastro'=> '/contas/create'])

<div class="row mt-2 shadow-lg">
    <div class="col table-responsive">
        <table class="table text-white  ">
            <thead>
                <tr>
                    <th scope="col">Descrição</th>
                    <th scope="col">Tipo Conta</th>
                    <th scope="col">Qtd Parcela</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contas as &$c)
                    <tr>
                        <td>{{$c->descricao}}</td>
                        <td>{{($c->tipo==1)?'Crédito':'Débito'}}</td>
                        <td>{{$c->parcelas}}</td>
                        <td>R$ {{number_format($c->total, 2, '.', ',');}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nenhum registro cadastrado</td>
                    </tr>
                @endforelse
                
        </table>
        <div class="row mt-2">
            <div class="col d-flex justify-content-end">
                {{ $contas->links() }}
            </div>
        </div>
    </div>
</div>



@endsection