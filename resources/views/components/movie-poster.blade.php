@props(['movie'])
<a href="/movie/{{$movie->id}}">
    <div class="movie-poster" title="{{$movie->title}}">
        <img src="{{$movie->poster ? asset('/storage/' . $movie->poster) : asset('/images/noimage.jpg')}}" alt="{{$movie->title}}">
    </div>
</a>