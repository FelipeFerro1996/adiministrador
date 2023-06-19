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

                <li class="nav-item">
                    <a class="nav-link <?php if($url == route('listarPets')) echo 'active'; ?>" aria-current="page" href="/pets"><i class="fa-solid fa-house-user p-1"></i>Pets</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if($url == '/procedimentos') echo 'active'; ?>" aria-current="page" href="/procedimentos"><i class="fa-solid fa-house-user p-1"></i>Procedimentos</a>
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