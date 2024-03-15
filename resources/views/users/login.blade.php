@extends('layout')
@section('content')

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">Log In</h5>
        <form action="/authenticate" method="POST">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="email">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="password" name="password">
            </div>
            <input class="btn btn-primary" type="submit" value="Log in">
        </form>
    </div>
</div>

@endsection