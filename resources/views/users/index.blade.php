@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h1>Profil</h1>

                            <h2>{{Auth::user()->name}}</h2>
                            <p>{{Auth::user()->email}}</p>
                             <p>{{Auth::user()->created_at}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
