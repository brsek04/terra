<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-plato', ['only' => ['index']]);
    }

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
        $types = DishType::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('dish.create', compact('dish', 'types', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'prep_time' => 'nullable|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type_id' => 'required|integer|exists:dish_types,id',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Manejo de la imagen
        $image = $request->file('photo');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        // Crear el nuevo plato
        $dish = Dish::create(array_merge($request->all(), ['photo' => 'images/'.$imageName]));

        return redirect()->route('dishes.index')
            ->with('success_add', 'Dish created successfully.');
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
        $types = DishType::pluck('name', 'id');
        $categories = Category::pluck('name', 'id');
        return view('dish.edit', compact('dish', 'types', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request, Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'price' => 'required|numeric',
            'rating' => 'nullable|numeric|min:0|max:5',
            'prep_time' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type_id' => 'required|integer|exists:dish_types,id',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Manejo de la imagen
        if ($request->hasFile('photo')) {
            // Eliminar la foto antigua si existe
            if ($dish->photo && file_exists(public_path($dish->photo))) {
                unlink(public_path($dish->photo));
            }

            // Guardar la nueva foto
            $image = $request->file('photo');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);

            // Actualizar la ruta de la foto en el plato
            $dish->photo = 'images/'.$imageName;
        }

        // Actualizar el resto de los detalles del plato
        $dish->update($request->except('photo'));

        return redirect()->route('dishes.index')
            ->with('success_edit', 'Dish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);

        // Verificar si el plato existe
        if ($dish) {
            // Eliminar la imagen si existe
            if ($dish->photo && file_exists(public_path($dish->photo))) {
                unlink(public_path($dish->photo));
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
