<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @guest
        
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            
        @else
        @php
            $user = Auth::user();
            $list = App\Models\MenuPermisos::with(['Menu'])
                ->join('menu', 'menu_permisos.menu', '=', 'menu.id')
                ->where('roles',$user->rol)
                ->where('menu.padre', null)
                ->get();
        @endphp
        @foreach ($list as $item)
        <li class="nav-item">
            <a href="#" class="nav-link">
                @if ($item->icon)
                    <i class="nav-icon {{ $item->icon }}"></i>     
                @endif
                <p>
                    {{ $item->menu }} 
                    
                </p>
            </a>
            @php
                $list_sub = App\Models\MenuPermisos::with(['Menu'])
                    ->join('menu', 'menu_permisos.menu', '=', 'menu.id')
                    ->where('roles',$user->rol)
                    ->where('menu.padre', $item->id)
                    ->get();
            @endphp
            <ul class="nav nav-treeview">
                @foreach ($list_sub as $item_sub)
                @if (Route::has($item_sub->ruta))
                <li class="nav-item">
                    <a href="{{ $item_sub->ruta ? route($item_sub->ruta) : asset($item_sub->url) }}"
                       class="nav-link" >
                       {{ $item_sub->menu }} 
                    </a>
                </li>
                @endif 
                @endforeach
                @if($item->id == 9000)
                    <li class="nav-item">
                        <a class="nav-link " href="javascript:void();" onclick=" document.getElementById('logout-form').submit();" >
                            <i class="bx bx-power-off"></i> Salir
                        </a>
                    </li>
                    
                @endif  
            </ul>  

            
        </li>

        @endforeach
        @endguest
    </ul>
</nav>