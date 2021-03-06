<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a class="navbar-brand" href="#"> <img src="{{ asset('images/logo.gif')}}" class="navbar-brand" width="60%" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bases de Datos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('clientes') }}">Clientes </a>
                    <a class="dropdown-item" href="{{ route('oportunidades') }}">Pipeline </a>
                    <a class="dropdown-item" href="{{ route('inteligencia') }}">Inteligencia </a>
                </div>
            </li>
        </ul>
        @if (Auth::guest())
            <a class="navbar-brand" href="{{ route('login') }}">Login</a>
        @else
            <ul class="navbar-nav">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
            </ul>
        @endif
    </div>
</nav>
