<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function alta()
    {
        $paciente = request()->all();
        $rules = array(
            'nif' => 'required|unique:paciente,nif',
            'nombre' => 'required',
            'apellidos' => 'required',
            'fechaingreso' => 'required',
        );
        $validator = Validator::make($paciente, $rules);
        if ($validator->fails()) {
            return redirect('alta')->withErrors($validator)->withInput();
        }
        $datos['mensajes'] = "Alta efectuada";
        Paciente::alta($paciente);
        return redirect('alta')->with('success', $datos);

    }
}
