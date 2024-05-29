<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class DishController
 * @package App\Http\Controllers
 */
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::paginate();

        return view('dish.index', compact('dishes'))
            ->with('i', (request()->input('page', 1) - 1) * $dishes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dish = new Dish();
        return view('dish.create', compact('dish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar la solicitud para asegurarse de que se envió una imagen
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // ajusta las reglas según tus necesidades
        ]);
    
        // Obtener la imagen del formulario
        $image = $request->file('photo');
    
        // Generar un nombre único para la imagen
        $imageName = time().'.'.$image->extension();
    
        // Guardar la imagen en la carpeta public/images
        $image->move(public_path('images'), $imageName);
    
        // Crear el nuevo plato con la ruta de la imagen
        $dish = Dish::create(array_merge($request->all(), ['photo' => 'images/'.$imageName]));
    
        // Redireccionar a la vista de index con un mensaje de éxito
        return redirect()->route('dishes.index')
            ->with('success', 'Dish created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::find($id);

        return view('dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::find($id);

        return view('dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        request()->validate(Dish::$rules);

        $dish->update($request->all());

        return redirect()->route('dishes.index')
            ->with('success', 'Dish updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);
    
        // Verificar si el plato existe
        if ($dish) {
            // Eliminar la imagen si existe
            if ($dish->photo && Storage::disk('public')->exists($dish->photo)) {
                Storage::disk('public')->delete($dish->photo);
            }
    
            // Eliminar el plato de la base de datos
            $dish->delete();
    
            return redirect()->route('dishes.index')
                ->with('success_del', 'Dish deleted successfully');
        } else {
            return redirect()->route('dishes.index')
                ->with('error', 'Dish not found');
        }
    }
}
