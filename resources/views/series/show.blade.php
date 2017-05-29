<style>
    .title{
        font-size: 50px;
        text-align: center;
    }
    .perso{
        display: inline-block;
        margin-top: 10px;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
    .image_perso{
        margin-left: auto;
        margin-right: auto;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    #noms{
        width: 150px;
        font-size: 10px;
        background-color: #7D8DA4;
    }

    .menuderoulant {
        padding:0;
        margin:0;
        list-style:none;
    }

    .menuderoulant1{
        position: relative;
        background:#EFEFEF;
        border-radius: 6px;
        margin-bottom:2px;
        box-shadow: 3px 3px 3px #999;
        border:solid 1px #333A40
    }

    .menuderoulant2 {
        position: absolute;
        left:-999em;
    }

    .menuderoulant:hover .menuderoulant2 {
        top: 0;
        left: 0;
    }

    label {
        color:lightblue;
    }

    label:hover {
        color:darkslateblue;
    }

    .alignement{
        display: inline-block;
    }

    section {
        width: 50%;
        height: 15em;
        margin: 0 auto;
        overflow: hidden;
        background: #2980b9;
        -moz-border-radius: 0.5em;
        -webkit-border-radius: 0.5em;
        border-radius: 0.5em;
    }
    section img {
        position: relative;
        max-height: 100%;
        left: 50%;
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%);
    }
    @media (min-width: 800px) {
        section img {
            top: 50%;
            left: 0;
            max-height: none;
            width: 100%;
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }
    }

    .resumer{
        width: 50%;
        margin-left: 25%;
        margin-top: -5%;
    }
    hr.style {
        height: 30px;
        border-style: solid;
        border-color: #8c8b8b;
        border-width: 1px 0 0 0;
        border-radius: 20px;
        width: 50%;
        margin-top: 50px;
    }
    hr.style:before {
        display: block;
        content: "";
        height: 30px;
        margin-top: -31px;
        border-style: solid;
        border-color: #8c8b8b;
        border-width: 0 0 1px 0;
        border-radius: 20px;
    }


</style>
<script type="text/javascript">
    function catsel(sel) {
        //if (sel.value=="-1" ) return;
        var opt=sel.getElementsByTagName("option" );
        for (var i=0; i<opt.length; i++) {
            var x=document.getElementById(opt[i].value);
            if (x) x.style.display="none";
        }
        var cat = document.getElementById(sel.value);
        if (cat) cat.style.display="block";
    }
</script>
    @extends('layouts.app')

