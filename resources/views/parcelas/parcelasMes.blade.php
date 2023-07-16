<div class="row p-2">
    <div class="col d-flex justify-content-center">
        <h2 class="fw-bolder ">Parcelas {{$mes}}</h2>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <td scope="col" class="bg-success  "><b>Total Créditos</b></td>
                    <td scope="col" class="bg-danger  "><b>Total Débitos</b></td>
                    <td scope="col" class="bg-primary  "><b>Saldo</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-success ">R$ {{number_format($totalCreditos, 2, '.', ',');}}</td>
                    <td class="bg-danger ">R$ {{number_format($totalDebitos, 2, '.', ',');}}</td>
                    <td class="bg-primary ">R$ {{number_format(($totalCreditos - $totalDebitos), 2, '.', ',');}}</td>
                </tr>
            </tbody>
        </table>
        <table class="table" >
            <thead>
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
                    <td colspan="5" class="p-1 text-center">
                        nenhum registro cadastrado
                    </td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>