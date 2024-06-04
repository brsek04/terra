<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company; 
use App\Models\Commune; 
use Illuminate\Http\Request;

/**
 * Class BranchController
 * @package App\Http\Controllers
 */
class BranchController extends Controller
{

    function __construct(){
        $this->middleware('permission:ver-ramas',['only'=>['index']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::paginate();

        return view('branch.index', compact('branches'))
            ->with('i', (request()->input('page', 1) - 1) * $branches->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = new Branch();
        $companies = Company::pluck('name', 'id');
        $communes = Commune::pluck('name', 'id');
        return view('branch.create', compact('branch', 'companies', 'communes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Branch::$rules);

        $branch = Branch::create($request->all());

        return redirect()->route('branches.index')
            ->with('success_add', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch = Branch::find($id);

        return view('branch.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        $companies = Company::pluck('name', 'id');
        $communes = Commune::pluck('name', 'id');
        return view('branch.edit', compact('branch', 'companies', 'communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        request()->validate(Branch::$rules);

        $branch->update($request->all());

        return redirect()->route('branches.index')
            ->with('success_edit', 'Branch updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $branch = Branch::find($id)->delete();

        return redirect()->route('branches.index')
            ->with('success_del', 'Branch deleted successfully');
    }
}
