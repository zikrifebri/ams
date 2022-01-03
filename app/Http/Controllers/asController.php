<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartementRequest;
use App\departement;

class asController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $departement_list = departement::all();
        return view('departement.index', compact('departement_list'));
    }

 
    public function create()
    {
        return view('departement.create');
    }

 
    public function store(DepartementRequest $request)
    {
        departement::create($request->all());
        return redirect('departement');
    }

 
    public function show($id)
    {
        
    }

 
    public function edit(departement $departement)
    {
        return view('departement.edit', compact('departement'));
    }

 
    public function update(departement $departement, DepartementRequest $request)
    {
        $departement->update($request->all());
        return redirect('departement');
    }

  
    public function destroy(departement $departement)
    {
        $departement->delete();
        return redirect('departement');
    }
    
}
