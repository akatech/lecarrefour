<header class="navbar navbar-default navbar-fixed-top wet-asphalt blog-masthead" role="banner">
    <div class="container">
        <div class="navbar-header" id="main-navbar-collapse">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src=" {{ asset('images/logo.png') }}" style="width:30px;height:30px" alt="logo"></a>
           {{-- <a class="navbar-brand" href="/"><img src=" {{ asset('images/logo.png') }}" style="width:30px;height:30px" alt="logo"></a>--}}
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="/"><i class="fa fa-home dropdown-icon" aria-hidden="true"></i>Accueil</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Success Story <i class="fa fa-angle-down"></i>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/interview">Interview</a></li>
                        <li><a href="/articles">Articles</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Créneaux porteurs <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="/agriculture">Agriculture</a></li>
                        <li><a href="/elevage">Elévage</a></li>
                        <li><a href="/pisciculture">Pisciculture</a></li>
                        <li><a href="/innovation">Innovation</a></li>
                        <li><a href="/tech">Tech</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Structures & entreprises<i class="fa fa-angle-down"></i>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/struct">Structures gouvernementals</a></li>
                        <li><a href="/ong">ONG</a></li>
                        <li><a href="/pme">Pme</a></li>
                        <li><a href="/entreprise">Entreprises</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Forum <i class="fa fa-angle-down"></i>

                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/discussion">Discussions</a></li>
                    </ul>
                </li>
                <li><a class="blog-nav-item {{ Request::is('articles') ? 'active' : '' }}" href="/articles">Articles</a></li>

                @if( Helper::get_pages() )
                    @foreach( Helper::get_pages() as $page )
                        <li><a class="blog-nav-item {{ $page->id == Request::query('page_id') ? 'active' : '' }}" href="/?page_id={{ $page->id }}">{{ $page->post_title }}</a></li>
                    @endforeach
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}"> <i class="fas fa-user"></i>Se connecter</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="separator">
                           {{-- <li><a href="/dashboard"><i class="fa fa-home dropdown-icon" aria-hidden="true"></i>Tableau de bord</a></li>--}}
                            <li><a href="{{ route('posts.index') }}">Tous vos articles</a></li>
                            <li><a href="{{ route('posts.create') }}">Ajoutez un nouveau</a></li>
                            <li><a href="{{ route('categories.index') }}">Categories</a></li>

                            <li><hr/></li>

                            <li><a href="{{ route('pages.index') }}">Toutes vos Pages</a></li>
                            <li><a href="{{ route('pages.create') }}">Ajoutez unnouveau</a></li>

                            <li><hr/></li>

                            <!--we'll work on this later-->
                            <li><a href="{{ route('comments.index') }}">Tous vos commentaires</a></li>

                            <li><hr/></li>

                            <li>

                                {{--@if(Auth::user()->hasRole('super-admin')){
                                <a href="/admin/dashboard"><i class="fas fa-unlock-alt"></i> Administration</a>
                                }
                                @else
                                    you are note
                                @endif--}}

                                <a class="small button" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt dropdown-icon" aria-hidden="true"></i>
                                    Déconnecter
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</header>
{{--
<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <title>{{ config('app.name') }} @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" href="{{ asset('css/ie10-viewport-bug-workaround.css') }}" />

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}" />

    @yield('stylesheet')
</head>
<body>--}}
{{--

<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <ul class="nav navbar-nav">
                <li><a class="blog-nav-item {{ null == Request::query() ? 'active' : '' }}" href="/">Home</a></li>
                <li><a class="blog-nav-item {{ Request::is('articles') ? 'active' : '' }}" href="/articles">Articles</a></li>

                @if( Helper::get_pages() )
                    @foreach( Helper::get_pages() as $page )
                        <li><a class="blog-nav-item {{ $page->id == Request::query('page_id') ? 'active' : '' }}" href="/?page_id={{ $page->id }}">{{ $page->post_title }}</a></li>
                    @endforeach
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a class="blog-nav-item {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a></li>
                    <li><a class="blog-nav-item {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">Register</a></li>

                @else

                    <li class="dropdown">
                        <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('posts.index') }}">All Posts</a></li>
                            <li><a href="{{ route('posts.create') }}">Add New</a></li>
                            <li><a href="{{ route('categories.index') }}">Categories</a></li>

                            <li><hr/></li>

                            <li><a href="{{ route('pages.index') }}">All Pages</a></li>
                            <li><a href="{{ route('pages.create') }}">Add New</a></li>

                            <li><hr/></li>

                            <!--we'll work on this later-->
                            <li><a href="{{ route('comments.index') }}">All Comments</a></li>

                            <li><hr/></li>

                            <li>
                                <a class="blog-nav-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    </div>
--}}
