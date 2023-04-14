<div class="row shadow-lg p-2 align-items-center">
    <div class="col">
        <h3 class="text-white">{{$titulo}} | {{$subtitulo}}</h3>
    </div>
    @if(!empty($linkcadastro))
        <div class="col-md-4 d-flex justify-content-end">
            <a href="{{$linkcadastro}}">
                <i class="fa-solid fa-plus fa-xl text-white" title="Cadastrar {{$subtitulo}}"></i>
            </a>
        </div>
    @endif
</div>