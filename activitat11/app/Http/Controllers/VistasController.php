<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pelicula;

class VistasController extends Controller
{
    public function inicio()
    {
        $datos['pagina'] = 'Películas';
        return view('inicio')->with($datos);
    }
    public function alta()
    {
        $datos['pagina'] = 'Alta de película';
        return view('pelicula-alta')->with($datos);
    }
    public function peliculas()
    {
        $datos['peliculas'] = Pelicula::consulta();
        $datos['pagina'] = 'Lista de peliculas';
        return view('peliculas')->with($datos);
    }
    public function mantenimiento(Pelicula $pelicula)
    {
        $datos['pagina'] = 'Modificación y baja de película';
        $datos['pelicula'] = $pelicula;
        return view('pelicula-mto')->with($datos);
    }
    public function pelicula($id)
    {
        $datos['pagina'] = 'Detalle de película';
        $datos['pelicula'] = Pelicula::find($id);
        return view('pelicula')->with($datos);
    }
}
