<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\BeverageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BeverageController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-bebestibles',['only'=>['index']]);

    }
    public function index()
    {
        $beverages = Beverage::with('beverageType')->latest()->paginate(5);
        $types = BeverageType::pluck('name', 'id');

        return view('beverage.index', compact('beverages', 'types'))
            ->with('i', (request()->input('page', 1) - 1) * $beverages->perPage());
    }

    public function create()
    {
        $beverage = new Beverage();
        $types = BeverageType::pluck('name', 'id');
        return view('beverage.create', compact('beverage', 'types'));
    }

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
        $beverage = Beverage::create(array_merge($request->all(), ['photo' => 'images/'.$imageName]));
    
        // Redireccionar a la vista de index con un mensaje de éxito
        return redirect()->route('beverages.index')
            ->with('success_add', 'beverages created successfully.');
    }

    // Other methods (show, edit, update, destroy) remain unchanged...

    public function edit($id)
    {
        $beverage = Beverage::findOrFail($id);
        $types = BeverageType::pluck('name', 'id');
        return view('beverage.edit', compact('beverage', 'types'));
    }

    public function update(Request $request, Beverage $beverage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'alcohol' => 'nullable|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rating' => 'nullable|numeric|min:0',
            'type_id' => 'required|exists:beverage_types,id'
        ]);

         // Check if a new photo has been uploaded
         if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($beverage->photo && Storage::disk('public')->exists($beverage->photo)) {
                Storage::disk('public')->delete($beverage->photo);
            }
    
            // Store the new photo
            $image = $request->file('photo');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('images'), $imageName);
    
            // Update the photo path in the beverage
            $beverage->photo = 'images/'.$imageName;
        }
    
        // Update the rest of the beverage details
        $beverage->update($request->except('photo'));
    
        // Save the updated beverage
        $beverage->save();
    
        return redirect()->route('beverages.index')
            ->with('success_edit', 'beverage updated successfully');
    }

    public function destroy($id)
    {
        $beverage = Beverage::find($id);
    
        // Verify if the beverage exists
        if ($beverage) {
            // Delete the image if it exists
            if ($beverage->photo && file_exists(public_path($beverage->photo))) {
                unlink(public_path($beverage->photo));
            }
    
            // Delete the beverage from the database
            $beverage->delete();
    
            return redirect()->route('beverages.index')
                ->with('success_del', 'beverage deleted successfully');
        } else {
            return redirect()->route('beverages.index')
                ->with('error', 'beverage not found');
        }
    }
    
}
