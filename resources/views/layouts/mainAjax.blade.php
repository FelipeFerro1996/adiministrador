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

@yield('content')

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