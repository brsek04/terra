<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja la autenticación de usuarios para la aplicación y
    | redirige a los usuarios a la pantalla principal. El controlador usa un trait
    | para proporcionar su funcionalidad a sus aplicaciones de manera conveniente.
    |
    */

    use AuthenticatesUsers;

    /**
     * Donde redirigir a los usuarios después de iniciar sesión.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Manejar la autenticación y redirección del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return redirect('/admin');
        } else {
            return redirect('/visitante');
        }
    }

    /**
     * Crear una nueva instancia del controlador.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

