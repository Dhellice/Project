@extends('layouts.app')
<style>
    .button {
        text-decoration: none;
        color: #fff;
        display: inline-block;
        position: relative;
        z-index: 1;
        overflow: hidden;
        -webkit-transition: all 0.4s cubic-bezier(0.25, 0.1, 0.2, 1);
        transition: all 0.4s cubic-bezier(0.25, 0.1, 0.2, 1);
        border: none !important;
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
    <div class="container">
        <div class="row">
            <div class="panel-heading text-center"><h1>Ajoutez des amis :</h1></div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif


            @forelse($users as $user)
                @if (Auth::user()->id != $user->id )

                <div class="col-xs-5 col-md-4 block" style="padding-bottom: 30px;">
                    <img src="/img/avatars/{{ $user->avatar }}" style="width:150px; height:150px; border-radius: 50%; margin-left: 30%;">
                    <h3 class="title text-center">{{ $user->name }}</h3>

                    @if(Auth::check())
                        <a style="margin-left: 35%;" class="btn btn-primary navbar-btn button" href="{{ route('user.ami', $user->id) }}">Ajouter en ami</a><br>
                    @endif
                </div>
                @endif


            @empty
                Rien du tout
            @endforelse

        </div>
    </div>
    @endsection