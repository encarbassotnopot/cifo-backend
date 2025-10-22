@extends('layout')
@section('contenido')
    <section id="contenido">
        <form id='formulario' method='POST' action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') ?? null }}">
            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <label for="email">Contrasenya</label>
            <input type="password" class="form-control" name="password" value="{{ null }}">
            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <input type="checkbox" name="recordar" id="recordar">
            <label for="recordar">Mantenir sessió iniciada</label>
            @error('login')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror
            <br>
            <button type="submit" class="btn btn-success">
                Login
            </button>
        </form>
    </section>
@endsection