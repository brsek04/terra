<?php

namespace App\Http\Controllers;

use App\Models\DishType;
use Illuminate\Http\Request;

/**
 * Class DishTypeController
 * @package App\Http\Controllers
 */
class DishTypeController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-plato',['only'=>['index']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishTypes = DishType::paginate();

        return view('dish-type.index', compact('dishTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $dishTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dishType = new DishType();
        return view('dish-type.create', compact('dishType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DishType::$rules);

        $dishType = DishType::create($request->all());

        return redirect()->route('dish-types.index')
            ->with('success_add', 'DishType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dishType = DishType::find($id);

        return view('dish-type.show', compact('dishType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dishType = DishType::find($id);

        return view('dish-type.edit', compact('dishType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DishType $dishType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DishType $dishType)
    {
        request()->validate(DishType::$rules);

        $dishType->update($request->all());

        return redirect()->route('dish-types.index')
            ->with('success_edit', 'DishType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $dishType = DishType::find($id)->delete();

        return redirect()->route('dish-types.index')
            ->with('success_del', 'DishType deleted successfully');
    }
}
