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

    .supprimer {
        margin-left:-9px;
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

            <h2 class="text-center" style="margin-bottom: 30px;">Modifier le commentaire</h2>
                        <form method="POST" class="form-horizontal" action="{{route('comments.update', [$comment->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="body">Message</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" value="{{$comment->message}}" name="message">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" class="btn btn-primary button">Envoyer</button>
                                </div>
                            </div>
                        </form>

                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <form method="POST" class="form-horizontal" action="{{route('comments.destroy', [$comment->id])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-primary button supprimer">Supprimer</button>
                                </form>
                            </div>
                        </div>

                        @include('messages.errors')
                    </div>
                </div>
    </body>
@endsection
