<div class="topNav  pt-2 pb-3 bg-sec f-main">
    <div class="container">
        <div class="row">
            <div class="col-12 centerOnMobile topNavmax lang">
                <div class="me-3 border-0 bg-sec dropdown d-inline">
                    <button class="btn btn-secondary dropdown-toggle dropLang" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-globe-americas"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item">
                            <x-_locale lang="it" aria-placeholder="Italiano" />Italiano
                        </li>
                        <li class="dropdown-item">
                            <x-_locale lang="en" aria-placeholder="English" />English
                        </li>
                        <li class="dropdown-item">
                            <x-_locale lang="fr" aria-placeholder="Français" />Français
                        </li>
                    </ul>
                </div>
                <span class="me-3"><i class="fa-solid fa-phone me-1 text-acc"></i>
                    <strong>+080-1234567</strong></span>
            </div>
            
            <div class="col-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
                <span class="me-3 float-end"><i class="fa-solid fa-truck text-muted me-1"></i><a class="text-muted" href="#">Shipping</a></span>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm f-main">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img class="logo" src="https://media.discordapp.net/attachments/1076537525583233054/1105770730869768252/verde_scuro.jpg?width=223&height=68" alt="logo sito"></a>
        @guest
        @else
            <a class="nav-link" href="{{ Auth::check() && Auth::user()->profile ? route('showProfile') : route('createProfile') }}">Benvenut* {{ Auth::user()->name }}!</a>
            
        @endguest
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
            <div class="input-group">
                {{-- <span class="input-group-text bg-acc text-white"><i class="fa-solid fa-magnifying-glass"></i></span> --}}
                <form action="{{route('articleSearch')}}" class="d-flex" method="GET">
                    <input type="search" class="form-control text-acc" name="searched" aria-label="Search">
                    <button class="btn btn_search bg-acc text-white">{{__('ui.search')}}</button>
                </form>
            </div>
        </div>

        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <div class="ms-auto d-none d-lg-block">
                <div class="input-group">
                    <form action="{{route('articleSearch')}}" class="d-flex" method="GET">
                        <input type="search" class="form-control text-acc" placeholder="{{__('ui.placeholder')}}"
                            name="searched" aria-label="Search">
                        <button class="btn btn_search bg-acc text-white"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
            </div>

            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" aria-current="page" href="{{route('welcome')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mx-2 text-uppercase" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.products')}}</a>
                    <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('categoryShow', compact('category')) }}">{{ $category->name }}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endforeach
                        <li><a class="dropdown-item" href="#">{{__('ui.offers')}}
                        </a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="{{ route('about') }}">{{__('ui.about')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 text-uppercase" href="{{ route('articleIndex') }}">{{__('ui.articles')}}
                    </a>
                </li>

                @guest
                    <a class="nav-item mx-2 nav-link text-uppercase" href="{{ route('login') }}">{{__('ui.login')}}
                    </a>
                    <a class="nav-item mx-2 nav-link text-uppercase" href="{{ route('register') }}">{{__('ui.register')}}
                    </a>
                @else
                    <a class="nav-item nav-link text-uppercase" href="{{ route('createArticle') }}">{{__('ui.createArticle')}}
                    </a>
                    {{-- per il revisore --}}
                    @if (Auth::user()->is_revisor)
                        <a class="nav-link btn btn-outline-success btn_revisor btn-sm position-relative" aria-current="page"
                            href="{{ route('revisorIndex') }}">
                            {{__('ui.revisorZone')}}
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ App\Models\Article::toBeRevisionedCount() }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    @endif
                    {{-- fine zona revisore --}}
                    {{-- per fare il logout --}}
                    <a class="nav-link text-uppercase" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); 
                  document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    {{-- fine del logout --}}
                @endguest
            </ul>

            <ul class="navbar-nav ms-auto ">
                <li class="mx-2">
                    <a class="nav-link mx-2 text-uppercase visually-hidden " href="#">Carrello</a><i
                        class="fa-solid fa-cart-shopping me-1"></i>
                </li>
            </ul>

        </div>
    </div>
</nav>
