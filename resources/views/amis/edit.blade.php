@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <h5>Êtes-vous sûr de vouloir supprimer cet ami de votre liste d'amis ?</h5>
                                <form method="POST" class="form-horizontal" action="{{route('ami.destroy', [$ami->id])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-primary">Supprimer</button>
                                </form>
                            </div>
                        </div>

                        @include('messages.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection