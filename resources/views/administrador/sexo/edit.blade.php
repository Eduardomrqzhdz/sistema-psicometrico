@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.sexo.update',$sexo)}}" method="POST" class="container ">

        @csrf
        @method('PUT')
        <div class="mt-4">
            <x-input-label for="sexo" :value="__('Sexo')" />
            <x-text-input id="sexo" name="sexo" type="text" class="mt-1 block w-full" value="{{$sexo->sexo}}"  required autofocus autocomplete="sexo" />
            <x-input-error class="mt-2" :messages="$errors->get('sexo')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Actualizar sexo
            </x-primary-button>
        </div>
    </form>
@endsection