@section('content')


                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                           <section> <img src="{{ asset('img/' . $serie->image) }}"></section><hr class="style">
                        <h1 class="title">{{$serie->name}}</h1>
                            <h3 class="text-center"> Nombre de likes : {{ $nbrelikes }}</h3>
                            <div class="addthis_inline_share_toolbox_fxn8"></div>
                            <h3 class="text-center"> Note de la série :
                                @if($nombre > 0)
                                        @if(($somme / $nombre) > 4.5)
                                            ★★★★★
                                            (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 3.5)
                                             ★★★★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 2.5)
                                            ★★★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 1.5)
                                            ★★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 0.5)
                                            ★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                            @else
                                            Inférieur à 0.5
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                            @endif
                                    @else
                                    {{ "La moyenne de cette série n'est pas disponible" }}
                                    @endif</h3><hr class="style"><br>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->

                            <br>

                                   <div class="well resumer"> <p>{{$serie->resume}}</p>
                                       <br>
                                       <p> Statut: {{$serie->statu}}</p>
                                   </div>

                            @foreach ($serie->saison as $saison)
                                <ul class="list-group menuderoulant">

                                    <li class="list-group-item menuderoulant1">
                                            {{ $saison->name }}
                                         <br>
                                        @foreach ($saison->episode as $episode)
                                            <li class="list-group-item menuderoulant2">
                                                <a href="{{route('episodes.show', ['id' => $episode->id])}}"> {{ $episode->name }} </a>
                                            </li>
                                        </li>
                                        @endforeach
                                    <br><br>
                                </ul>
                            @endforeach


                            <table>

                                <tr>
                                    <td>
                                        Choisissez la saison :
                                    </td>
                                    <td>
                                        <select id ="serie" name="serie" onchange="catsel(this)">

                                            <option selected="selected" value='{{$saison->id}}'>{{$saison->name}}</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">


                                            <div id='serie' style="display:block">
                                                {{ $saison->name }}
                                                @foreach ($saison->episode as $episode)
                                                    <a href="{{route('episodes.show', ['id' => $episode->id])}}"> {{ $episode->name }} </a>
                                            @endforeach



                                        </div>
                                    </td>
                                </tr>
                            </table>

                            @if(Auth::check())

                                        <a class="btn btn-primary navbar-btn" href="{{ route('serie.like', $serie->id) }}">Aimer la serie</a><br>


                                <div class="rating" >
                                    <h3 class="text-center">Noter cette série
                                    <form style="padding-top: 20px;" id="test" method="POST" action="/series/{{ $serie->id }}/notes" onchange="document.getElementById('test').submit();">
                                    {{csrf_field()}}
                                            <label for="1">★</label>
                                            <input name="note" type="radio" value="1" id="1" class="etoile" style="visibility:hidden">

                                            <label for="2" >★</label>
                                            <input name="note" type="radio" value="2" id="2" class="etoile" style="visibility:hidden">

                                            <label for="3">★</label>
                                            <input name="note" type="radio" value="3" id="3" class="etoile"  style="visibility:hidden">

                                            <label for="4">★</label>
                                            <input name="note" type="radio" value="4" id="4" class="etoile"  style="visibility:hidden">

                                            <label for="5">★</label>
                                            <input name="note" type="radio" value="5" id="5" class="etoile"  style="visibility:hidden">
                                    </form></h3>
                                </div>

                            @endif


                            <h1 class="text-center">Personnages :</h1>
                            @foreach ($serie->personnage as $personnage)
                                <div class="perso">
                                <img class="image_perso" src="{{ asset('img/' . $personnage->image) }}">

                                <li class="list-group-item" id="noms">
                                    {{ $personnage->acteur }} <br> {{ $personnage->name }}
                                </li></div>
                            @endforeach


                        <hr>

                        <h3 class="text-center">Section commentaire : </h3>

                            <div class="comments">
                                <ul class="list-group">
                                    <h3> Nombres de commentaires : {{ $nbrecomments }}</h3>
                                    @foreach ($serie->comments as $comment)
                                        @foreach($users as $user)
                                            @if($user->id == $comment->user_id)
                                        <li class="list-group-item">
                                            <strong>
                                                {{$user->name}}
                                                {{ $comment->created_at->diffForHumans() }}
                                            </strong>
                                            {{ $comment->message }}<br>
                                            @if (Auth::check())
                                                @if (Auth::user()->id == $comment->user_id)
                                                    <a href="{{route('comments.edit', ['id' => $comment->id])}}">
                                                        Modifier le commentaire
                                                    </a>
                                                @endif
                                            @else
                                            @endif
                                        </li>
                                            @endif
                                    @endforeach
                                        @endforeach

                                </ul>
                            </div>
                        <div class="card">
                            <div class="card-block">
                                @if(Auth::check())
                                        <form method="POST" action="/series/{{ $serie->id }}/comments">

                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                    <textarea name="message" placeholder="Votre commentaire." class="form-control">

                                                    </textarea>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </form>
                                @else
                                    <h3>Veuillez vous connecter pour écrire un commentaire </h3>
                                @endif
                            </div>
                        </div>

                        <hr>


                            <a class="btn btn-default navbar-btn" href="{{route('series.index')}}">Retour</a>
                            <a class="btn btn-primary" href="{{route('series.show', ['id' => $serie->id - 1])}}"> Série précédente </a>
                            <a class="btn btn-primary" href="{{route('series.show', ['id' => $serie->id + 1])}}"> Série suivante </a>

@endsection

