@extends('layouts.app')
<style>
    .well-sm{
        width: 60%;
        margin-left: 15%;
    }
    .button {
        text-decoration: none;
        color: #fff;
        display: inline-block;
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

    body{
        background-color: #32608e !important;
        color: white !important;
    }
</style>

@section('content')
    <body>
    <div class="well-sm">
        <div class="panel-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <h2 class="text-center" style="margin-bottom: 30px;">Modifier l'utilisateur</h2>
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.updateusers', [$user->id])}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail </label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$user->email}}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary button">
                                        Modifier
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </body>
@endsection
