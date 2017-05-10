<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gnégné</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <script src="https://use.fontawesome.com/0a2d5cb410.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 30px;
                display: inline-block;
                margin-left: 5%;
            }

            .fa-video-camera{
                font-size: 50px;
            }

            .title2 {
                font-size: 20px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #textwell{
                margin-left: 20%;
            }

            body{
                background-color: #7f8c8d !important;
            }

            .btnc{
                text-decoration: none !important;
                color: #FFFFFF !important;
            }

            .btnh1{
                background-color: #3B5998  !important;
                width: 200px;
            }

            .btnh2{
                background-color: #33CCFF  !important;
                width: 200px;
            }

            .btnh3{
                background-color: #a94442  !important;
                width: 200px;
            }
        </style>
    </head>
    <body>
    <div class="flex-center position-ref full-height">
        <div class="well">
            <div class="content">
                <i class="fa fa-video-camera" aria-hidden="true"></i>
                <div class="title m-b-md">
                    Bienvenue sur gnégné.com
                </div>
                <hr>
                <div class="title2 m-b-md">
                    Inscrivez vous ou connectez vous via vos réseaux sociaux :
                </div>
                <div class="links">
                    <button type="button" class="btn btnh1 btn-default"><a href="" class="btnc">Facebook</a></button><br><br>
                    <button type="button" class="btn btnh2 btn-default"><a href="" class="btnc">Twitter</a></button><br><br>
                    <button type="button" class="btn btnh3 btn-default"><a href="login" class="btnc">Connexion</a></button><br><br>
                </div>
                <hr>
                <button type="button" class="btn btn-default"><a href="register">Inscription</a></button>
                <a href="series" id="textwell">Continuer sans se connecter</a>
            </div>
        </div>
    </div>
    </body>
</html>
