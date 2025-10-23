@extends('layout')
@section('contingut')

    <h2>Mantenimiento paciente</h2>
    <br>
    <form id='formulario' method='post' action="">
        @csrf
        @method('PUT')
        <input type="hidden" id='idpaciente' value="{{ $paciente->idpaciente ?? null }}" name='idpaciente'>
        <div class="mb-3">
            <label class="form-label">NIF:</label>
            <input type="text" class="form-control" id="nif" value="{{ $paciente->nif ?? null }}" name="nif">
        </div>
        <div class="mb-3">
            <label class="form-label">Nom:</label>
            <input type="text" class="form-control" id="nombre" value="{{ $paciente->nombre ?? null }}" name="nombre">
        </div>
        <div class="mb-3">
            <label class="form-label">Cognoms:</label>
            <input type="text" class="form-control" id="apellidos" value="{{ $paciente->apellidos ?? null }}"
                name="apellidos">
        </div>
        <div class="mb-3">
            <label class="form-label">Data Ingrés:</label>
            <input type="date" class="form-control" id="fechaingreso" value="{{ $paciente->fechaingreso ?? null }}"
                name="fechaingreso">
        </div>
        <div class="mb-3">
            <label class="form-label">Data Alta Mèdica:</label>
            <input type="date" class="form-control" id="fechaalta" value="{{ $paciente->fechaalta ?? null }}"
                name="fechaalta">
        </div>
        <br>

        <button type="button" id="modificacion" name="modificacion" class="btn btn-primary">Modificar paciente</button>
        <button type="button" id="baja" name="baja" class="btn btn-danger">Baja paciente</button>
    </form>
@endsection