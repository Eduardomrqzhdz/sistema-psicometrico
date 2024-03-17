<?php

namespace App\Http\Controllers;

use App\Models\region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            $regiones = Region::paginate(10);
            return view('administrador.region.index', compact('regiones'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            return view('administrador.region.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'region' => 'required|string|max:255',
        ]);

        // return $request->all();

        Region::create($request->all());

        session()->flash('swalCreate');
        return redirect()->route('administrador.region.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Region $region)
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            return view('administrador.region.edit', compact('region'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $request->validate([
            'region' => 'required|string|max:255',
        ]);

        // return $request->all();

        $region->update($request->all());

        session()->flash('swalUpdate');
        return redirect()->route('administrador.region.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('administrador.region.index')->with('success', 'Region eliminado exitosamente.');
    }
}
