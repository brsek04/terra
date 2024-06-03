<?php

namespace App\Http\Controllers;

use App\Models\BeverageType;
use Illuminate\Http\Request;

/**
 * Class BeverageTypeController
 * @package App\Http\Controllers
 */
class BeverageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('permission:ver-bebestibles',['only'=>['index']]);

    }
    public function index()
    {
        $beverageTypes = BeverageType::paginate();

        return view('beverage-type.index', compact('beverageTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $beverageTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beverageType = new BeverageType();
        return view('beverage-type.create', compact('beverageType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BeverageType::$rules);

        $beverageType = BeverageType::create($request->all());

        return redirect()->route('beverage-types.index')
            ->with('success_add', 'BeverageType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beverageType = BeverageType::find($id);

        return view('beverage-type.show', compact('beverageType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $beverageType = BeverageType::find($id);

        return view('beverage-type.edit', compact('beverageType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BeverageType $beverageType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeverageType $beverageType)
    {
        request()->validate(BeverageType::$rules);

        $beverageType->update($request->all());

        return redirect()->route('beverage-types.index')
            ->with('success_edit', 'BeverageType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $beverageType = BeverageType::find($id)->delete();

        return redirect()->route('beverage-types.index')
            ->with('success_del', 'BeverageType deleted successfully');
    }
}
