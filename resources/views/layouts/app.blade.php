<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Viewtopee') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script>
        $(function() {
            var pull 		= $('#pull');
            menu 		= $('nav ul');
            menuHeight	= menu.height();
            $(pull).on('click', function(e) {
                e.preventDefault();
                menu.slideToggle();
            });
            $(window).resize(function(){
                var w = $(window).width();
                if(w > 320 && menu.is(':hidden')) {
                    menu.removeAttr('style');
                }
            });
        });
    </script>
    @yield('css')
</head>
<style>


    /* Clearfix */
    .clearfix:before,
    .clearfix:after {
        content: " ";
        display: table;
    }
    .clearfix:after {
        clear: both;
    }
    .clearfix {
        *zoom: 1;
    }

    /* Basic Styles */

    *{
        font-family: Roboto;
    }

    body{
        margin-top: 60px;
    }

    nav {
        height: 60px;
        width: 100%;
        background: #7f8c8d;
        font-size: 11pt;
        font-family: 'PT Sans', Arial, sans-serif;
        font-weight: bold;
        position: relative;
        border-bottom: none;
    }
    nav ul {
        padding: 0;
        margin: 0 auto;
        width: 1000px;
        height: 40px;
    }
    nav li {
        display: inline;
        float: left;
        margin-top: 1%;
    }
    nav a {
        color: #fff;
        display: inline-block;
        width: 120px;
        text-align: center;
        line-height: 40px;
        text-decoration: none !important;
    }
    nav li a {
        box-sizing:border-box;
        -moz-box-sizing:border-box;
        -webkit-box-sizing:border-box;
    }
    nav li:last-child a {
        border-right: 0;
    }
    nav a:hover, nav a:active {
        text-decoration: none;
        border-bottom: 2px solid #337ab7 !important;
        color: #337ab7;
    }
    nav a#pull {
        display: none;
    }

    /*Styles for screen 600px and lower*/
    @media screen and (max-width: 600px) {
        nav {
            height: auto;
        }
        nav ul {
            width: 100%;
            display: block;
            height: auto;
        }
        nav li {
            width: 50%;
            float: left;
            position: relative;
        }
        nav li a {
            border-bottom: 1px solid #576979;
        }
        nav a {
            text-align: left;
            width: 100%;
            text-indent: 25px;
        }
    }

    /*Styles for screen 515px and lower*/
    @media only screen and (max-width : 480px) {
        nav {
            border-bottom: 0;
        }
        nav ul {
            display: none;
            height: auto;
        }
        nav a#pull {
            display: block;
            background-color: #283744;
            width: 100%;
            position: relative;
        }
        nav a#pull:after {
            content:"";
            background: url('http://media02.hongkiat.com/responsive-web-nav/demo/nav-icon.png') no-repeat;
            width: 30px;
            height: 30px;
            display: inline-block;
            position: absolute;
            right: 15px;
            top: 10px;
        }
    }

    /*Smartphone*/
    @media only screen and (max-width : 320px) {
        nav li {
            display: block;
            float: none;
            width: 100%;
        }
        nav li a {
            border-bottom: 1px solid #576979;
        }
    }

</style>
<body>
    <div id="app">
        <nav class="clearfix navbar-fixed-top">
            <ul class="clearfix">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="pull-left logo"><a href="{{ url('/') }}"><img style="width: 30px !important;height: 30px !important; margin-top: 5% !important;" src="{{ asset('img/logo.png')}}"></a></li>
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                    <li><a href="{{ route('series.index') }}">Séries</a></li>
                    <li><a href="{{ route('chatter.home') }}">Forum</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                @else
                    <li class="pull-left logo"><a href="{{ url('/') }}"><img style="width: 30px !important;height: 30px !important; margin-top: 5% !important;" src="{{ asset('img/logo.png')}}"></a></li>
                    <li><a href="{{ route('user.index') }}">Profil</a></li>
                    <li><a href="{{ route('series.index') }}">Séries</a></li>
                    <li><a href="{{ route('chatter.home') }} ">Forum</a></li>
                    <li><a href="{{ route('ami.index') }} ">Ajout Ami</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li class="dropdown">
                        <a href="#" style="display: inline !important;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu" >
                            <li>
                                <a   href="{{ route('logout') }}"
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
                @endif
            </ul>
            <a href="#" id="pull">Menu</a>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58a9c45a55766317"></script>
    @yield('js')
</body>
</html>
