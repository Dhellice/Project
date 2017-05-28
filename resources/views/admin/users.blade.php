@extends('layouts.app')

<style>
    .row{
        margin-left: 10px;
    }

    .block{
        padding: 20px;
    }

    .user {
        color:white;
    }

    .user:hover {
        color:black;
        text-decoration:none;
    }


    h1{
        text-align: center;
    }

    .button-two {
        border-radius: 4px;
        background-color:#a94442 !important;
        border: #a94442 !important;
        border: none;
        width: 180px;
        transition: all 0.5s;
        display:inline-block;
        margin-top:5px;
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
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading"><h1 class="text-center">Les membres</h1></div>


                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @forelse($users as $user)
                            <div class="col-xs-5 col-md-3 block well" style="margin-left:75px;">
                                <h2>{{$user->name}}</h2>
                                <p>{{$user->email}}</p>
                                <p>{{$user->created_at}}</p>

                                <br><button class="btn btn-primary button-two"><a class="user" href="{{route('admin.editusers', [$user->id])}}">
                                        <span>Modifier le membre</span>
                                    </a></button>
                                <button class="btn btn-primary button-two"><a class="user" href="{{route('admin.destroyusers', ['id' => $user->id])}}">
                                        <span>Supprimer le membre</span>
                                    </a></button>
                            </div>
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$users->links()}}
                    </div>
                </div>

@endsection
