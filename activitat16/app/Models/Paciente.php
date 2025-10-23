<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'paciente';
    protected $primaryKey = 'idpaciente';
    public $timestamps = false;

    public static function alta($datos)
    {
        $paciente = Paciente::create([
            'nif'
            => $datos['nif'],
            'nombre' => $datos['nombre'],
            'apellidos' => $datos['apellidos'],
            'fechaingreso' => $datos['fechaingreso'],
            'fechaalta' => null
        ]);
        return $paciente;
    }
    public static function consulta()
    {
        return Paciente::orderBy('nombre', 'ASC', 'apellidos', 'ASC')->get();
    }


}
