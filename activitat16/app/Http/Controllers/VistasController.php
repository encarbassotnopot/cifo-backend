<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PacienteController;

class VistasController extends Controller
{
    function home()
    {
        return view('home');
    }
    function alta()
    {
        return view('alta');
    }
    function consulta()
    {
        return redirect()->action([PacienteController::class, 'consultapacientes']);
    }
    function mantenimiento()
    {
        return view('mantenimiento');
    }
}
