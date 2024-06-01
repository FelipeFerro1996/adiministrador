<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        
        <link rel="stylesheet" href="{{asset('select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('select2/select2-bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap-5.3.0-dist/css/bootstrap.css')}}">

        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <!-- font awesome -->
        <link rel="stylesheet" href="{{asset('fontawesome-6.0/css/all.css')}}">
        <link rel="stylesheet" href="{{asset('fontawesome-6.0/js/all.js')}}">

         {{-- adminlte --}}
         <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">

    </head>
    <body class="hold-transition sidebar-mini">

        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
              {{-- <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> --}}
            </div>
          
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
              <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    {{-- <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li> --}}
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fa-solid fa-power-off" title="Sair"></i>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

              <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <i class="fa-solid fa-circle-user brand-image img-circle elevation-3 mt-2"></i>
                    <span class="brand-text font-weight-light">Família Ferro</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <x-menu-componente />
                </div>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">

                <div class="content-header">
                    @yield('header')
                </div>

                <section class="content">
                    @yield('content')
                </section>
            </div>

        </div>

        <div class="modal fade" id="cadastrarProcedimento" tabindex="-1" aria-labelledby="cadastrarProcedimentoLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg bg-info">
                <div class="modal-content bg-info">
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
        <script src="{{asset('select2/select2.min.js')}}"></script>

        {{--sweetAlert2--}}
        <script src="{{asset('sweetAlert2/sweetAlert2.js')}}"></script>
        
        {{--adminlte--}}
        <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
        <script src="{{asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>

        {{--js secundarios--}}
        <script src="{{asset('js/contas.js')}}"></script>
        <script src="{{asset('js/parcelas.js')}}"></script>
        <script src="{{asset('js/scripts.js')}}"></script>

        @yield('javascript')

        @if(session('sucesso'))  
            <script>
                $(document).ready(function(){
                    Swal.fire({
                        position: 'top-end',
                        icon: "success",
                        title:"{{session('sucesso')}}",
                        showConfirmButton: false,
                        timer: 4000,
                        toast:true
                    })
                })
            </script>
        @endif

        @if(session('erro'))  
            <script>
                $(document).ready(function(){
                    Swal.fire({
                        position: 'top-end',
                        icon: "error",
                        title:" {{session('erro')}}",
                        showConfirmButton: false,
                        timer: 4000,
                        toast:true
                    })
                })
            </script>
        @endif

        <script>
            $( ".select2bootstrap" ).select2({
                theme: "bootstrap"
            });
        </script>
        
    </body>
</html>