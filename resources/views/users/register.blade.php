@extends('layout')
@section('content')

<div class="card" style="width: 25rem;">
    <div class="card-body">
        <form action="/users" method="POST" id="form-signup">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="name" name="name">
            </div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="email" name="email">
            </div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="password" name="password">
            </div>
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <span class="error" id="errorPass2"></span>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Repetir Senha</span>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="password_confirmation" name="password_confirmation">
            </div>
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="btn btn-primary" type="submit" value="Registrar">
        </form>
    </div>
</div>

@endsection