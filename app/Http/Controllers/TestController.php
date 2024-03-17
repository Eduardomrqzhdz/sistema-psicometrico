<?php

namespace App\Http\Controllers;

use App\Models\Resultados;
use App\Models\Test;
use App\Repository\TestRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct(protected TestRepository $testRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index($noTest)
    {
        return view('usuario.test',
            ['respuestas'=>$this->testRepository->allTest($noTest)]);
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
        $request->validate([
            'puntaje' => 'required|array',
            'puntaje.*' => 'required',
        ], [
            'puntaje.required' => 'Debes seleccionar al menos una opción.',
            'puntaje.*.required' => 'Debes seleccionar una opción para cada pregunta.',
        ]);


        //valores recuperados del form
        //  $id_pruebas= $request->input('id_prueba');
        $id_preguntas = $request->input('id_pregunta');
        $puntajes = $request->input('puntaje');
        $tipoPreguntas = $request-> input('tipoPregunta');
        $id_prueba= $request->input('id_prueba');

        $suma = 0;
        $sumaDirecto = 0;
        $sumaIndirecto = 0;

        foreach ($id_preguntas as $key => $id_pregunta) {
            //  echo $id_pregunta = $id_preguntas[$key];

            $suma+= $puntaje = $puntajes[$key];

            if($id_prueba>3) {
                $tipoPregunta = $tipoPreguntas[$key];
                if ($tipoPregunta === '1') {
                    $sumaDirecto += $puntaje = $puntajes[$key];
                } elseif ($tipoPregunta === '2') {
                    $sumaIndirecto += $puntaje = $puntajes[$key];
                }
            }

            // Crear registros de tabla respuestas
            Test::create([
                //   'id_prueba'=> $id_prueba,
                'id_pregunta'=> $id_pregunta,
                'puntaje'=> $puntaje,
            ]);

        }


        //valores recuperados del form
        $puntaje_total= $request->input('puntaje_total');
        $resuelto= $request->input('resuelto');
        $id_usuario= $request->input('id_usuario');
        $id_prueba= $request->input('id_prueba');
        $fecha_resulto= $request->input('fecha_resulto');

        // Crear registros de tabla resultados
        Resultados::create([
            'puntaje_total'=> $suma,
            'puntajeDirecto'=> $sumaDirecto,
            'puntajeIndirecto'=> $sumaIndirecto,
            'resuelto'=> $resuelto,
            'id_usuario'=> $id_usuario,
            'id_prueba'=> $id_prueba,
            'fecha_resulto'=> $fecha_resulto,

        ]);


        session()->flash('swal');
       // return redirect('testResueltos');
        return redirect()->route('testResueltos');

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
