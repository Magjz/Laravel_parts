<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/web-fonts-with-css/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
        <a class="brand-name" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
            <ul class="nav justify-content-center">
                <li class="nav-item">
                     <a class="nav-link active" href="{{ route('match.index') }}">Match</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('team.index') }}">Equipes</a></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('player.index') }}">Joueurs</a>
                </li>
                <li><i class="fa fa-sign-in" aria-hidden="true"></i></li>
                 <!-- Right Side Of Navbar -->
                        <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                        

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                <?php $admin = Auth::user()->type ?>
                                @if($admin == 0)
                                    <a href="{{ url('compte') }}">
                                        Compte
                                    </a>
                                @elseif($admin == 1)
                                    <a href="{{ route('admin.match') }}">
                                        Admin
                                    </a>
                                    
                                @endif
                                   
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
            
        </ul>
    </nav>
    <div class ="row">
        <div class="col-md-offset-2 col-md-8">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img class="d-block w-100 img-carroussel" src="/img/ban.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100 img-carroussel" src="/img/ban2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                    <img class="d-block w-100 img-carroussel" src="img/ban3"> alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

        @yield('content')
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
