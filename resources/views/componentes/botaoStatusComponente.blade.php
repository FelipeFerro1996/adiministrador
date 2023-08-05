<form action="{{$rota}}" method="POST">
    @csrf
    <i title="{{$title??''}}" class="fa-solid fa-toggle-on fa-lg {{ ($type == 1 ? 'text-danger' : 'text-success')}}" onclick="if(confirm('Deseja {{($type == 1 ? 'marcar' : 'desmarcar')}} essa tarefa como realizada?')){this.closest('form').submit();}"></i>
</form>