@extends('layouts.app')

<style>
    .row{
        margin-left: 10px;
    }

    .block{
        padding: 20px;
    }

    .comment {
        color:white;
    }

    .comment:hover {
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
        width: 210px;
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
            <div class="panel-heading"><h1 class="text-center">Les commentaires</h1></div>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        @forelse($comments as $comment)
                         <div class="col-xs-5 col-md-3 block well" style="margin-left:75px;">
                            <h1 class="title">{{ $comment->message }}</h1>

                             <br><button class="btn btn-primary button-two"><a class="comment" href="{{route('admin.editcomments', ['id' => $comment->id])}}">
                                     <span>Modifier le commentaire</span>
                                 </a></button>
                             <button class="btn btn-primary button-two"><a class="comment" href="{{route('admin.destroycomments', ['id' => $comment->id])}}">
                                     <span>Supprimer le commentaire</span>
                                 </a></button>


                        </div>
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$comments->links()}}
                    </div>
                </div>

@endsection
