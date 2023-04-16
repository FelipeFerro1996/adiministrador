@extends('layouts.main')

@section('title', 'Lista de Pets')

@section('content')

@include('componentes.cabecalhoPagina', ['titulo'=>'Pets', 'subtitulo'=>'lista de Pets', 'linkcadastro'=> '/pets/create'])

<div class="row shadow-lg mt-2">
    <div class="col table-responsive">
        <table class="table text-white text-center">
            <thead>
                <tr>
                    <th scope="col" class="col-4">Nome</th>
                    <th scope="col" class="col-3">Raça</th>
                    <th scope="col" class="col-3">Data Nascimento</th>
                    <th scope="col" class="col-1">Edita</th>
                    <th scope="col" class="col-1">Excluir</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pets as &$p)
                    <tr>
                        <td>{{$p->nome}}</td>
                        <td>{{$p->raca}}</td>
                        <td>{{date('d/m/Y', strtotime($p->data_nascimento))}}</td>
                        <td>
                            <a href="/pets/{{$p->id}}">
                                <i class="fa-solid fa-pen-to-square text-white"></i>
                            </a>
                        </td>
                        <td>
                            <form action="/pets/{{$p->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <i class="fa-solid fa-trash-can text-danger" onclick="if(confirm('Deseja excluir esse pet?')){this.closest('form').submit();}"></i>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-3 text-center">Nenhum registro cadastrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection