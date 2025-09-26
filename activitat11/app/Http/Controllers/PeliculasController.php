<?php

namespace App\Http\Controllers;
use App\Models\Pelicula;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rule;
class PeliculasController extends Controller
{
    public function alta(Request $request)
    {
        $datos = request()->all();
        $imagen = $request->file('portada');
        $rules = array(
            'titulo' => 'required|unique:peliculas,titulo',
            'direccion' => 'required',
            'anio' => 'required|numeric|min:1900|max:2100',
            'sinopsis' => 'required',
            'portada' => 'image|mimes:jpg,jpeg,png|max:300'
        );

        $validator = Validator::make($datos, $rules);
        if ($validator->fails()) {
            return redirect()->route('vista.pelicula.alta')->withErrors($validator)->withInput();
        }

        if ($imagen) {
            $nombreArchivo = uniqid() . '_' . $imagen->getClientOriginalName();
            Storage::putFileAs('', $imagen, $nombreArchivo);
            $datos['portada'] = $nombreArchivo;
        } else {
            $datos['portada'] = 'sinportada.jpg';
        }

        $datos['pelicula'] = Pelicula::alta($datos);
        $datos['mensaje'] = "Alta efectuada";
        return redirect()->route('vista.pelicula.alta')->with('success', $datos);

    }

    public function modificacion(Pelicula $pelicula, Request $request)
    {
        $datos = request()->all();
        $imagen = $request->file(key: 'portada');
        $rules = ([
            'titulo' => ['required', Rule::unique('peliculas', 'titulo')->ignore($pelicula->id, 'id')],
            'direccion' => ['required'],
            'anio' => ['required', 'numeric', 'max:2100', 'min:1900'],
            'sinopsis' => ['required'],
            'portada' => ['image', 'mimes:jpg,jpeg,png', 'max:300'],
        ]);

        $validator = Validator::make($datos, $rules);
        if ($validator->fails()) {
            return redirect()->route('vista.pelicula.mto', parameters: $pelicula)->withErrors($validator)->withInput();
        }

        if ($imagen) {
            $nombreArchivo = uniqid() . '_' . $imagen->getClientOriginalName();
            Storage::putFileAs('', $imagen, $nombreArchivo);
            $datos['portada'] = $nombreArchivo;
            if ($pelicula->img != 'sinportada.jpg') {
                Storage::delete($pelicula->img);
            }
        } else {
            $datos['portada'] = 'sinportada.jpg';
        }

        try {
            $pelicula->update($datos);
            if (!$pelicula->getChanges()) {
                throw new Exception('No se han modificado datos de la película');
            }
            $datos['mensaje'] = "Modificación efectuada";

            return redirect()->route('vista.pelicula.mto', [$pelicula->id])->with(
                'success',
                $datos['mensaje']
            );
        } catch (Exception $e) {
            $datos['mensaje'] = $e->getMessage();
        } catch (QueryException $e) {
            $datos['mensaje'] = $e->errorInfo[2];
        }
        return redirect()->route('vista.pelicula.mto', $pelicula)->with('withErrors', $datos)->withInput();

    }

    public function baja(Pelicula $pelicula)
    {
        $deleted = $pelicula->delete();
        if ($deleted && $pelicula->img != 'sinportada.jpg') {
            Storage::delete($pelicula->img);
        }
        return redirect()->route("vista.peliculas.consulta");
    }
}
