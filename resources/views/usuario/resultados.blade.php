<!DOCTYPE html>
<html>
<head>
    <title>Resultados PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        h1{
            color: #18529D;
            font-size: 1.5rem;
        }
        p{
            font-size: 1.2rem;
        }

        .verde{
            color: #28AD56;
        }

        .card{
            background-color: var();
            border: solid #18529D 1px;
            width: 15rem;
        }


        .dirNombre{
            font-weight: 700;
            font-size: 1.1rem;
            color: #28AD56;
            background-color: #18529D;
            padding: .5rem;
            border-radius: 5px 5px 0 0;
        }

        .card-text{
            font-size: 1.2rem;
        }

        .card-dir{
            color: #18529D;
            font-weight: 700;
        }

        .card-tel{
            color: #28AD56;
            font-weight: 700;
        }

        img{
            width: 10rem;
        }
    </style>
</head>

<body>


<div class="text-center my-4">
    <img src="https://www.uv.mx/veracruz/nutricion/files/2021/04/Flor_con_uv_sin_fondo.png" alt="Logo">
</div>


@if ($resultados->id<'4')

<h1 class="text-center">Resultados del diágnostico Test DASS-21 </h1>
<h2 class="text-center my-3 verde">{{$resultados->name}} </h2>

<h3>Resultados mendiante el instrumento: {{ $resultados->prueba }} </h3>
<!--Test Depresión - DASS 21-->
@if ($resultados->id=='1')
    <p>En los resultados mostrados se evalúa el nivel de Depresión que se ha presentado
        en las ultimas 2 semanas. De manera que, el individuo puede verificar el nivel de Depresión que se encuentra
        en este momento.</p>
    <h3 class="text-center" >Rango de resultados</h3>
    <table class="table text-center border border-success border-3">
        <thead class="table-light ">
        <tr class="border border-success">
            <th scope="col" class="border border-success border-3">Depresión leve.</th>
            <th scope="col" class="border border-success border-3">Depresión moderada.</th>
            <th scope="col" class="border border-success border-3">Depresión severa.</th>
            <th scope="col" class="border border-success border-3">Depresión extremadamente severa.</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <th class="border border-success border-3">5-6</th>
            <th class="border border-success border-3">7-10</th>
            <th class="border border-success border-3">11-13</th>
            <th class="border border-success border-3">14 o más</th>

        </tr>
        </tbody>
    </table>

    <h3 class="verde">Puntaje: {{$resultados->puntaje_total}}</h3>

    @if ($resultados->puntaje_total <=6)
        <h3>Sus resultados indican que presenta algunos síntomas de Depresión leve.</h3>

    @elseif ($resultados->puntaje_total>=7 && $resultados->puntaje_total <= 10)
        <h3>Sus resultados indican que presenta algunos síntomas de Depresión moderada.</h3>

    @elseif ($resultados->puntaje_total>=11 && $resultados->puntaje_total <= 13)
        <h3>Sus resultados indican que presenta síntomas de Depresión severa.</h3>

    @elseif ($resultados->puntaje_total>=14)
        <h3>Sus resultados indican que presenta síntomas de Depresión extremadamente severa.</h3>
    @else
        <p>Pendiente...</p>
    @endif

<!--Test Ansiedad - DASS 21-->
@elseif($resultados->id=='2')
    <p>En los resultados mostrados se evalúa el nivel de Ansiedad que se ha presentado
        en las ultimas 2 semanas. De manera que, el individuo puede verificar el nivel de Ansiedad que se encuentra
        en este momento.

    <h3 class="text-center">Rango de resultados</h3>
<table class="table text-center border border-success border-3">
    <thead class="table-light ">
        <tr class="border border-success">
            <th scope="col" class="border border-success border-3">Ansiedad leve.</th>
            <th scope="col" class="border border-success border-3">Ansiedad moderada.</th>
            <th scope="col" class="border border-success border-3">Ansiedad severa.</th>
            <th scope="col" class="border border-success border-3">Ansiedad extremadamente severa.</th>
        </tr>
    </thead>

    <tbody>
    <tr>
        <th class="border border-success border-3">4</th>
        <th class="border border-success border-3">5-7</th>
        <th class="border border-success border-3">8-9</th>
        <th class="border border-success border-3">10 o más</th>

    </tr>
    </tbody>
</table>

