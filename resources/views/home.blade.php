@extends('layouts.main')

@section('title', 'home')

@section('header')
    <div class="row ">
        <div class="col-md-12 d-flex justify-content-between p-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Débitos Mês Atual</h3>
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
                    <div class="chart">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="pizzaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 343px;"
                            width="686" height="500" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
        
            </div>
        </div>
       
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tarefas Abertas</h3>
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
                    <div class="responsive">
                        @include('componentes.tabelaComponente',['objetos'=>$tarefas, 'tableHead'=>$tableHeadTarefas])
                    </div>
                </div>
        
            </div>
        </div>

    </div>

@endsection

@section('javascript')

    <script>
        //variaveis para grafico de pizza
        var ctx = document.getElementById('pizzaChart').getContext('2d');
        var labels = @json($parcelas->pluck('descricao'));
        var values = @json($parcelas->pluck('soma_valor'));
    </script>

    <script src="{{asset('js/home.js')}}"></script>
@endsection
