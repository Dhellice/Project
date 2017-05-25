@extends('layouts.app')
<style>
    .container{
        margin-top: 12% !important;
    }
    #inscription{
        background-color: #7f8c8d !important;
    }

    .panel-body{
        background-color: #f5f5f5;
    }

    .button-two {
        border-radius: 4px;
        background-color:#a94442 !important;
        border: #a94442 !important;
        border: none;
        padding: 20px;
        width: 200px;
        transition: all 0.5s;
    }


    .button-two span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button-two span:after {
        content: '»';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button-two:hover span {
        padding-right: 25px;
    }

    .button-two:hover span:after {
        opacity: 1;
        right: 0;
    }

    .button {
        text-decoration: none;
        color: #fff;
        display: inline-block;
        padding: 15px 20px;
        position: relative;
        z-index: 1;
        overflow: hidden;
        -webkit-transition: all 0.4s cubic-bezier(0.25, 0.1, 0.2, 1);
        transition: all 0.4s cubic-bezier(0.25, 0.1, 0.2, 1);
    }
    .button:before, .button:after {
        position: absolute;
        content: "";
        display: block;
    }
    .button:before {
        top: -120px;
        left: 50px;
        z-index: -1;
        width: calc(100% + 140px);
        height: 100px;
        -webkit-transition: all 0.4s cubic-bezier(0.25, 0.1, 0.2, 1);
        transition: all 0.8s cubic-bezier(0.25, 0.1, 0.2, 1);
        -webkit-transform: skew(70deg);
        transform: skew(70deg);
        background: #a94442;
    }
    .button:after {
        top: 0;
        left: 0;
        z-index: -2;
        width: calc(100% - 2px);
        height: calc(100% - 2px);
    }
    .button:hover:before {
        left: -50px;
        top: -20px;
    }

</style>
@section('content')

<body id="inscription">
<div class="container" style="margin-top: 10%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Inscrivez-vous : </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div></div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmer le mot de passe</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary button-two">
                                    <span>S'inscrire</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-primary button" onclick="history.go(-1)" target="_blank" style="border: none!important;">
                                    <span>Retour</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
