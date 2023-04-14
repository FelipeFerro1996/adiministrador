<div class="card mt-2 bg-primary">
    <div class="card-header p-2 d-flex justify-content-center">
        <h3 class="fw-bolder text-white">Parcelas {{$mes}}</h3>
    </div>
    <div class="card-body">
        
        <div class="row">
            @forelse($parcelas AS &$p)
                <div class="col-md-6">
                    <div class="card mb-2 text-white {{$p->conta->tipo == 2 ? ($p->status == 1)?'bg-danger':'bg-warning' : 'bg-success'}}">
                        <div class="card-header">
                            {{$p->conta->descricao}}
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <span class="fw-bolder">Vencimento</span>
                                    {{date('d/m/Y', strtotime($p->vencimento))}}
                                </div>
                                <div class="col-6">
                                    <span class="fw-bolder">Nº Parcela</span>
                                    {{$p->numero}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <span class="fw-bolder">Valor:</span>
                                     R$ {{number_format($p->valor, 2, '.', ',');}}
                                </div>
                                <div class="col-6">
                                    <span class="fw-bolder">Total Pago:</span>
                                     R$ {{number_format($p->total_pago, 2, '.', ',');}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-center p-1">
                            @if($p->conta->tipo == 2)
                                @if($p->status == 1)
                                    <a href="/pagarParcela/{{$p->id}}" class="btn btn-warning">Pagar{{$p->id}}</a>
                                @else
                                    <span class="btn border-0 fw-bold text-white">Pago</span>
                                @endif
                            @else
                                <span class="btn border-0 fw-bold text-white">Crédito</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    nenhum registro cadastrado
                </div>
            @endforelse
        </div>
    </div>
</div>