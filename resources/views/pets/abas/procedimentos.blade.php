<div class="row">
    <div class="col p-2 d-flex justify-content-end">
        <button onclick="abrirModalcadastrarProcedimento({{$pet->id??''}})" type="button" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i>
            Procedimento
        </button>
    </div>
</div>
@include('procedimentos.listaProcedimento')