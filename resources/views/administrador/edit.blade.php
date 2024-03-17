@extends('layouts.app')

@section('contenido')
    <form action="{{route('user.update',$user)}}" method="POST" class="container ">
        @csrf
        @method('PUT')
        <div class="my-4">
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{$user->name}}" required autofocus autocomplete="name" readonly/>
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div class="mb-4">
            <x-input-label for="rol" :value="__('Rol')" />
            <select id="rol" name="rol" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                <option value="1" {{ $user->rol == 1 ? 'selected' : '' }}>Administrador</option>
                <option value="2" {{ $user->rol == 2 ? 'selected' : '' }}>Usuario</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('rol')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Actualizar usuario
            </x-primary-button>
        </div>
    </form>
@endsection
