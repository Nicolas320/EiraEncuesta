<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">
    <link rel="shortcut icon" href="https://cdn.jotfor.ms/assets/img/favicons/favicon-2021-light%402x.png">
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <title>Resultados Encuesta</title>

</head>
<body>



<form id="formulario">
    <a  href="{{ url('/') }}">
        <img class="img-eira" src="img/LogoEira.png" alt="" width="280">
    </a>

    <h1 class="title">ENCUESTA DE SATISFACCION</h1>

    <table>

    <tr>
        <td>Nombres y Apellidos</td>
        <th>{{ isset($registro) ? $registro->nombres_apellidos : '' }}</th>
    </tr>
    <tr>
        <td>Dirección</td>
        <th>{{ isset($registro) ? $registro->direccion : '' }}</th>
    </tr>
    <tr>
        <td>Teléfono</td>
        <th>{{ isset($registro) ? $registro->telefono : '' }}</th>
    </tr>
    <tr>
        <td>Género</td>
        <th>{{ isset($registro) ? $registro->genero : '' }}</th>
    </table>



    <br>
    <div class="califitext">Cómo califica la atención del personal que le prestó el servicio de acuerdo al grado de satisfacción?</div>
    <br>

    <table>
        <tr>
            <td>El trato recibido por el personal encargado</td>
            <th>{{ isset($atencionIndividual) ? $atencionIndividual->trato_personal : '' }}</th>
        </tr>

        <tr>
            <td>Tiempo de espera para ser atendido</td>
            <th>{{ isset($atencionIndividual) ? $atencionIndividual->tiempo_espera : '' }}</th>
        </tr>

        <tr>
            <td>La información, el trato y condiciones de privacidad</td>
            <th>{{ isset($atencionIndividual) ? $atencionIndividual->privacidad_info : '' }}</th>
        </tr>

        <tr>
            <td>Experiencia en general respecto a los servicios de salud</td>
            <th>{{ isset($atencionIndividual) ? $atencionIndividual->experiencia_salud : '' }}</th>
        </tr>
    </table>
    <br>
    <br>
    <br>
    <label class="textresultados" for="resultados_atencion">Resultados de Atencion:</label>

    <textarea class="rstatencion" name="resultados_atencion" id="resultados_atencion" readonly>{{ isset($atencionIndividual) ? $atencionIndividual->resultados_atencion : '' }}</textarea>


    <div class="comentarios">Escribe aquí tus comentarios, felicitaciones, quejas o inquietudes.</div>

    <div class="comentario">
        <br>
        <br>
        <textarea class="comentariosrst" name="comentarios" id="comentarios">{{ isset($atencionIndividual) ? $atencionIndividual->comentarios : '' }}</textarea>
    </div>
    <br>
    <br>

        @if(isset($firma) && !empty($firma->firma))
        <div class="firma">Firma</div>
        <br>
        <img src="{{ route('firma.image', ['id' => $firma->id]) }}" alt="Firma" width="300">
        <br>
        <br>
        <br>
    @endif
    <br>
    <br>
    <br>


</form>


<form class="hola" action="{{ route('formulario.buscarPorId') }}" method="post">
    @csrf
    <label for="id">ID del registro:</label>
    <input type="text" name="id" id="id" required>
    <button type="submit">Buscar</button>
    <br>
    <br>
</form>


</body>
</html>