<h3 class="verde">Puntaje: {{$resultados->puntaje_total}}</h3>

    @if ($resultados->puntaje_total <=4)
        <h3>Sus resultados indican que presenta algunos síntomas de Ansiedad leve.</h3>

    @elseif ($resultados->puntaje_total>=5 && $resultados->puntaje_total <= 7)
        <h3>Sus resultados indican que presenta algunos síntomas de Ansiedad moderada.</h3>

    @elseif ($resultados->puntaje_total>=8 && $resultados->puntaje_total <= 9)
        <h3>Sus resultados indican que presenta síntomas de Ansiedad severa.</h3>

    @elseif ($resultados->puntaje_total>=10)
        <h3>Sus resultados indican que presenta síntomas de Ansiedad extremadamente severa.</h3>

    @else
        <p>Pendiente...</p>
    @endif

<!--Test Estrés - DASS 21-->
@elseif($resultados->id=='3')
    <p>En los resultados mostrados se evalúa el nivel de Estrés que se ha presentado
        en las ultimas 2 semanas. De manera que, el individuo puede verificar el nivel de Estrés que se encuentra
        en este momento.</p>
    <h3 class="text-center" >Rango de resultados</h3>

    <table class="table text-center border border-success border-3">
        <thead class="table-light ">
        <tr class="border border-success">
            <th scope="col" class="border border-success border-3">Estrés leve.</th>
            <th scope="col" class="border border-success border-3">Estrés moderado.</th>
            <th scope="col" class="border border-success border-3">Estrés severo.</th>
            <th scope="col" class="border border-success border-3">Estrés extremadamente severo.</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <th class="border border-success border-3">8-9</th>
            <th class="border border-success border-3">10-12</th>
            <th class="border border-success border-3">13-16</th>
            <th class="border border-success border-3">17 o más</th>

        </tr>
        </tbody>
    </table>


    <h3 class="verde">Puntaje: {{$resultados->puntaje_total}}</h3>

    @if ($resultados->puntaje_total <=9)
        <h3>Sus resultados indican que presenta algunos síntomas de Estrés leve.</h3>

    @elseif ($resultados->puntaje_total>=10 && $resultados->puntaje_total <= 12)
        <h3>Sus resultados indican que presenta algunos síntomas de Estrés moderada.</h3>

    @elseif ($resultados->puntaje_total>=13 && $resultados->puntaje_total <= 16)
        <h3>Sus resultados indican que presenta síntomas de Estrés severa.</h3>

    @elseif ($resultados->puntaje_total>=17)
        <h3>Sus resultados indican que presenta síntomas de Estrés extremadamente severa.</h3>

    @else
        <p>Pendiente...</p>
    @endif
@endif

@else

    <h1 class="text-center">Resultado del diagnostico Test de Habilidades para la vida</h1>
    <h2 class="text-center my-3 verde">{{$resultados->name}} </h2>
    <h3>Resultados mendiante el instrumento: {{ $resultados->prueba }} </h3>

    <h3 class="text-center">Rango de resultados</h3>
    <table class="table text-center border border-success border-3">
        <thead class="table-light ">
        <tr class="border border-success">
            <th scope="col" class="border border-success border-3">Muy inferior.</th>
            <th scope="col" class="border border-success border-3">Inferior.</th>
            <th scope="col" class="border border-success border-3">Normal bajo.</th>
            <th scope="col" class="border border-success border-3">Normal alto.</th>
            <th scope="col" class="border border-success border-3">Superior.</th>
            <th scope="col" class="border border-success border-3">Muy superior.</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <th class="border border-success border-3">15-21</th>
            <th class="border border-success border-3">22-25</th>
            <th class="border border-success border-3">26-29</th>
            <th class="border border-success border-3">30-33</th>
            <th class="border border-success border-3">34-37</th>
            <th class="border border-success border-3">38-40</th>

        </tr>
        </tbody>
    </table>

    <h3 class="verde">Puntaje directo: {{$resultados->puntajeDirecto}}</h3>
    <h3 class="verde">Puntaje indirecto: {{$resultados->puntajeIndirecto}}</h3>
    <h3 class="verde">Puntaje total: {{$resultados->puntaje_total}}</h3>
@endif

<h3>Descargo de responsabilidad:</h3>
<!--
<p>
    Esta prueba está diseñada con la intención de ser una herramienta educativa e intuitiva.
    No garantizamos la exactitud de los resultados, ya que dependen de la precisión y fidelidad
    de la autoevaluación de los examinados y de la honestidad de sus respuestas.
    No deben usarse como un indicador de las capacidades del individuo para un propósito específico ni
    constituyen una evaluación psicológica o psiquiátrica de ningún tipo.
</p>
-->
<p>
    Es importante considerar que los resultados del presente informe son de carácter informativo,
    ya que para un diagnóstico se requieren otros elementos como la entrevista y la impresión diagnostica.
    Los datos aquí vertidos son un tamizaje realizado con fines de orientación, no de diagnóstico.
</p>

</body>
</html>
