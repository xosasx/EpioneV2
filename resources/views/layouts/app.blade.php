<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> {{ config('app.name', 'Epione') }}</title>

        <!-- muicss mainly for tabs -->
        <!--<link href="//cdn.muicss.com/mui-0.9.30/css/mui.min.css" rel="stylesheet" type="text/css" media="screen" />-->

        <!-- Fonts -->
        <!-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> -->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
        <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
            
        <!-- Theme CSS -->
        <link href="{{ asset('css/style-1.css') }}" rel="stylesheet">

        <!-- Flaticons addons -->
        <link rel="stylesheet" type="text/css" href="{{ asset('fonts/flaticon/flaticon.css') }}"> 

        <!-- Additional Scripts -->
        @stack('scripts')
    </head>
    <body onload="createHData()">
        <div id="app">   
            <div class="container">
                <!-- <nav class="navbar navbar-toggleable-md">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset('icon/epione-brand-logo.png') }}" width="44" height="32" alt="Epione" />
                    </a>
                    <div>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url ('/logout')}}"><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </nav> -->
                <ul class="list-group mb-3 mt-2">
                    <li class="list-group-item justify-content-between">
                        <img src="{{ asset('icon/epione-brand-logo.png') }}" width="44" height="32" alt="Epione" />
                        <a class="nav-link" href="{{ url ('/logout')}}"><i class="fa fa-sign-out fa-1x" aria-hidden="true"></i>Logout</a>
                    </li>
                </ul>
                

            </div>

            @yield('content')
        </div>

        <div class="container">
            <ul class="list-group mb-2 mt-3">
                <li class="list-group-item justify-content-between">
                    <p class="text-muted mt-4">Copyright &copy; epione 2017</p>
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#meet-team-modal">Meet the Team</a>
                </li>
            </ul>
        </div>

        @stack('modals')

        @stack('end_scripts')

        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="{{mix('js/app.js')}}" ></script>
    </body>
</html>
