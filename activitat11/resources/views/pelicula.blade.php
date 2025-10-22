@extends('layout')
@section('contenido')
    <section id="contenido">
        <div class='row animated fadeIn slow'>
            <div class='column col-8'>
                <div class="card m-auto">
                    @if ($pelicula)
                        <div class="card-body">
                            <h2 class="card-title">{{$pelicula->titulo ?? null}}</h2>
                            <hr>
                            <h5 class="card-subtitle mb-2 text-muted">
                                Dirección: {{$pelicula->direccion ?? null}}
                            </h5>
                            <h5 class="card-subtitle mb-2 text-muted">
                                Año: {{$pelicula->anio ?? null}}
                            </h5>
                            <hr>
                            <p class="card-text">{{$pelicula->sinopsis ?? null}}</p>
                        </div>
                    @else
                        <h4>Película no existe</h4>
                    @endif
                </div>
                <br>
                @auth
                    <a href="{{route('vista.pelicula.mto', [$pelicula->id])}}" class="btn btn-outline-primary
                            btn-block">Mantenimiento</a>
                @endauth
                <a href="/peliculas" class="btn btn-outline-primary btn-block">Volver a listado</a>
            </div>
            <div class='column col-4'>
                <img src='{{asset("img/$pelicula->img")}}'>
            </div>
        </div>
    </section>
@endsection