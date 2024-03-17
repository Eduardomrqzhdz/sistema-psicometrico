@extends('layouts.app')


@section('contenido')
    @if(session('swal'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Bien hecho",
                text: "Test realizado correctamente."
            });
        </script>
    @endif
    @section('contenido')
        @if(session('swalCorreo'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: "Bien hecho",
                    text: "Correo enviado correctamente."
                });
            </script>
        @endif
    <div class="container d-flex flex-row">
        <div class="row">
            <h1 class="text-center my-4">Test´s resueltos </h1>

            @foreach($test as $tests)
                <div class="col-12 col-md-6 col-lg-4 my-3">
                    <div class="card text-center" style="width: 18rem;">

                        <div class="card-body">
                            <h5 class="card-title">{{$tests->prueba}}</h5>
                            <p class="card-text my-4">Fecha: {{$tests->fecha_resulto}}</p>
                            <p class="card-text">Puntaje: {{$tests->puntaje_total}}</p>

                        </div>

                        <div class="card-body">

                            <a href="{{route('resultadosPDF',$idResultados=$tests->idResultados,['resultadosPDF'=>$idResultados])}}" class="btn btn-primary mb-3"target="_blank">
                                Ver resultados.</a>
                            <a href="{{route('enviarCorreo',$idResultados=$tests->idResultados,['enviarCorreo'=>$idResultados])}}" class="btn btn-primary">
                                Enviar resultados a Correo.</a>

                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>


@endsection
