<header id="top">
    <div class="row">
        <div class="header-content twelve columns">
            <h1 id="logo-text"><a href="{{ route('blog.index') }}" title="">{{ $config->title }}</a></h1>
            <p id="intro">{{ $config->sub_title }}</p>
        </div>
    </div>
    <nav id="nav-wrap">
        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>
        <div class="row">
            <ul id="nav" class="nav">
                <li class="current"><a href="{{ route('blog.index') }}">Home</a></li>
                @if (Route::has('login'))
                @auth
                <li class="has-children">
                    <a href="{{ url('/home') }}">Painel</a>
                </li>
                <li class="has-children">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                        {{ __('Sair') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                <li class="has-children">
                    <a href="{{ route('login') }}">Acessar</a>
                </li>
                @if (Route::has('register'))
                <li class="has-children">
                    <a href="{{ route('register') }}">Registre-se</a>
                </li>
                @endif
                @endauth
                @endif
            </ul> <!-- end #nav -->
        </div>

    </nav> <!-- end #nav-wrap -->
</header>