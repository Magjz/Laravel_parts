<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @yield('title')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    </head>
    <body>
    <nav>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                 <a class="nav-link active" href="#">Match</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Equipes</a></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Joueurs</a>
            </li>
             @if (Route::has('login'))
                    @auth
                        <li class="nav-item"><a href="{{ url('/home') }}" class="nav-link">Home</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    @endauth
            @endif
           
        </ul>
    </nav>

        <div class="flex-center position-ref full-height">
          

            <div class="content">
             @yield('content')
            </div>
        </div>
    </body>
</html>
