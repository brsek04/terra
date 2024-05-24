<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\DishType;
use Illuminate\Http\Request;

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
        $types = DishType::pluck('name', 'id');
        return view('dish.create', compact('dish', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'rating' => 'required|numeric',
            'prep_time' => 'required',
            'photo' => 'required',
            'type_id' => 'required',
        ]);

        $dish = Dish::create($validatedData);

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
        $types = DishType::pluck('name', 'id');
        return view('dish.edit', compact('dish', 'types'));
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
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'rating' => 'required|numeric',
            'prep_time' => 'required',
            'photo' => 'required',
            'type_id' => 'required',
        ]);

        $dish->update($validatedData);

        return redirect()->route('dishes.index')
            ->with('success', 'Dish updated successfully');
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
        $dish->delete();

        return redirect()->route('dishes.index')
            ->with('success', 'Dish deleted successfully');
    }
}
