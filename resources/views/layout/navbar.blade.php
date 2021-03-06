<nav class="navbar navbar-expand-lg">
    <div class="search-area">
        <div class="search-area-inner d-flex align-items-center justify-content-center">
        <div class="close-btn"><i class="icon-close"></i></div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('search') }}" class="search-form">
                    <div class="form-group">
                        <input type="search" name="search" placeholder="O que você está procurando?">
                        <button type="submit" class="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <!-- Navbar Brand -->
        <div class="navbar-header d-flex align-items-center justify-content-between">
        <!-- Navbar Brand -->
        <a href="{{ url('/') }}" class="navbar-brand"><h1>{{ setting('site.title') }}</h1></a>
        <!-- Toggle Button-->
        <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse"
                aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
                <span></span><span></span><span></span>
        </button>
        </div>
        <!-- Navbar Menu -->
        <div id="navbarcollapse" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link @if(Request::path() === '/') active @endif">Início</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link @if(Request::path() === 'sobre-nos') active @endif">Sobre nós</a>
            </li>
        </ul>
        <div class="navbar-text">
            <a href="#" class="search-btn"><i class="icon-search-1"></i></a>
        </div>
        </div>
    </div>
</nav>
