<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" id="menu">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <div class=" d-flex align-items-center">
            <div class="">
                <div class="p-0 m-0" id="fotoRosto">

                </div>
            </div> 
            <div class="fw-bold ps-2">
                <span class="">FAMÍLIA FERRO</span>
                <br>
                <span>Adiministrativo</span>
            </div>
        </div>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a class="nav-link <?php if($url == '/') echo 'active'; ?>" aria-current="page" href="/">
            <i class="fa-solid fa-house-user p-1"></i>
            HOME
            </a>
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

        {{-- <li class="nav-item">
        <a class="collapsed nav-link" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
            <i class="fa-solid fa-house-user p-1"></i>
            Home
        </a>
        <div class="collapse" id="home-collapse" style="">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li class="nav-item"><a href="#" class="nav-link link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark d-inline-flex text-decoration-none rounded">Updates</a></li>
            <li class="nav-item"><a href="#" class=" nav-link link-dark d-inline-flex text-decoration-none rounded">Reports</a></li>
            </ul>
        </div>
        </li> --}}
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item" href="#">
                    Sign out
                </a>
            </li>
        </ul>
    </div>
</div>