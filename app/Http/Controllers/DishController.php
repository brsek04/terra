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
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'prep_time' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type_id' => 'nullable|integer',
        ]);
    
        // Check if a new photo has been uploaded
        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($dish->photo && Storage::disk('public')->exists($dish->photo)) {
                Storage::disk('public')->delete($dish->photo);
            }
    
            // Store the new photo
            $image = $request->file('photo');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
    
            // Update the photo path in the dish
            $dish->photo = 'images/'.$imageName;
        }
    
        // Update the rest of the dish details
        $dish->update($request->except('photo'));
    
        // Save the updated dish
        $dish->save();
    
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

    // Verify if the dish exists
    if ($dish) {
        // Delete the image if it exists
        if ($dish->photo && file_exists(public_path($dish->photo))) {
            unlink(public_path($dish->photo));
        }

        // Delete the dish from the database
        $dish->delete();

        return redirect()->route('dishes.index')
            ->with('success_del', 'Dish deleted successfully');
    } else {
        return redirect()->route('dishes.index')
            ->with('error', 'Dish not found');
    }
}

}
