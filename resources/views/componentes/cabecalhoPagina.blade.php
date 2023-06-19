<div class="row ">
    <div class="col d-flex justify-content-between">
        {{-- <h3 class="text-white">{{$titulo}} | {{$subtitulo}}</h3> --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">{{$titulo}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$subtitulo}}</li>
            </ol>
        </nav>

        @if(!empty($linkcadastro))
            <div class="">
                <a href="{{$linkcadastro}}">
                    <i class="fa-solid fa-plus fa-xl text-white" title="Cadastrar {{$subtitulo}}"></i>
                </a>
            </div>
        @endif
        @if(!empty($onclick))
            <div class="">
                <i class="fa-solid fa-plus fa-xl text-white" onclick="{{$onclick}}" title="Cadastrar {{$subtitulo}}"></i>
            </div>
        @endif
    </div>
   
</div>