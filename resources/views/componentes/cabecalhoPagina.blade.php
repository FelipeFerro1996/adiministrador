<div class="row ">
    <div class="col d-flex justify-content-between">
       {{-- <h3 class="text-white">{{$titulo}} | {{$subtitulo}}</h3>  --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">{{$titulo}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$subtitulo}}</li>
            </ol>
        </nav>

        
        @if(!empty($onclick))
            <div class="">
                <i class="fa-solid fa-plus fa-xl text-white" onclick="{{$onclick}}" title="Cadastrar {{$subtitulo}}"></i>
            </div>
        @endif
    </div>

    @if(!empty($linksCadastros))
        @foreach ($linksCadastros as $key => $link)
            <div class="">
                <a class="btn btn-primary btn-sm" href="{{$link}}">
                    <i class="fa-solid fa-plus fa-xl text-white" title="{{$key}}"></i>
                    {{$key}}
                </a>
            </div>
        @endforeach
    @endif
   
</div>

{{-- <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$titulo}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active">{{$subtitulo}}</li>
                </ol>
            </div>
        </div>
        <div class="row">
           <div class="col d-flex justify-content-end">
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
    </div>
</section> --}}