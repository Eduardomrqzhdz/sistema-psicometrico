<?php

namespace App\Repository;

use App\Models\pregunta;

class TestRepository
{
    public function allTest($noTest)
    {

        return Pregunta::latest('pregunta')
            ->select('id','pregunta','id_prueba','tipoPregunta')
            ->where('id_prueba', $noTest)
            ->reorder()
            ->get();

        /*
          //  SELECT pregunta FROM pregunta WHERE id_prueba = '1';
                return Test::latest('pregunta')
                    ->join('respuestas', 'pregunta.id', '=', 'respuestas.id_pregunta')
                    ->select('pregunta.pregunta', 'pregunta.id','pregunta.id_prueba')
                    ->where('id_prueba', $noTest)
                    ->reorder()
                    ->get();
         */
    }
}
