@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.oficio.update',$oficio)}}" method="POST" class="container ">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <x-input-label for="oficio" :value="__('Oficio')" />
            <x-text-input id="oficio" name="oficio" type="text" class="mt-1 block w-full" value="{{$oficio->oficio}}"  required autofocus autocomplete="oficio" />
            <x-input-error class="mt-2" :messages="$errors->get('oficio')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Actualizar oficio
            </x-primary-button>
        </div>
    </form>
@endsection
