<div class="row">
    <div class="col">
        <table class="table text-center text-white">
            <thead>
                <tr>
                    <th scope="col">Pet</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data Procedimento</th>
                    <th scope="col" colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>

                @forelse($procedimentos as &$p)
                    <tr>
                        <td>{{$p->pet->nome}}</td>
                        <td>{{$p->descricao}}</td>
                        <td> R$ {{number_format($p->valor, 2, '.', ',');}}</td>
                        <td>{{$p->data_procedimento}}</td>
                        <td>
                            <i class="fa-solid fa-pen-to-square text-white" onclick="abrirModalalteracaoProcedimento({{$p->id}})"></i>
                        </td>
                        <td>
                            @if($p->status == 1)
                                <form action="/desmarcarRealizado/{{$p->id}}" method="POST">
                                    @csrf
                                    <i title="Desmarcar como realizado" class="fa-solid fa-toggle-on fa-lg text-success" onclick="if(confirm('Deseja desmarcar esse procedimento como realizado?')){this.closest('form').submit();}"></i>
                                </form>
                            @else
                                <form action="/marcarRealizado/{{$p->id}}" method="POST">
                                    @csrf
                                    <i title="Marcar como realizado" class="fa-solid fa-toggle-off fa-lg text-danger" onclick="if(confirm('Deseja marcar esse procedimento como realizado?')){this.closest('form').submit();}"></i>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="/procedimentos/{{$p->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <i class="fa-solid fa-trash-can text-danger" onclick="if(confirm('Deseja excluir esse procedimento?')){this.closest('form').submit();}"></i>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center p-3">Nenhum registro encontrado...</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col d-flex justify-content-end">
        {{$procedimentos->links()}}
    </div>
</div> 