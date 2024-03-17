<?php

namespace App\Http\Controllers;

use App\Models\Oficio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OficioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            $oficios = Oficio::paginate(10);
            return view('administrador.oficio.index', compact('oficios'));
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
            return view('administrador.oficio.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'oficio' => 'required|string|max:255',
        ]);

        // return $request->all();

        Oficio::create($request->all());

        session()->flash('swalCreate');
        return redirect()->route('administrador.oficio.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Oficio $oficio)
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            return view('administrador.oficio.edit', compact('oficio'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oficio $oficio)
    {
        $request->validate([
            'oficio' => 'required|string|max:255',
        ]);

        // return $request->all();

        $oficio->update($request->all());

        session()->flash('swalUpdate');
        return redirect()->route('administrador.oficio.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oficio $oficio)
    {
        $oficio->delete();

        return redirect()->route('administrador.oficio.index')->with('success', 'Oficio eliminado exitosamente.');
    }
}
