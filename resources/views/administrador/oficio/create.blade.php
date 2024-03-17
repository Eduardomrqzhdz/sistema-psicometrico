@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.oficio.store')}}" method="POST" class="container ">
       @csrf

        <div class="mt-4">
            <x-input-label for="oficio" :value="__('Oficio')" />
            <x-text-input id="oficio" name="oficio" type="text" class="mt-1 block w-full"  required autofocus autocomplete="oficio" />
            <x-input-error class="mt-2" :messages="$errors->get('oficio')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Crear oficio
            </x-primary-button>
        </div>
    </form>
@endsection
