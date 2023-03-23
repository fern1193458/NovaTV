<nav class="navbar navbar-expand-md navbar-dark bg-novatv shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" width="34px"> NovaTV
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('home') }}">
                            <i class="fa fa-clipboard-list"></i> 
                            Home
                        </a>
                    </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fa fa-user-lock"></i> 
                                Iniciar Sesión
                            </a>
                        </li>
                    @endif
                    <li class="nav-item d-none d-sm-block"><span class="nav-link">|</span></li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fa fa-user-edit"></i> 
                                Registrarse
                            </a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->fullname }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->role->name == "Admin")
                                <a class="dropdown-item" href="{{ url('users') }}">
                                    <i class="fa fa-users"></i>
                                     Módulo Usuarios 
                                </a>
                                <a class="dropdown-item" href="{{ url('categories') }}">
                                    <i class="fas fa-list-alt"></i>
                                     Módulo Categorías 
                                </a>
                                <a class="dropdown-item" href="{{ url('movies') }}">
                                    <i class="fas fa-film"></i>
                                     Módulo Peliculas 
                                </a>
                                <div class="dropdown-divider"></div>
        
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>