@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.carrera.update',$carrera)}}" method="POST" class="container ">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <x-input-label for="carrera" :value="__('Carrera')" />
            <x-text-input id="carrera" name="carrera" type="text" class="mt-1 block w-full" value="{{$carrera->carrera}}"  required autofocus autocomplete="carrera" />
            <x-input-error class="mt-2" :messages="$errors->get('carrera')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Actualizar carrera
            </x-primary-button>
        </div>
    </form>
@endsection
