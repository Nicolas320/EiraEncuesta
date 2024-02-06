<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/fin.css') }}">
    <link rel="shortcut icon" href="https://cdn.jotfor.ms/assets/img/favicons/favicon-2021-light%402x.png">
    <title>Gracias</title>
</head>
<body>


    <div class="grid-container">

    <form action="{{ route('buscar.registros') }}" method="GET">

    <a class="" href="{{ url('/') }}">
    <img class="img-eira" src="img/LogoEira.png" alt="" width="280">
    </a>

    <h1>Gracias!</h1>
        <p for="">Sus datos han sido recibidos</p>
        <a class="pdf" href="{{('pdf')}}">Descargar PDF</a>
        </div>

    <div class="search">
        <input type="text" name="query" class="form-control" placeholder="Buscar Usuario">
        <span class="input-group-btn">
            <button type="submit">Buscar</button>
        </span>

               <a href="{{ url('finEncuesta') }}" class="boton1">Limpiar</a>
    </div>


</form>



@if(isset($registros) && count($registros))
<div class="table-container">

        <table class="tablad">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Documento</th>
                    <th>Número de Documento</th>
                    <th>Nombres y Apellidos</th>
                    <th>Teléfono</th>
                    <th>Firma</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->tipo_documento }}</td>
                        <td>{{ $registro->numero_documento }}</td>
                        <td>{{ $registro->nombres_apellidos }}</td>
                        <td>{{ $registro->telefono }}</td>
                        <td>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
    @else
        <p>No se encontraron registros.</p>
    @endif

</body>
</html>
