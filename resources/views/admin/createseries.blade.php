@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="{{route('admin.storeseries')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Nom</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="name" class="form-control" id="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="resume">Résumé</label>
                                <div class="col-sm-10">
                                    <textarea name="resume" id="resume" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="image">Image</label>
                                <input type="file" name="image" id="image">
                            </div>



                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>

                            @include('messages.errors')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection