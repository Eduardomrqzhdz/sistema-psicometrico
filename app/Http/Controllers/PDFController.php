<?php

namespace App\Http\Controllers;

use App\Mail\resultadosCorreo;
use App\Repository\ResultadosPDFRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PDFController extends Controller
{
    public function __construct(protected ResultadosPDFRepository $resultadosPDFRepository)
    {

    }

    public function generarPDF($pruebaId)
    {   //Retorna en vista de PDF
        $resultados = $this->resultadosPDFRepository->resultados($pruebaId);

        $pdf = PDF::loadView('usuario.resultados', compact('resultados'));

        return $pdf->stream();

        //Retorna en vista blade
        /* return view('usuario.resultados',
             ['resultados'=>$this->resultadosPDFRepository->resultados($pruebaId)]); */
    }

    public function generarVista($pruebaId)
    {
        return view('usuario.rc',
            ['resultados'=>$this->resultadosPDFRepository->resultados($pruebaId)]);
    }

    public function store(Request $request, $pruebaId)
    {

        $request->validate([

        ]);

        Mail::to('eduardomrqzhdz@gmail.com')->send(new resultadosCorreo());
        return "Mensaje enviado";

    }


    //https://laravel.com/docs/10.x/mail
    public function enviarCorreo($pruebaId)
    {
        // Utiliza el repositorio para obtener los resultados
        $resultados = $this->resultadosPDFRepository->resultados($pruebaId);
        $user = Auth::user();
        $correoElectronico = $user->email;

        // Enviar el correo
        Mail::to($correoElectronico)->send(new resultadosCorreo($resultados));
        session()->flash('swalCorreo');
        return view('usuario.rc', compact('resultados'));
    }

    /**
     * Display a listing of the resource.
     */
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
