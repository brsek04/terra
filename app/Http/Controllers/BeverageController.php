<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use App\Models\BeverageType;
use Illuminate\Http\Request;

class BeverageController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-bebestibles',['only'=>['index']]);

    }
    public function index()
    {
        $beverages = Beverage::with('beverageType')->latest()->paginate(5);

        return view('beverage.index', compact('beverages'))
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
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'alcohol' => 'nullable|numeric|min:0',
            'photo' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0',
            'type_id' => 'required|exists:beverage_types,id'
        ]);

        $beverage = Beverage::create($request->all());

        return redirect()->route('beverages.index')
            ->with('success_add', 'Beverage created successfully.');
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
            'photo' => 'nullable|string|max:255',
            'rating' => 'nullable|numeric|min:0',
            'type_id' => 'required|exists:beverage_types,id'
        ]);

        $beverage->update($request->all());

        return redirect()->route('beverages.index')
            ->with('success_edit', 'Beverage updated successfully');
    }

    public function destroy(Beverage $beverage)
    {
        $beverage->delete();

        return redirect()->route('beverages.index')
            ->with('success_del', 'Beverage deleted successfully');
    }

    public function show($id)
    {
        $beverage = Beverage::findOrFail($id);
        return view('beverage.show', compact('beverage'));
    }
    
}
