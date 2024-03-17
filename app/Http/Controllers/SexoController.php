<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class SexoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else{
        $sexos = Sexo::paginate(10);
        return view('administrador.sexo.index', compact('sexos')); }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            return view('administrador.sexo.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    $request->validate([
            'sexo' => 'required|string|max:255',
        ]);

       // return $request->all();

        Sexo::create($request->all());

        session()->flash('swalCreate');
        return redirect()->route('administrador.sexo.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sexo $sexo)
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else {

            return view('administrador.sexo.edit', compact('sexo'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sexo $sexo)
    {
        $request->validate([
            'sexo' => 'required|string|max:255',
        ]);

        // return $request->all();

        $sexo->update($request->all());

        session()->flash('swalUpdate');
        return redirect()->route('administrador.sexo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sexo $sexo)
    {
        $sexo->delete();

        return redirect()->route('administrador.sexo.index')->with('success', 'Sexo eliminado exitosamente.');
    }
}
