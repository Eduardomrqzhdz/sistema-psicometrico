@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.region.store')}}" method="POST" class="container ">
       @csrf

        <div class="mt-4">
            <x-input-label for="region" :value="__('Region')" />
            <x-text-input id="region" name="region" type="text" class="mt-1 block w-full"  required autofocus autocomplete="region" />
            <x-input-error class="mt-2" :messages="$errors->get('region')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Crear region
            </x-primary-button>
        </div>
    </form>
@endsection
