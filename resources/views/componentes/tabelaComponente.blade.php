<table class="table text-center table-rounded" >
    <thead>
        <tr>
            @foreach ($tableHead as $item)
                <th scope="col">{{$item->descricao}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @forelse ($objetos as &$item)
            <tr>
                @foreach ($tableHead as $head)
                    <td>{{$item->{$head->campo}??''}}</td>
                @endforeach
            </tr>
        @empty
            <tr>
                <td colspan="{{count($tableHead)}}">Nenhum registro encontrado...</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="row">
    <div class="col">
        {{$objetos->links()}}
    </div>
</div>