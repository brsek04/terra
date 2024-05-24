<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    /**
     * Display the menus for visitors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('visitante', compact('menus'));
    }
}
