@extends('layout')
@section('content')
<div>
    <form method="POST" action="/movie" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Título</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="title" name="title" value="{{old('title')}}">
            
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Ano</span>
            <input type="number" min="0" step="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="year" name="year" value="{{old('year')}}">
        </div>
        @error('year')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">País</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="country" name="country" value="{{old('country')}}">
        </div>
        @error('country')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-text">
            Separe com vírgula. Ex: Terror, Comédia, Drama
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">Gênero</span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="genre" name="genre" value="{{old('genre')}}">
        </div>
        @error('genre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="synopsis">{{old('synopsis')}}</textarea>
                <label for="floatingTextarea">Sinopse</label>
            </div>
        </div>
        @error('synopsis')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Pôster</label>
            <input type="file" name="poster" class="form-control" id="inputGroupFile01">
          </div>
          
        <input class="btn btn-primary" type="submit" value="Registrar">
        </form>
</div>



@endsection