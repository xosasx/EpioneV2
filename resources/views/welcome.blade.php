<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Simple Animation -->
        <link href="css/animate.css" rel="stylesheet">

        <!-- Fonts -->
        <!--<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">-->
        <link href="https://fonts.googleapis.com/css?family=Poppins:600" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">-->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
        <!--  Bootstrap Icon -->
        <link href="css/bootstrap-social.css" rel="stylesheet">

        <!-- Theme CSS -->
        <link href="css/style.css" rel="stylesheet">

        <!-- Pass ID to Modal -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).on("click", ".user-type-button", function () {
                var userType = $(this).data('id');
                var link = "http://epione.oobazee.com/login/google/";
                link += userType;
                // console.log(link);
                if (userType == "Carer")
                    $("a#userLink").attr("href", "{{ route('dashboard.carer')}}");
                else
                    $("a#userLink").attr("href", link);
            });
        </script>
    </head>
    <body>
        @if (session('error'))
        <div class="alert-box">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('error') }}
            </div>
        </div>
        @endif

        <!-- Header -->
        <header id="top" class="header">            
            <div class="header-image"></div>
            <div class="text-vertical-center">
                <div id="icon-name-">
                    <img src="icon/epione-full-logo.png" alt="Eipone">
                </div>
                <div class="row mt-5">
                    <div class="col" align="center">
                        <i class="fa fa-user-md fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="col" align="center">
                        <i class="fa fa-user fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="col" align="center">
                        <i class="fa fa-heart fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="w-100"></div>
                    <div class="col" align="center">
                        <button class="disabled btn btn-outline-success btn-lg user-type-button" data-id="Doctor">Doctor</button>
                    </div>
                    <div class="col" align="center">
                        <button type="button" class="btn btn-outline-primary btn-lg user-type-button" data-id="Client" data-toggle="modal" data-target="#loginModal">Client</button>
                    </div>
                    <div class="col" align="center">
                        <button class="btn btn-outline-danger btn-lg user-type-button" data-id="Carer" data-toggle="modal" data-target="#loginModal">Carer</button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Sign in</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a id="userLink" href="" class="btn btn-block btn-social btn-google btn-lg">
                            <span class="fa fa-google"></span> Sign in with Google
                        </a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </body>
</html>