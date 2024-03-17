@extends('layouts.app')

@section('contenido')
    <div class="container">
        <div class="row">
            <h1 class="text-center mt-3">Usuarios</h1>
            <div class="col-12">
                <table class="table table-green table-striped  my-5">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre usuario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Puntaje</th>
                        <th scope="col">Peporte PDF</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($resultados as $resultadoss)
                        <tr>

                            <td data-title="id">{{$loop->index}}</td>

                            <td data-title="name">{{$resultadoss->name}}</td>
                            <td data-title="email">{{$resultadoss->fecha_resulto}}</td>
                            <td data-title="password">{{$resultadoss->puntaje_total}}</td>
                            <td data-title="password"><a href="{{route('resultadosPDF',$idResultados=$resultadoss->idResultados,['resultadosPDF'=>$idResultados])}}" class="btn-secondary" target="_blank">
                                    Ver resultados.</a></td>


                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
