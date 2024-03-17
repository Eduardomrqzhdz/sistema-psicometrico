<?php

namespace App\Repository;

use App\Models\Prueba;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PruebaRepository
{
    public function allPrueba()
    {
        return Prueba::all();
        //  return Prueba::latest()->paginate(10);
    }

    public function testResueltos()
    {
        /*
           SELECT resultados.id as idResultados, prueba.prueba, fecha_resulto,  puntaje_total, prueba.id as idPrueba
            FROM resultados
            INNER JOIN users ON resultados.id_usuario = users.id
            INNER JOIN prueba ON resultados.id_prueba = prueba.id
            WHERE id_usuario=1
            ORDER BY fecha_resulto DESC;
        */
        $usuarioId=Auth::id();
        $resultados = DB::table('resultados')
            ->select('resultados.id as idResultados', 'prueba.prueba', 'fecha_resulto', 'puntaje_total','fecha_resulto','prueba.id')
            ->join('users', 'resultados.id_usuario', '=', 'users.id')
            ->join('prueba', 'resultados.id_prueba', '=', 'prueba.id')
            ->where('id_usuario', $usuarioId)
            ->orderBy('resultados.id', 'desc')
            ->get();
        return $resultados;
    }
}
