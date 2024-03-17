<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/* Route::get('/', function () {
    return view('welcome');
}); */

//Redirección al login
Route::redirect('/', 'login');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard',
        [\App\Http\Controllers\UserController::class, 'datos'])
        ->name('dashboard');

    /*Rutas administrador*/
    Route::get('/usuarios.index',
        [\App\Http\Controllers\UserController::class, 'index'])
        ->name('usuarios');

    Route::get('/usuarios.edit/{user}',
        [\App\Http\Controllers\UserController::class, 'edit'])
        ->name('user.edit');

    Route::put('/usuarios.update{user}',
        [\App\Http\Controllers\UserController::class, 'update'])
        ->name('user.update');

    /*pruebas*/
    Route::get('/pruebas.indexA',
        [\App\Http\Controllers\PruebaController::class, 'indexA'])
        ->name('pruebasA');

    /*Resultados*/
    Route::get('/resultados.index/{noTest}',
        [\App\Http\Controllers\UserController::class, 'resultados'])
        ->name('resultadosA');

    /*Rutas generales para crear un crud*/

    /*Sexo*/
    Route::resource('/sexo',\App\Http\Controllers\SexoController::class)
        ->names('administrador.sexo')
        ->except('show');

    /*oficio*/
    Route::resource('/oficio',\App\Http\Controllers\OficioController::class)
        ->names('administrador.oficio')
        ->except('show');

    /*carrera*/
    Route::resource('/carrera',\App\Http\Controllers\CarreraController::class)
        ->names('administrador.carrera')
        ->except('show');

    /*region*/
    Route::resource('/region',\App\Http\Controllers\RegionController::class)
        ->names('administrador.region')
        ->except('show');



    /*Rutas usuarios*/
    /*Pruebas*/
    Route::get('/pruebas.indexU',
        [\App\Http\Controllers\PruebaController::class, 'indexU'])
        ->name('pruebasU');

    /*Test*/
    Route::get('/test.index/{noTest}',
        [\App\Http\Controllers\TestController::class, 'index'])
        ->name('tests');

    Route::post('/test/store',
        [\App\Http\Controllers\TestController::class, 'store'])
        ->name('test.store');

    Route::get('/testResueltos',
        [\App\Http\Controllers\PruebaController::class, 'testResueltos'])
        ->name('testResueltos');

    /*Resultados PDF*/
    Route::get('/resultados.pdf/{idResultados}',
        [\App\Http\Controllers\PDFController::class, 'generarPDF'])
        ->name('resultadosPDF');

    /*Enviar resultados por correo*/
    Route::get('/enviar-correo/{idResultados}',
        [\App\Http\Controllers\PDFController::class, 'enviarCorreo'])
        ->name('enviarCorreo');

});


require __DIR__.'/auth.php';
