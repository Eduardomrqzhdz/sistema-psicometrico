@extends('layouts.app')
<style>
   .c{

       width: 5rem;
       color: white;
       font-size: 3rem;
       font-weight: bold ;
       height: 5rem;
       background-color: #18529D;
       margin: 1rem;
       border-radius:.3rem ;

        }
</style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

@section('contenido')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                </div>
            </div>
        </div>
    </div>


@php
        $user = auth()->user();
        $rol = $user->rol;
@endphp

    @if($rol==1)
        <div class="container text-center">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-5 c d-flex align-items-center justify-content-center">
                    <h3>Usuarios: {{ $resultados->Usuarios}}</h3>
                </div>
                <div class="col-md-5 c d-flex align-items-center justify-content-center">
                    <h3>Test: {{$resultados->Test}}</h3>
                </div>
                <div class="col-md-5 c d-flex align-items-center justify-content-center">
                    <h3>Mujeres: {{ $resultados->Mujeres}}</h3>
                </div>
                <div class="col-md-5 c d-flex align-items-center justify-content-center">
                    <h3>Hombres: {{ $resultados->Hombres}}</h3>
                </div>
                <div class="col-md-5 c d-flex align-items-center justify-content-center">
                    <h3>Docentes: {{ $resultados->Docentes}}</h3>
                </div>
                <div class="col-md-5 c d-flex align-items-center justify-content-center">
                    <h3>Estudiantes: {{ $resultados->Estudiantes}}</h3>
                </div>
            </div>
        </div>
    @endif
@endsection
