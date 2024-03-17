<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            $carreras = Carrera::paginate(10);
            return view('administrador.carrera.index', compact('carreras'));
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
            return view('administrador.carrera.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'carrera' => 'required|string|max:255',
        ]);

        // return $request->all();

        Carrera::create($request->all());

        session()->flash('swalCreate');
        return redirect()->route('administrador.carrera.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            return view('administrador.carrera.edit', compact('carrera'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Carrera $carrera)
    {
        $request->validate([
            'carrera' => 'required|string|max:255',
        ]);

        // return $request->all();

        $carrera->update($request->all());

        session()->flash('swalUpdate');
        return redirect()->route('administrador.carrera.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return redirect()->route('administrador.carrera.index')->with('success', 'Carrera eliminado exitosamente.');
    }
}
