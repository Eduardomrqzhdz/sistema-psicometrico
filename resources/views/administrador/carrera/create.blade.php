@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.carrera.store')}}" method="POST" class="container ">
        @csrf

        <div class="mt-4">
            <x-input-label for="carrera" :value="__('Carrera')" />
            <x-text-input id="carrera" name="carrera" type="text" class="mt-1 block w-full"  required autofocus autocomplete="carrera" />
            <x-input-error class="mt-2" :messages="$errors->get('carrera')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Crear carrera
            </x-primary-button>
        </div>
    </form>
@endsection
