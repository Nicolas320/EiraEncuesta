<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/resultados.css') }}">

    <style>
        body {
            text-align: center;
        }

        #formulario {
            max-width: 700px; /* Ajusta según sea necesario */
            margin: 0   auto;
        }

        .img-eira {
            display: block;
            margin: 0 auto;
            max-width: 100%; /* Ajusta según sea necesario */
            height: auto;
        }

        .title {
            font-size: 24px;
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th, td {
            padding: 10px;
            text-align: center;
            width: 40%;
        }

        .califitext {
            margin-top: 20px;
        }

        .rstatencion {
            width: 100%;
            height: 100px;
            margin-top: 10px;
        }

        .comentarios {
            margin-top: 20px;
        }

        .comentariosrst {
            width: 100%;
            height: 100px;
            margin-top: 10px;
        }

        .firma {
            margin-top: 20px;
        }
    </style>

    <title>PDF ENCUESTA</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="/IMG/logo.png" type="image/x-icon">
</head>

<body>
    <form id="formulario">
        {{-- <a href="{{ url('/') }}">
            <img class="img-eira" src="img/LogoEira.png" alt="" width="280">
        </a> --}}
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
            </tr>
        </table>

        <br>
        <div class="califitext">Cómo califica la atención del personal que le prestó el servicio de acuerdo al grado de
            satisfacción?</div>
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

        <textarea class="rstatencion" name="resultados_atencion" id="resultados_atencion"
            readonly>{{ isset($atencionIndividual) ? $atencionIndividual->resultados_atencion : '' }}</textarea>

        <div class="comentarios">Escribe aquí tus comentarios, felicitaciones, quejas o inquietudes.</div>

        <div class="comentario">
            <br>
            <br>
            <textarea class="comentariosrst" name="comentarios" id="comentarios">{{ isset($atencionIndividual) ? $atencionIndividual->comentarios : '' }}</textarea>
        </div>
        <br>
        <br>

        <div class="firma">Firma</div>
        <br>
        <br>
        <br>
    </form>
</body>

</html>
