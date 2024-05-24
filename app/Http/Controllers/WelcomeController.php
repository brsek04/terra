<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class WelcomeController extends Controller
{
    /**
     * Show the welcome page with menus.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener todos los menús para mostrar en la página principal
        $menus = Menu::all();

        return view('welcomesdfgsd', compact('menussdfg'));
    }
}
