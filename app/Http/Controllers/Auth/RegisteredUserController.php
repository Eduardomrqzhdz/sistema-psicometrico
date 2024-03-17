<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\carrera;
use App\Models\oficio;
use App\Models\region;
use App\Models\sexo;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\CustomEmailValidation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        //return view('auth.register');

        $sexos = Sexo::all();
        $oficios = Oficio::all();
        $regiones = Region::all();
        $carreras = Carrera::all();

        return view('auth.register', compact('sexos', 'oficios', 'regiones', 'carreras'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class, new CustomEmailValidation],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'rol' =>['required', 'numeric','between:1,2'],

            'id_sexo' => ['required', 'numeric', 'max:255'],
            'fecha_nacimiento' => ['required', 'date', 'max:255'],
            'id_oficio' => ['required', 'numeric', 'max:255'],
            'id_carrera' => ['required', 'numeric', 'max:255'],
            'id_region' => ['required', 'numeric', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,

            'id_sexo' => $request->id_sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'id_oficio' => $request->id_oficio,
            'id_carrera' => $request->id_carrera,
            'id_region' => $request->id_region
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
