@extends('layout')
@section('content')
<div class="movie-detail-container">
    @php
        $genres = explode(', ', $movie->genre)
    @endphp
    <div class="movie-detail-poster">
        <img src="{{$movie->poster ? asset('/storage/' . $movie->poster) : asset('/images/noimage.jpg')}}">
    </div>
    <div class="movie-detail-container-info">
        <div class="movie-detail-title">
            <h1>{{$movie->title}}</h1>
            <h4>({{$movie->year}})</h4>
        </div>
        <div class="genre-tags">
            @foreach($genres as $genre)
            <p><a href="/?genre={{$genre}}">{{$genre}}</a></p>
            @endforeach
        </div>
        <div class="movie-detail-title">
            <img src="{{asset('/images/gps.png')}}">
            <h5>{{$movie->country}}</h5>
        </div>
        <p class="synopsis">{{$movie->synopsis}}</p>
        <h3>Nota geral: {{$movie->total_score}}</h3>
        <div>
            @auth
            @if(!$score)
            <form method="POST" action="/score">
                @csrf
                <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                <label for="score">Avalie o filme:</label>
                <input type="number" name="score" id="score" min="1" max="10" step="0.1">
                <button type="submit">Enviar Avaliação</button>
            </form>
            @else
                <h5>Sua nota para este filme: {{ $score->score }} / 10</h5>
            @endif
            @endauth
            
        </div>
        
        @auth
        <div class="movie-detail-options">
            <a href="/movie/{{$movie->id}}/edit" class="btn btn-outline-warning">Editar</a>
            <form method="post" action="/movies/{{$movie->id}}">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger" type="submit">Deletar</button>
            </form>
        </div>
        @endauth
    </div>
</div>
@endsection