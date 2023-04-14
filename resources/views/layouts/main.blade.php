<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- <link rel="stylesheet" href="{{asset('site/style.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/styles.css')}}">
        <!-- <link rel="stylesheet" href="{{asset('site/estilo.css')}}"> -->


        <link rel="stylesheet" href="{{asset('select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.css')}}">

        <!-- font awesome -->
        <link rel="stylesheet" href="{{asset('fontawesome-6.0/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('fontawesome-6.0/js/all.js')}}">

        <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
        <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>

        <!-- sweetalert -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}
        
    </head>
    <body>
    <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        <aside>
            <div id="menu">
                <!-- <div class="row justify-content-center">
                    <div class="mt-4 p-0 m-0" id="fotoRosto">

                    </div>
                </div> -->
                <div class="row justify-content-center mb-2">
                    <div class="col-md-7 bg-success text-center bg-{{session('tipo')}} rounded">
                        @if(session('msg'))
                            {{-- <script>
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: '{{session('msg')}}',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    background: 'green'
                                })
                            </script> --}}
                            <p class="fw-bold pt-3">{{session('msg')}}</p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="row justify-content-center">
                        <div class="mt-4 p-0 m-0" id="fotoRosto">

                        </div>
                    </div> 
                    <div class="col-md-12 mt-4 fw-bold text-center">
                        <!-- <i class="fa-solid fa-car fa-4x"></i> -->
                        <h2 id="subtitulo"><span class="">FAMÍLIA FERRO</h2>
                        <h6 id="subtitulo">adiministrativo</h6>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-10 mt-4" style="color: #A52A2A;">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a class="nav-link <?php if($url == '/') echo 'active'; ?>" aria-current="page" href="/"><i class="fa-solid fa-house-user p-1"></i>HOME</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php if($url == '/contas') echo 'active'; ?>" aria-current="page" href="/contas"><i class="fa-solid fa-house-user p-1"></i>Contas</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link <?php if($url == '/parcelas') echo 'active'; ?>" aria-current="page" href="/parcelas"><i class="fa-solid fa-house-user p-1"></i>Parcelas</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="row justify-content-center mt-5 ms-5">
                        <form action="/logout" method="post">
                            @csrf
                            <a href="/logout"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <buttom id="btnSair" class="btn">Sair</buttom>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        
        <main id="main">
            <div class="container-fluid">
                <div class="paginaConteudo row" >
                    <div class="col p-4">
                        <i class="fa-solid fa-bars menu-mobile"></i>

                        @yield('content')   
                    </div>
                </div>
            </div>
        </main>
        
        
        
        {{--jquery--}}
        <script src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>

        {{--jquery--}}
        <script src="{{asset('jquery/jquery.mask.js')}}"></script>

        {{--bootstrap--}}
        <script src="{{asset('bootstrap-5.0.2-dist/js/bootstrap.js')}}"></script>

        {{--jquery Principal--}}
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('select2/select2.min.js')}}"></script>

        {{--js secundarios--}}
        <script src="{{asset('js/contas.js')}}"></script>
        <script src="{{asset('js/parcelas.js')}}"></script>

        @yield('javascript')  

    </body>
</html>