<form action="{{$rota??''}}" method="POST">
    @csrf
    @method('DELETE')

    <i class="fa-solid fa-trash-can text-danger excluirForm"></i>
    
</form>