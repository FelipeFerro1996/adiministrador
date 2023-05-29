@extends('layouts.main')

@section('title', 'Cadastrar Pet')

@section('content')

@include('componentes.cabecalhoPagina', ['titulo'=>'Pets', 'subtitulo'=>'Cadatro de Pets'])

<div class="row shadow-lg mt-2 p-2">
    <div class="col">
        <div class="">
            <ul class="nav nav-tabs " id="tabCadastroPet" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{(!empty(session('procedimento')) || !empty($_REQUEST['page'])) ?'':'active'}}" id="principal-tab" data-bs-toggle="tab" data-bs-target="#principal" type="button" role="tab" aria-controls="principal" aria-selected="true">
                        Principal
                    </button>
                </li>
                @if(!empty($pet->id))
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{!empty(session('procedimento')) || !empty($_REQUEST['page']) ?'active':''}}" id="procedimento-tab" data-bs-toggle="tab" data-bs-target="#procedimento" type="button" role="tab" aria-controls="procedimento" aria-selected="true">
                            Procedimentos
                        </button>
                    </li>
                @endif
            </ul>
            <div class="tab-content" id="tabCadastroPet">
                <div class="tab-pane fade {{!empty(session('procedimento')) || !empty($_REQUEST['page'])?'':' show active'}} p-1" id="principal" role="tabpanel" aria-labelledby="principal-tab">
                    @include('pets.abas.principal')
                </div>
                @if(!empty($pet->id))
                    <div class="tab-pane fade {{!empty(session('procedimento')) || !empty($_REQUEST['page'])?' show active':''}} p-1" id="procedimento" role="tabpanel" aria-labelledby="procedimento-tab">
                        @include('pets.abas.procedimentos')
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@section('javascript')
    <script src="{{asset('js/pets/listaPet.js')}}"></script>
@endsection

@endsection