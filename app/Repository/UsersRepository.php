<?php

namespace App\Repository;

use App\Models\Resultados;
use Illuminate\Support\Facades\DB;

class UsersRepository
{

    public function allUser()
    {
        //  return User::latest()->paginate(10);
        /*
         * SELECT name, email, sexo.sexo, CAST(DATEDIFF(CURDATE(), fecha_nacimiento) / 365 AS UNSIGNED) AS edad,
         * oficio.oficio, carrera.carrera, region.region
         * FROM users
         * INNER JOIN sexo ON users.id_sexo = sexo.id
         * INNER JOIN oficio ON users.id_oficio = oficio.id
         * INNER JOIN carrera ON users.id_carrera = carrera.id
         * INNER JOIN region ON users.id_region = region.id;
         */
        $users = DB::table('users')
            ->join('sexo', 'users.id_sexo', '=', 'sexo.id')
            ->join('oficio', 'users.id_oficio', '=', 'oficio.id')
            ->join('carrera', 'users.id_carrera', '=', 'carrera.id')
            ->join('region', 'users.id_region', '=', 'region.id')
            ->select('users.id',
                'users.name',
                'users.email',
                'sexo.sexo',
                DB::raw('CAST(DATEDIFF(CURDATE(), users.fecha_nacimiento) / 365 AS UNSIGNED) AS edad'),
                'carrera.carrera',
                'oficio.oficio',
                'region.region'
            )
            ->orderBy('users.created_at', 'desc')
            ->paginate(3);
        return $users;
    }

    public function datos()
    {

        /*
        SELECT
        (SELECT COUNT(*) FROM users WHERE Sexo = 'Mujer') AS Mujeres,
        (SELECT COUNT(*) FROM users WHERE Sexo = 'Hombre') AS Hombres,
        (SELECT COUNT(*) FROM users WHERE oficio = 'Estudiante') AS Estudiantes,
        (SELECT COUNT(*) FROM users WHERE oficio = 'Docente') AS Docentes,
        (SELECT COUNT(*) FROM prueba) AS test,
        (SELECT COUNT(*) FROM users ) AS usuario,
        COUNT(*)  as total_usuarios
        FROM users
        INNER JOIN resultados ON users.id = resultados.id_usuario
        INNER JOIN prueba ON resultados.id_prueba = prueba.id;
        */

        $resultados = DB::table('users')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('users')
                    ->where('id_sexo', '=', '2');
            }, 'Mujeres')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('users')
                    ->where('id_sexo', '=', '1');
            }, 'Hombres')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('users')
                    ->where('id_oficio', '=', '2');
            }, 'Estudiantes')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('users')
                    ->where('id_oficio', '=', '1');
            }, 'Docentes')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('prueba');
            }, 'Test')
            ->selectSub(function ($query) {
                $query->selectRaw('COUNT(*)')
                    ->from('users');
            }, 'Usuarios')
            ->selectRaw('COUNT(*) as total_usuarios')
            ->join('resultados', 'users.id', '=', 'resultados.id_usuario')
            ->join('prueba', 'resultados.id_prueba', '=', 'prueba.id')
            ->first();
        //  ->get();
        return $resultados;
    }

    public function resultados($noTest)
    {
        /*
            SELECT users.name, resultados.fecha_resulto, resultados.puntaje_total
            FROM resultados
            INNER JOIN users ON resultados.id_usuario = users.id
            WHERE resultados.id_prueba=2;
         */
        return Resultados::latest('resultados')
            ->join('users', 'resultados.id_usuario', '=', 'users.id')
            ->select('users.name', 'resultados.fecha_resulto','resultados.puntaje_total',
                'resultados.id as idResultados')
            ->where('id_prueba', $noTest)
            ->reorder()
            ->get();
    }

}
