@extends('layout')
@section('contingut')
    <h2>Alta paciente</h2>
    <form id='formulario' method='POST' action="{{ route('altapaciente') }}">
        @csrf
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')['mensajes'] ?? null}}
            </div>
        @endif
        <div class="mb-3">
            <label class="form-label">NIF:</label>
            <input type="text" class="form-control" id="nif" name="nif">
        </div>
        @error('nif')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>
        @error('nombre')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos">
        </div>
        @error('apellidos')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Fecha Ingreso:</label>
            <input type="date" class="form-control" id="fechaingreso" name="fechaingreso">
        </div>
        @error('fechaingreso')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <br>
        <button type="submit" id="alta" name="alta" class="btn btn-success">Alta paciente</button>
        <br><br>
        <h4>

        </h4>
    </form>
@endsection