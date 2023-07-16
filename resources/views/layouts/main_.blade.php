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
        <link rel="stylesheet" href="{{asset('bootstrap-5.3.0-dist/css/bootstrap.css')}}">

        <!-- font awesome -->
        <link rel="stylesheet" href="{{asset('fontawesome-6.0/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('fontawesome-6.0/js/all.js')}}">

        {{-- <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
        <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script> --}}

        <!-- sweetalert -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}
        
    </head>
    <body>
    <?php
        $url = $_SERVER['REQUEST_URI'];
        ?>
        <aside>
           @include('layouts.menu')
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

        <div class="modal fade" id="cadastrarProcedimento" tabindex="-1" aria-labelledby="cadastrarProcedimentoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg bg-warning">
                <div class="modal-content bg-warning text-white">
                    <div class="modal-header">
                        <h5>Cadastrar Procedimento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="conteudoCadastroProcedimento">
                       
                    </div>
                </div>
            </div>
        </div>
        
        {{--jquery--}}
        <script src="{{asset('jquery/jquery-3.6.0.min.js')}}"></script>

        {{--jquery--}}
        <script src="{{asset('jquery/jquery.mask.js')}}"></script>

        {{--bootstrap--}}
        {{-- <script src="{{asset('bootstrap-5.3.0-dist/js/bootstrap.js')}}"></script> --}}
        <script src="{{asset('bootstrap-5.3.0-dist/js/bootstrap.bundle.js')}}"></script>

        {{--jquery Principal--}}
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('select2/select2.min.js')}}"></script>

        {{--js secundarios--}}
        <script src="{{asset('js/contas.js')}}"></script>
        <script src="{{asset('js/parcelas.js')}}"></script>

        @yield('javascript')  

    </body>
</html>