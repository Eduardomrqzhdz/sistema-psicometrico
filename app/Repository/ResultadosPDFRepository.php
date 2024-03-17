<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ResultadosPDFRepository
{
    public function resultados($idResultado)
    {
        /*
        SELECT users.name, carrera.carrera, region.region, prueba.prueba, puntaje_total,fecha_resulto,prueba.id
        FROM resultados
        INNER JOIN users ON resultados.id_usuario = users.id
        INNER JOIN prueba ON resultados.id_prueba = prueba.id
        INNER JOIN carrera ON carrera.id=users.id_carrera
        INNER JOIN region ON region.id=users.id_region
        WHERE id_usuario=1 and prueba.id=2 and fecha_resulto='2023-10-08';
         */
        $resultados = DB::table('resultados')
            ->select('resultados.id as idResultados','users.name',
                'carrera.carrera', 'region.region', 'prueba.prueba',
                'puntaje_total', 'fecha_resulto','fecha_resulto','prueba.id',
                'resultados.puntajeDirecto as puntajeDirecto',
                'resultados.puntajeIndirecto as puntajeIndirecto')
            ->join('users', 'resultados.id_usuario', '=', 'users.id')
            ->join('prueba', 'resultados.id_prueba', '=', 'prueba.id')
            ->join('carrera', 'carrera.id', '=', 'users.id_carrera')
            ->join('region', 'region.id', '=', 'users.id_region')
            // ->where('id_usuario', $usuarioId)
            ->where('resultados.id', $idResultado)
            // ->where('fecha_resulto', $fecha)
            ->first();

        /*
        $directorio = DB::table('directorio')
            ->select('nombre', 'descripcion', 'direccion', 'telefono', 'horario', 'correo', 'region.region')
            ->join('region', 'directorio.id_region', '=', 'region.id')
            ->join('users', 'region.id', '=', 'users.id_region')
            ->where('users.id', 2)

            ->get(); */
        return $resultados;

        //return $resultados and $directorio;
        // return view('nombre_de_otra_vista', compact('directorio','resultados'));
    }
}
