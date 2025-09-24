<?php

namespace App\Models;

use Database\Factories\PeliculaFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Pelicula extends Model
{
    use HasFactory;
    protected $table = 'peliculas';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'direccion',
        'anio',
        'sinopsis',
        'img'
    ];

    public static function consulta()
    {
        return Pelicula::orderBy('titulo')->get();
    }

    public static function factory()
    {
        return new PeliculaFactory();
    }
}