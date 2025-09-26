@extends('layout')
@section('contenido')
    <section id="contenido">
        <div class='row animated fadeIn slow'>
            <div class='column col-8'>
                @if (session('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                <div class="card m-auto">
                    <form id='formulario' action="{{route('crud.pelicula.modificacion', [$pelicula ?? null])}}"
                        method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <h2 class="card-title">
                                <input name='titulo' type='text' value="{{old('titulo') ?? $pelicula->titulo ?? null}}">
                            </h2>
                            @error('titulo')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <hr>
                            <h5 class="card-subtitle mb-2 text-muted">Dirección:
                                <input name='direccion' value="{{old('direccion') ?? $pelicula->direccion ?? null}}">
                            </h5>
                            @error('direccion')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <h5 class="card-subtitle mb-2 text-muted">Año:
                                <input name='anio' type='number' min='1900' max='2100'
                                    value="{{old('anio') ?? $pelicula->anio ?? null}}">
                            </h5>
                            @error('anio')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <hr>
                            <textarea rows='8' cols='90'
                                name='sinopsis'>{{old('sinopsis') ?? $pelicula->sinopsis ?? null}}</textarea>
                            @error('sinopsis')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <hr>
                            <input type="file" class="form-control" name="portada" id='portada' accept='image/*'
                                onchange="previsualizar(event)">
                            @error('portada')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <hr>
                            <button type=" button" class="btn btn-warning" onclick="enviarFormulario('PUT')">Modificar
                                película</button>
                            <button type="button" class="btn btn-danger" onclick="enviarFormulario('DELETE')">Baja
                                película</button>
                            <a href="/peliculas" class="btn btn-outline-primary btn-block" style='float:right'>Volver a
                                listado</a>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
            <div class='column col-4'>
                <img src='{{asset("img/$pelicula->img") ?? asset("img/sinportada.jpg")}}' alt="previsualizar"
                    id='previsualizar'>
            </div>
        </div>
    </section>
    <script>
        function enviarFormulario(metodo) {
            document.querySelector('[name=_method').value = metodo
            //cambiar la ruta del formulario
            const accion = (metodo == 'PUT')
                ? "{{route('crud.pelicula.modificacion', [$pelicula->id])}}"
                : "{{route('crud.pelicula.baja', [$pelicula->id])}}"
            document.querySelector('#formulario').setAttribute('action', accion)
            document.querySelector('#formulario').submit()
        }
    </script>
@endsection