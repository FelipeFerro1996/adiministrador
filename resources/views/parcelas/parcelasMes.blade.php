<div class="row p-2">
    <div class="col d-flex justify-content-center">
        <h2 class="fw-bolder ">Parcelas {{$mes}}</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="small-box bg-primary text-center">
            <div class="inner">
                <h3>R$ {{number_format($totalCreditos, 2, '.', ',');}}</h3>
                <p>TOTAL CRÉDITOS</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-warning text-center">
            <div class="inner">
                <h3>R$ {{number_format($totalDebitos, 2, '.', ',');}}</h3>
                <p>TOTAL DÉBITOS</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-{{($totalCreditos - $totalDebitos) > 0 ? 'success' : 'danger'}} text-center">
            <div class="inner">
                <h3>R$ {{number_format(($totalCreditos - $totalDebitos), 2, '.', ',')}}</h3>
                <p>SALDO</p>
            </div>
        </div>
    </div>
    <div class="col table-responsive">
        {{-- <table class="table table-borderless table-striped dataTable dtr-inline table-info table-hover" > --}}
        <table class="table table-bordered table-striped dataTable dtr-inline" >
            <thead class="">
                <th>Descrição</th>
                <th>Vencimento</th>
                <th>Nº Parcela</th>
                <th>Valor</th>
                <th>Total Pago</th>
                <th>Status</th>
            </thead>
            <tbody>
                @forelse($parcelas AS &$p)
                    <tr>
                        <td>{{$p->conta->descricao}}</td>
                        <td>{{date('d/m/Y', strtotime($p->vencimento))}}</td>
                        <td>{{$p->numero}}</td>
                        <td>R$ {{number_format($p->valor, 2, '.', ',');}}</td>
                        <td>R$ {{number_format($p->total_pago, 2, '.', ',');}}</td>
                        <td class="{{ ( ($p->conta->tipo == 2) ? ( ($p->status == 1) ? 'text-danger' : 'text-warning  ' ) : 'text-success' ) }}">
                            @if($p->conta->tipo == 2)
                                @if($p->status == 1)
                                    <a href="/parcelas/pagarParcela/{{$p->id}}" class="btn btn-warning ">Pagar</a>
                                @else
                                    <span class="btn border-0 fw-bold text-primary">Pago</span>
                                @endif
                            @else
                                <span class="btn border-0 fw-bold text-success">Crédito</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <td colspan="6" class="p-1 text-center">
                        nenhum registro cadastrado
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>