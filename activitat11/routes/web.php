<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VistasController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\auth\AutenticacionSesionController;

Route::get('/', [VistasController::class, 'inicio'])->name('inicio');

Route::get('/pelicula/alta', [VistasController::class, 'alta'])->name('vista.pelicula.alta')->middleware('auth');

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
])->name('vista.pelicula.mto')->middleware('auth');


Route::post('/pelicula/alta', [
    PeliculasController::class,
    'alta'
])->name('crud.pelicula.alta')->middleware('auth');

Route::put('/pelicula/mantenimiento/{pelicula}', [
    PeliculasController::class,
    'modificacion'
])->name('crud.pelicula.modificacion')->middleware('auth');

Route::delete('/pelicula/mantenimiento/{pelicula}', [
    PeliculasController::class,
    'baja'
])->name('crud.pelicula.baja')->middleware('auth');

Route::get('/login', [AutenticacionSesionController::class, 'vistalogin'])->name('vista.login');
Route::post('login', [AutenticacionSesionController::class, 'login'])->name('login');
Route::post('logout', [AutenticacionSesionController::class, 'logout'])->name('logout');