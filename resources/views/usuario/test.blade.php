@extends('layouts.app')


@section('contenido')
    <div class="container d-flex flex-row">
        <div class="row">
            <h1 class="text-center mt-3">Pruebas de salud mental</h1>

            <!-- Utilizando el método input para recuperar el valor pasado por la url -->
            @php
                 $prueba = request('noTest');
            @endphp

            @if($prueba>=1 and $prueba<=3 )

            <form method="POST" action="{{route('test.store')}}">
                @csrf

                <input type="text" name="id_usuario" value="{{Auth::id()}}" hidden>
                <input type="date" name="fecha_resulto" value="{{  \Carbon\Carbon::now()->format('Y-m-d') }}" hidden>
                <input type="number" name="resuelto" value="1" hidden>

                @foreach($respuestas as $i => $test)

                    <input  name="id_prueba" value="{{ $a= $test->id_prueba}}" hidden>

                    <input id="id_pregunta" hidden
                           class="form-control @error('id_pregunta') is-invalid @enderror"
                           name="id_pregunta[]" value="{{$test['id']}}" required>


                <!--
                    <section class="radio-section">
                        <div class="radio-list">
                            <h1>Which Social Media you Often use?</h1>
                            <div class="radio-item"><input name="radio" id="radio1" type="radio"><label for="radio1">INSTAGRAM</label></div>
                            <div class="radio-item"><input name="radio" id="radio2" type="radio"><label for="radio2">TWITTER</label></div>
                            <div class="radio-item"><input name="radio" id="radio3" type="radio"><label for="radio3">LINKEDIN</label></div>
                        </div>
                    </section>
                    -->



                    <div class="d-flex justify-content-center">

                        <section class="radio-section my-4">
                            <div class="radio-list">
                             <h2 class="text-center my-2"> {{$test->pregunta}} </h2>
                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje1{{+$i}}"
                                           value="0">

                                    <label class="form-check-label" for="puntaje1{{+$i}}">
                                        No se aplica a mí en lo absoluto.
                                    </label>
                                </div>

                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje2{{+$i}}"
                                           value="1">

                                    <label class="form-check-label" for="puntaje2{{+$i}}">
                                        Se aplica a mí hasta cierto punto o parte del tiempo.
                                    </label>
                                </div>

                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje3{{+$i}}"
                                           value="2">

                                    <label class="form-check-label" for="puntaje3{{+$i}}">
                                        Se aplica a mí en un grado considerable, o buena parte del tiempo.
                                    </label>
                                </div>

                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje4{{+$i}}"
                                           value="3">

                                    <label class="form-check-label" for="puntaje4{{+$i}}">
                                        Se aplica mucho a mí, o la mayoria del tiempo.
                                    </label>
                                </div>

                            </div>
                        </section>
                    </div>


                @endforeach

                <div class="d-flex justify-content-center mb-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>


            @else
                <form method="POST" action="{{route('test.store')}}">
                    @csrf

                    <input type="text" name="id_usuario" value="{{Auth::id()}}" hidden>
                    <input type="date" name="fecha_resulto" value="{{  \Carbon\Carbon::now()->format('Y-m-d') }}" hidden>
                    <input type="number" name="resuelto" value="1" hidden>

                    @foreach($respuestas as $i => $test)

                        <input  name="id_prueba" value="{{ $test->id_prueba}}" hidden>

                        <input id="id_pregunta" hidden
                               class="form-control @error('id_pregunta') is-invalid @enderror"
                               name="id_pregunta[]" value="{{$test['id']}}" required>

                        <input id="tipoPregunta" hidden
                               class="form-control @error('tipoPregunta') is-invalid @enderror"
                               name="tipoPregunta[]" value="{{$test['tipoPregunta']}}" required>






                        @php
                            $tipoPregunta=$test->tipoPregunta;
                            $directo=0;
                            $indirecto=0;
                        @endphp



                        <div class="d-flex justify-content-center">

                            <section class="radio-section my-4">
                                <div class="radio-list">

                            <h2 class="text-center my-2"> {{$test->pregunta}} </h2>
                                <div class="radio-item" >
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje5{{+$i}}"
                                            @if($tipoPregunta===1) {{$value=5, $directo=+$value;}}
                                            @elseif($tipoPregunta===2) {{$value=1;}}
                                            @endif
                                           value="{{$value, $indirecto=+$value;}}">

                                    <label class="form-check-label" for="puntaje5{{+$i}}">
                                        Siempre.
                                    </label>
                                </div>

                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje4{{+$i}}"
                                           @if($tipoPregunta===1) {{$value=4, $directo=+$value;}}
                                           @elseif($tipoPregunta===2) {{$value=2;}}
                                           @endif
                                           value="{{$value, $indirecto=+$value;}}">

                                    <label class="form-check-label" for="puntaje4{{+$i}}">
                                        Casi Siempre.
                                    </label>
                                </div>

                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje3{{+$i}}"
                                           @if($tipoPregunta===1) {{$value=3, $directo=+$value;}}
                                           @elseif($tipoPregunta===2) {{$value=3;}}
                                           @endif
                                           value="{{$value, $indirecto=+$value;}}">

                                    <label class="form-check-label" for="puntaje3{{+$i}}">
                                        Algunas Veces.
                                    </label>
                                </div>

                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje2{{+$i}}"
                                           @if($tipoPregunta===1) {{$value=2, $directo=+$value;}}
                                           @elseif($tipoPregunta===2) {{$value=4;}}
                                           @endif
                                           value="{{$value, $indirecto=+$value;}}">

                                    <label class="form-check-label" for="puntaje2{{+$i}}">
                                        Casi Nunca.
                                    </label>
                                </div>

                                <div class="radio-item">
                                    <input class=""
                                           type="radio"
                                           name="puntaje[]{{+$i}}"
                                           id="puntaje1{{+$i}}"
                                           @if($tipoPregunta===1) {{$value=1, $directo=+$value;}}
                                           @elseif($tipoPregunta===2) {{$value=5;}}
                                           @endif
                                           value="{{$value, $indirecto=+$value;}}">

                                    <label class="form-check-label" for="puntaje1{{+$i}}">
                                        Nunca.
                                    </label>
                                </div>

                                </div>
                            </section>
                        </div>

                    @endforeach

                  <div class="d-flex justify-content-center mb-4">
                      <button type="submit" class="btn btn-primary">Enviar</button>
                  </div>

                </form>
            @endif


        </div>
    </div>
@endsection
