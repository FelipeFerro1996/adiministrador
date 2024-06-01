<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @php
        $url = $_SERVER['REQUEST_URI'];
        @endphp

        @foreach ($menus as $menu)
            <li class="nav-item">
                <a class="nav-link {{strpos($url, $menu->descricao_link) ? 'active' : ''}}" href="{{route($menu->link)}}">
                    {!!$menu->icon!!}
                    <p>{{$menu->descricao}}</p>
                </a>
            </li>
        @endforeach

    </ul>
</nav>
{{-- <li class="nav-item">
    <a href="pages/widgets.html" class="nav-link">
    <i class="nav-icon fas fa-th"></i>
    <p>
    Widgets
    <span class="right badge badge-danger">New</span>
    </p>
    </a>
    </li> --}}