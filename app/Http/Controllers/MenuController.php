<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Dish;

/**
 * Class MenuController
 * @package App\Http\Controllers
 */
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate();

        return view('menu.index', compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * $menus->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $menu = new Menu();
    $dishes = Dish::all(); // Cargar todos los platos disponibles
    $selectedDishes = []; // No hay platos seleccionados en el caso de crear un nuevo menú

    return view('menu.create', compact('menu', 'dishes', 'selectedDishes'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Menu::$rules);

        $menu = Menu::create($request->all());

        return redirect()->route('menus.index')
            ->with('success', 'Menu created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);

        return view('menu.show', compact('menu'));
    }
    public function showPublic(Menu $menu)
    {
        return view('menu.showPublic', compact('menu'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        $dishes = Dish::all();
        $selectedDishes = $menu->dishes->pluck('id')->toArray();

        return view('menu.edit', compact('menu', 'dishes', 'selectedDishes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Menu $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        request()->validate(Menu::$rules);

        $menu->update($request->all());

        // Actualizar la relación many-to-many
        $menu->dishes()->sync($request->input('dishes', []));

        return redirect()->route('menus.index')
            ->with('success', 'Menu updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $menu = Menu::find($id)->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu deleted successfully');
    }

   

    public function showMenusByBranch(Branch $branch)
    {
        $menus = $branch->menus;
        return view('branch.menus', compact('menus', 'branch'));
    }



}
