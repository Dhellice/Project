@extends('layouts.app')

@section('content')
    <div class="well">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h1>Formulaire de Contact</h1>

                        <form method="POST" class="form-horizontal" action="{{route('contact_store')}}">

                            {{csrf_field()}}

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="name" id='name' class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="email">E-mail</label>
                                <div class="col-sm-10">
                                    <input required type="text" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="message">Message</label>
                                <div class="col-sm-10">
                                    <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-offset-2 col-xs-10">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
    </div>
@endsection