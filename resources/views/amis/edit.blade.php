@extends('layouts.app')
<style>
    body{
        background-color: #32608e !important;
    color: white !important;
    }
</style>
@section('content')
<body>
                    <h2 class="text-center" style="margin-top: 20%;">Confirmation :</h2>

                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10 text-center">
                                <h5 style="margin-right: 23% !important;">Êtes-vous sûr de vouloir supprimer cet ami de votre liste d'amis ?</h5>
                                <form method="POST" class="form-horizontal" action="{{route('ami.destroy', [$ami->id])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button style="margin-right: 23% !important; margin-top: 2%;" type="submit" class="btn btn-primary">Supprimer</button>
                                </form>
                            </div>
                        </div>

                        @include('messages.errors')
                    </div>
</body>
@endsection