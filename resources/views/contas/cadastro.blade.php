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
                <form action="{{ !empty($conta->id) ? route('updateConta',['id' => $conta->id]) : route('insertConta')}}" method="post">
                    @csrf
                    @if(!empty($conta->id))
                        @method('PUT')
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-12">
                            @include('componentes.campoDinamicoComponente', [
                                'label_descricao'=>'Descrição',
                                'id_name'=>'descricao',
                                'required'=>'required',
                                'tipo'=>'input',
                                'type'=>'text',
                                'campo_descricao'=>'descricao',
                                'value'=>(old('descricao')??$conta->descricao??''),
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
                                'value'=>(old('tipo_conta')??$conta->tipo??''),
                                'campo_valor'=>'id',
                                'campo_descricao'=>'descricao',
                                'class_campo'=>($errors->has('tipo_conta')?'is-invalid':''),
                                'mensagem'=>($errors->has('tipo_conta')?$errors->first('tipo_conta'):''),
                            ])
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-2 col-sm-12 p-1">
                            <button type="submit" class="btn btn-success w-100">
                                {{!empty($conta->id) ? 'Atualizar' : 'Cadastrar'}}
                            </button>
                        </div>

                </form>
                        <div class="col-md-3 p-1">
                            @if(!empty($conta->id))
                                <form action="{{route('removerParcelasConta', $conta->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                
                                    <button type="button" id="RemoverTodasParcelas" class="btn btn-primary w-100">
                                        Remover todas parcelas
                                    </button>
                                    
                                </form>
                            @endif
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@isset($parcelas)
    <div class="row">
        <div class="col">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Parcelas</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @include('parcelas.parcelasMes', ['parcelas'=>$parcelas])
                </div>

            </div>
        </div>
        </div>
    </div>
@endisset

@endsection