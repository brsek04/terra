<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use Illuminate\Http\Request;

/**
 * Class BeverageController
 * @package App\Http\Controllers
 */
class BeverageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beverages = Beverage::paginate();

        return view('beverage.index', compact('beverages'))
            ->with('i', (request()->input('page', 1) - 1) * $beverages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beverage = new Beverage();
        return view('beverage.create', compact('beverage'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Beverage::$rules);

        $beverage = Beverage::create($request->all());

        return redirect()->route('beverages.index')
            ->with('success', 'Beverage created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beverage = Beverage::find($id);

        return view('beverage.show', compact('beverage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beverage = Beverage::find($id);

        return view('beverage.edit', compact('beverage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Beverage $beverage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beverage $beverage)
    {
        request()->validate(Beverage::$rules);

        $beverage->update($request->all());

        return redirect()->route('beverages.index')
            ->with('success', 'Beverage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $beverage = Beverage::find($id)->delete();

        return redirect()->route('beverages.index')
            ->with('success', 'Beverage deleted successfully');
    }
}
