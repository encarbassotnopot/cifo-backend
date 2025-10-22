@extends('layout')
@section('contenido')
    <section id="contenido">
        <div class='row animated fadeIn slow'>
            <form action="" class="d-flex justify-content-center">
                <div class="m-3">
                    <label class="form-label">Buscar por título:</label>
                    <input autofocus type="search" class="form-control" id="filtro" name="filtro" value="">
                </div>
            </form>
        </div>
        <hr>
        <div class="row row-cols-4 d-flex justify-content-evenly">
            @forelse ($peliculas as $pelicula)
                <div class="card m-2 mb-5">
                    <img class="card-img-top" src='{{asset("img/$pelicula[img]")}}'>
                    <div class="card-body">
                        <h4 class="card-title">{{$pelicula['titulo']}}</h4>
                        <p class="card-text"></p>
                        <p class="card-text">Dirección: {{$pelicula['direccion']}} </p>
                        <p class="card-text">
                            <small class="text-muted">Año: {{$pelicula['annio']}}</small>
                        </p>
                        <a href="{{route('vista.pelicula.detalle', ['id' => $pelicula->id])}}"
                            class="btn btn-outline-primary btn-block">Ver
                            más...</a>
                        @auth
                            <a href="{{route('vista.pelicula.mto', [$pelicula->id])}}" class="btn btn-outline-primary
                                                btn-block">Mantenimiento</a>
                        @endauth
                    </div>
                </div>
            @empty
                <h5>No hay datos</h5>
            @endforelse
        </div>
    </section>
@endsection