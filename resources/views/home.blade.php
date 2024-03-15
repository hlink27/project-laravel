@extends('layout')
@section('content')

@unless(count($movies) == 0)
    @foreach ($movies as $movie)
    <x-movie-poster :movie="$movie"/>
    @endforeach
@else
<h1>Nenhum filme encontrado</h1>
@endunless
@endsection