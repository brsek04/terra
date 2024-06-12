<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Beverage; // Asegúrate de importar el modelo de Beverage

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate();
        $dishes = Dish::all(); // Cargar todos los platos disponibles
        $beverages = Beverage::all(); // Cargar todas las bebidas disponibles
        $selectedDishes = []; // No hay platos seleccionados en el caso de crear un nuevo menú
        $selectedBeverages = []; // No hay bebidas seleccionadas en el caso de crear un nuevo menú

        return view('menu.index', compact('menus', 'dishes', 'beverages', 'selectedDishes', 'selectedBeverages'))
            ->with('i', (request()->input('page', 1) - 1) * $menus->perPage());
    }

    public function create()
    {
        $menu = new Menu();
        $dishes = Dish::all(); // Cargar todos los platos disponibles
        $beverages = Beverage::all(); // Cargar todas las bebidas disponibles
        $selectedDishes = []; // No hay platos seleccionados en el caso de crear un nuevo menú
        $selectedBeverages = []; // No hay bebidas seleccionadas en el caso de crear un nuevo menú

        return view('menu.create', compact('menu', 'dishes', 'beverages', 'selectedDishes', 'selectedBeverages'));
    }

    public function store(Request $request)
    {
        $request->validate(Menu::$rules);

        $menu = Menu::create($request->all());

        // Sincronizar los platos seleccionados con el menú recién creado
        $menu->dishes()->sync($request->input('dishes', []));

        // Sincronizar las bebidas seleccionadas con el menú recién creado
        $menu->beverages()->sync($request->input('beverages', []));

        return redirect()->route('menus.index')
            ->with('success', 'Menu created successfully.');
    }

    public function show($id)
    {
        $menu = Menu::find($id);

        return view('menu.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        $dishes = Dish::all();
        $beverages = Beverage::all();
        
        // Obtener los platos seleccionados para este menú, si hay alguno
        $selectedDishes = $menu->dishes ? $menu->dishes->pluck('id')->toArray() : [];
    
        // Obtener las bebidas seleccionadas para este menú, si hay alguna
        $selectedBeverages = $menu->beverages ? $menu->beverages->pluck('id')->toArray() : [];
    
        return view('menu.edit', compact('menu', 'dishes', 'beverages', 'selectedDishes', 'selectedBeverages'));
    }
    

    public function update(Request $request, Menu $menu)
    {
        $request->validate(Menu::$rules);

        $menu->update($request->all());

        // Actualizar la relación many-to-many de los platos
        $menu->dishes()->sync($request->input('dishes', []));

        // Actualizar la relación many-to-many de las bebidas
        $menu->beverages()->sync($request->input('beverages', []));

        return redirect()->route('menus.index')
            ->with('success', 'Menu updated successfully');
    }

    public function destroy($id)
    {
        // Encuentra el menú que deseas eliminar
        $menu = Menu::findOrFail($id);

        // Elimina manualmente las relaciones en la tabla beverages_in_menu
        $menu->beverages()->detach();

        // Ahora puedes eliminar el menú sin problemas
        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu deleted successfully');
    }

    public function shop($id)
    {
        $menu = Menu::with('dishes', 'beverages')->findOrFail($id);
        return view('shop', compact('menu'));
    }
    
   

    public function showMenusByBranch(Branch $branch)
    {
        $menus = $branch->menus;
        return view('branch.menus', compact('menus', 'branch'));
    }
}
