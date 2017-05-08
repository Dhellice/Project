@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form method="POST" class="form-horizontal" action="{{route('episodes.update', [$episode->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input required type="text" class="form-control" id="name" value="{{$episode->name}}" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="resume">Résumé</label>
                                <div class="col-sm-10">
                                    <textarea name="resume" class="form-control" id="resume" cols="30" rows="10">{{$episode->resume}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="saison_id">Saison</label>
                                <div class="col-sm-10">
                                    <input required type="number" class="form-control" id="saison_id" value="{{$episode->saison_id}}" name="saison_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>

                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <form method="POST" class="form-horizontal" action="{{route('episodes.destroy', [$episode->id])}}">
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