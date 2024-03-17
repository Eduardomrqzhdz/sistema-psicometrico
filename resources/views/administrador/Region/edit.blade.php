@extends('layouts.app')

@section('contenido')
    <form action="{{route('administrador.region.update',$region)}}" method="POST" class="container ">
        @csrf
        @method('PUT')
        <div class="mt-4">
            <x-input-label for="region" :value="__('Region')" />
            <x-text-input id="region" name="region" type="text" class="mt-1 block w-full" value="{{$region->region}}"  required autofocus autocomplete="region" />
            <x-input-error class="mt-2" :messages="$errors->get('region')" />
        </div>

        <div class="flex justify-start mt-4">
            <x-primary-button>
                Actualizar region
            </x-primary-button>
        </div>
    </form>
@endsection
