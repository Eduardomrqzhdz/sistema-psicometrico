@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.sexo.store')}}" method="POST" class="container ">
       @csrf

        <div class="mt-4">
            <x-input-label for="sexo" :value="__('Sexo')" />
            <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full"  required autofocus autocomplete="sexo" />
            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Crear sexo
            </x-primary-button>
        </div>
    </form>
@endsection
