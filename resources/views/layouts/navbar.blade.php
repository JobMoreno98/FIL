<nav class="navbar navbar-expand-md  navbar-dark" style="background: #072d45;">
    <div class="container">
        <a href="http://www.cucsh.udg.mx/" class="navbar-brand">
            <img style="width: 100px" class="img-fluid" src="{{ asset('img/cucsh.png') }}" alt="">
        </a>

        <a class="navbar-brand text-white" href="{{ route('inicio') }}">FIL Pensamiento</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel"
            style="background: #072d45;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white " id="offcanvasNavbarLabel">FIL</h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('agenda.index') }}">Administración</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('miagenda') }}">Mi Agenda</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Acceder') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
                </ul>

            </div>
        </div>
    </div>
</nav>
