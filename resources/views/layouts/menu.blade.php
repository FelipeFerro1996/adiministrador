<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
        <a class="nav-link <?php if($url == '/') echo 'active'; ?>" aria-current="page" href="/"><i class="fa-solid fa-house-user fa-lg p-1 me-4 "></i>HOME</a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php if($url == '/contas') echo 'active'; ?>" aria-current="page" href={{route('listarContas')}}><i class="fa-solid fa-house-user fa-lg p-1 me-4"></i>Contas</a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php if($url == '/parcelas') echo 'active'; ?>" aria-current="page" href="/parcelas"><i class="fa-solid fa-house-user fa-lg p-1 me-4"></i>Parcelas</a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php if($url == route('listarPets')) echo 'active'; ?>" aria-current="page" href="/pets"><i class="fa-solid fa-house-user fa-lg p-1 me-4"></i>Pets</a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?php if($url == '/procedimentos') echo 'active'; ?>" aria-current="page" href="/procedimentos"><i class="fa-solid fa-house-user fa-lg p-1 me-4"></i>Procedimentos</a>
    </li>

</ul>