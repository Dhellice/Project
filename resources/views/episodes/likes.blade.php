
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        @foreach ($articles->likes as $user)
                            {{ $user->name }} likes this !
                        @endforeach

                        @if ($articles->isLiked)
                            <a href="{{ route('article.like', $article->id) }}">Unlike this shit</a>
                        @else
                            <a href="{{ route('article.like', $article->id) }}">Like this awesome product!</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection