    <ul class="navbar-nav" >
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @guest

        @else
        @php
            $user = Auth::user();
            //dd($user);
            $list = App\Models\MenuPermisos::with(['Menu'])
                ->join('menu', 'menu_permisos.menu', '=', 'menu.id')
                ->where('roles',$user->rol)
                ->whereNull('menu.padre')
                ->get();
        @endphp
        @foreach ($list as $item)
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="{{ $item->ruta ?? $item->id}}navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"">
                @if ($item->icon)
                    <i class="{{ $item->icon }}"></i> 
                @else
                    <i class="far fa-circle nav-icon"></i>
                @endif
                <span data-key="{{ $item->id}}">{{ $item->menu }}</span>
            </a>
            
                @php
                    $list_sub = App\Models\MenuPermisos::with(['Menu'])
                        ->join('menu', 'menu_permisos.menu', '=', 'menu.id')
                        ->where('roles',$user->rol)
                        ->where('menu.padre', $item->id)
                        ->get();
                @endphp
                <ul class="dropdown-menu" aria-labelledby="{{ $item->ruta ?? $item->id}}navbarDropdown">
                    @foreach ($list_sub as $item_sub)
                    @if (Route::has($item_sub->ruta))
                    <li class="">
                        <a href="{{ $item_sub->ruta ? route($item_sub->ruta) : asset($item_sub->url) }}" class="dropdown-item" data-key="t-analytics"> {{ $item_sub->menu }} </a>
                    </li>
                    @endif
                    @endforeach
                    @if ($item->id == 9000)
                        {!! 
                            '<li class="">
                                <a class="dropdown-item" href="javascript:out();" >
                                    <i class="fa fa-power-off"></i> <span >Salir</span>
                                </a>
                            </li>'
                        !!}
                    @endif  
                </ul>  
            
        </li>    
        @endforeach
        @endguest
    </ul>

    <ul class="navbar-nav ml-auto">
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-user"></i> Acceso
                </a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">
                    <i class="fas fa-edit"></i>
                    Registro
                </a>
            </li>
        @endif
    @endguest
    </ul>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
<script>
    const out = () => {
        const frm = document.getElementById('logout-form');
        frm.submit();
    }
</script>