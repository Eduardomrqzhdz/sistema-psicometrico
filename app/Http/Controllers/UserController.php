<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{

    public function __construct(protected UsersRepository $usersRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // $this->authorize('viewAny',User::class);
        if (Gate::denies('admin')) {
            abort(403); // Acceso prohibido si la política falla
        }else{
        return view('administrador.usuarios',
            ['user'=>$this->usersRepository->allUser()]); }
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
    public function edit(user $user)
    {
        return view('administrador.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'rol'=>'required|string|max:255',
        ]);

        $user->update($request->all());

        session()->flash('swal');
        //dd(session('swal'));

        return redirect()->route('usuarios',$user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //muestra los datos en el dashboard
    public function datos()
    {
        return view('dashboard',
            ['resultados'=>$this->usersRepository->datos()]);
    }

    public function resultados($noTest)
    {
        return view('administrador.resultados',
            ['resultados'=>$this->usersRepository->resultados($noTest)]);
    }

}
