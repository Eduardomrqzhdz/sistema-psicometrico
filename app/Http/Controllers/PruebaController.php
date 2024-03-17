<?php

namespace App\Http\Controllers;

use App\Repository\PruebaRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PruebaController extends Controller
{
    public function __construct(protected PruebaRepository $pruebaRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */

    public function indexA()
    {
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else{
        return view('administrador.pruebas',
            ['prueba'=>$this->pruebaRepository->allPrueba()]); }
    }

    public function indexU()
    {
        if (Gate::denies('usuario')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            return view('usuario.pruebas',
                ['prueba' => $this->pruebaRepository->allPrueba()]);
        }
    }

    public function testResueltos()
    {
        if (Gate::denies('usuario')) {
            abort(403); // Acceso prohibido si la política falla
        }else {
            return view('usuario.testResueltos',
                ['test' => $this->pruebaRepository->testResueltos()]);
        }
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
