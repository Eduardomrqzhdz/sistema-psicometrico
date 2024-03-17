@extends('layouts.app')

@section('contenido')
    <div class="container flex flex-row">
        <div class="row justify-content-center">
            <h1 class="text-center my-4">Pruebas de salud mental</h1>

            @foreach($prueba as $pruebas)
                <div class="col-12 col-md-6 col-lg-4  my-3">
                    <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pruebas->prueba }}</h5>
                            <p class="card-text">{{ $pruebas->descripcion }}</p>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('resultadosA', ['noTest' => $pruebas->id, 'resultados' => $pruebas]) }}" class="card-link">
                                Ver prueba.
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
