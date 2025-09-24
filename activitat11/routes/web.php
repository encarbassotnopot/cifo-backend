<?php

use App\Http\Controllers\VistasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasController;

Route::get('/', [VistasController::class, 'inicio'])->name('inicio');

Route::get('/pelicula/alta', [VistasController::class, 'alta'])->name('vista.pelicula.alta');

Route::get('/peliculas', [
    VistasController::class,
    'peliculas'
])->name('vista.peliculas.consulta');

Route::get('/pelicula/{id}', [
    VistasController::class,
    'pelicula'
])->name('vista.pelicula.detalle');

Route::get('/pelicula/mantenimiento/{pelicula}', [
    VistasController::class,
    'mantenimiento'
])->name('vista.pelicula.mto');


Route::post('/pelicula/alta', [
    PeliculasController::class,
    'alta'
])->name('crud.pelicula.alta');

Route::put('/pelicula/mantenimiento/{pelicula}', [
    PeliculasController::class,
    'modificacion'
])->name('crud.pelicula.modificacion');

Route::delete('/pelicula/mantenimiento/{pelicula}', [
    PeliculasController::class,
    'baja'
])->name('crud.pelicula.baja');