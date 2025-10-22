<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;

class AutenticacionSesionController extends Controller
{
    public function vistalogin()
    {
        $datos['pagina'] = 'Login usuario'; //si no hemos utilizado la directiva @yield
        return view('login')->with($datos);
    }

    public function login(Request $datos)
    {
        $credenciales = $datos->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);
        $recordar = $datos['recordar'] == 'on' ? true : false;
        $login = Auth::attempt($credenciales, $recordar);
        if (!$login) {
            throw ValidationException::withMessages([
                'login' => __('auth.failed')
            ]);
        }
        $datos->session()->regenerate();
        return redirect()->intended('/')->with(['status' => 'Login correcto']);
    }

    public function logout(Request $session)
    {
        Auth::guard('web')->logout();
        $session->session()->invalidate();
        $session->session()->regenerateToken();
        $datos['status'] = 'Usuario desconectado';
        return to_route('login')->with($datos);
    }
}
