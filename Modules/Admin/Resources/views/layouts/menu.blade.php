 <ul class="sidebar-menu" id="nav-accordion">
    @php
        $menus = config('menu');
    @endphp
    @foreach ($menus as $item)
    <li>
        @if($item['name']=='Trang Quản Lý')
        <a class="active" href="{{ Route::has($item['route'])? route($item['route']): '#' }}">
            <i class="fa {{ $item['icon'] }}"></i>
            <span>{{ $item['name'] }}</span>
        </a>
        @else 
        <a href="javascript:;">
            <i class="fa {{ $item['icon'] }}"></i>
            <span>{{ $item['name'] }}</span>
        </a>
        @if(!empty($item['items']))
            <ul class="sub">
                @foreach ($item['items'] as $m)
                <li><a href="{{ Route::has($m['route'])? route($m['route']): '#' }}">{{ $m['name'] }}</a></li> 
                @endforeach
                
                
            </ul>
            @endif
        @endif
    </li>
    @endforeach
    
    
    {{-- <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-book"></i>
            <span>UI Elements</span>
        </a>
        <ul class="sub">
            <li><a href="typography.html">Typography</a></li>
            <li><a href="glyphicon.html">glyphicon</a></li>
            <li><a href="grids.html">Grids</a></li>
        </ul>
    </li>
    <li>
        <a href="fontawesome.html">
            <i class="fa fa-bullhorn"></i>
            <span>Font awesome </span>
        </a>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-th"></i>
            <span>Data Tables</span>
        </a>
        <ul class="sub">
            <li><a href="basic_table.html">Basic Table</a></li>
            <li><a href="responsive_table.html">Responsive Table</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-tasks"></i>
            <span>Form Components</span>
        </a>
        <ul class="sub">
            <li><a href="form_component.html">Form Elements</a></li>
            <li><a href="form_validation.html">Form Validation</a></li>
            <li><a href="dropzone.html">Dropzone</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-envelope"></i>
            <span>Mail </span>
        </a>
        <ul class="sub">
            <li><a href="mail.html">Inbox</a></li>
            <li><a href="mail_compose.html">Compose Mail</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class=" fa fa-bar-chart-o"></i>
            <span>Charts</span>
        </a>
        <ul class="sub">
            <li><a href="chartjs.html">Chart js</a></li>
            <li><a href="flot_chart.html">Flot Charts</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class=" fa fa-bar-chart-o"></i>
            <span>Maps</span>
        </a>
        <ul class="sub">
            <li><a href="google_map.html">Google Map</a></li>
            <li><a href="vector_map.html">Vector Map</a></li>
        </ul>
    </li>
    <li class="sub-menu">
        <a href="javascript:;">
            <i class="fa fa-glass"></i>
            <span>Extra</span>
        </a>
        <ul class="sub">
            <li><a href="gallery.html">Gallery</a></li>
            <li><a href="404.html">404 Error</a></li>
            <li><a href="registration.html">Registration</a></li>
        </ul>
    </li>
    <li>
        <a href="login.html">
            <i class="fa fa-user"></i>
            <span>Login Page</span>
        </a>
    </li> --}}
</ul>