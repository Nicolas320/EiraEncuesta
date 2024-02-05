<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <link rel="shortcut icon" href="https://cdn.jotfor.ms/assets/img/favicons/favicon-2021-light%402x.png">
    <title>ENCUESTA DE SATISFACCION EIRA SALUD IPS</title>
</head>
<body>

<img class="img-eira" src="img/LogoEira.png" alt="" width="280">


<form action="{{ route('guardar.registro') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <h1 class="title">ENCUESTA DE SATISFACCION</h1>


    <div class="parraf1">Apreciado usuario para la EIRA SALUD IPS S.A.S, usted es lo más importante,
        por ello queremos conocer su grado de satisfacción con respecto a los servicios recibidos.
        Agradecemos su sinceridad y tiempo, para responder las preguntas.
    </div>
    <br>
    <br>
    <br>
    <h2 class="title2">DATOS PERSONALES</h2>

    <li class="caja1">
        <label class="TD" for="">Tipo de Documento</label>
        <span>*</span>
        <br>
        <br>
        <select class="caja1" name="tipo_documento" id="tipo_documento" onchange="ValidaSoloNumeros()">
            <option value="">Seleccione</option>
            <option value="CC - Cedula ciudadania">CC - Cedula ciudadania</option>
            <option value="CE - Cedula extranjeria">CE - Cedula extranjeria</option>
            <option value="CD - Carnet diplomatico">CD - Carnet diplomatico</option>
            <option value="PA - Pasaporte">PA - Pasaporte</option>
            <option value="SC - Salvoconducto">SC - Salvoconducto</option>
            <option value="PE - Permiso especial de Permanencia">PE - Permiso especial de Permanencia</option>
            <option value="RC - Registro civil">RC - Registro civil</option>
            <option value="TI - Tarjeta de identidad">TI - Tarjeta de identidad</option>
            <option value="CN - Certficado de Nacido Vivo">CN - Certficado de Nacido Vivo</option>
            <option value="AS - Adulto sin identificar">AS - Adulto sin identificar</option>
            <option value="MS - Menos sin identificar">MS - Menos sin identificar</option>
        </select>
        {{-- @error('tipo_documento')
            <small class="text-danger">*{{$message}}</small>
        @enderror --}}
    </li>
    <br>
    <br>

    <li class="caja2">
        <label class="ND" for="Número de documento">Número de documento</label>
        <span>*</span>
        <br>
        <br>
        <input class="inp" id="numero_documento" onkeypress="ValidaSoloNumeros()" type="text" placeholder="Por ej., 23"
            name="numero_documento" value="{{old('numero_documento')}}" required>

        {{-- @error('numero_documento')
            <small class="text-danger">*{{$message}}</small>
        @enderror --}}
    </li>

    <br>

    <li class="caja3">
        <label class="NYA" for="">Nombres y apellidos</label>
        <span>*</span>
        <br>
        <br>
        <input class="inp" placeholder="" name="nombres_apellidos" type="text" value="{{old('nombres_apellidos')}}" required>

        @error('nombres_apellidos')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </li>

    <br>

    <li class="cajatl">
        <label class="TL"  for="">Teléfono</label>
        <span>*</span>
        <br>
        <br>
        <input class="inp" placeholder="Por ej., 23" name="telefono" type="text" value="{{old('telefono')}}" required>

        @error('telefono')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </li>

    <li class="cajadr">
        <label class="TL"  for="">Direccion</label>
        <span>*</span>
        <br>
        <br>
        <input class="inp" placeholder="Por ej., 23" name="direccion" type="text" value="{{old('direccion')}}" required>

        @error('direccion')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </li>

    <li class="cajagnr">
        <label class="TD" for="">Genero</label>
        <span>*</span>
        <br>
        <br>
        <select class="cajaopt" name="genero" id="genero" required>
            <option value="">Selecciona</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
        </select>

        @error('genero')
                <small class="text-danger">*{{$message}}</small>
        @enderror
    </li>

    <br>

    <li class="fcdt1">

        <label class="TL" for="">Fecha de atención</label>
        <span>*</span>
        <br>
        <br>
        <input class="fcdt" type="date" name="fecha_atencion" max="{{Date('Y-m-d')}}" value="{{old('fecha_atencion')}}" required>

        @error('fecha_atencion')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </li>


    <div>

    <li class="caja4edit">
        <label class="TD"  for="">Municipio de atención</label>
        <span>*</span>
        <br>
        <br>
        <select class="caja4" name="municipio_atencion" required>
            <option value="">Selecciona</option>
            <option value="Balboa">Balboa</option>
            <option value="Buenos Aires">Buenos Aires</option>
            <option value="Mercaderes">Mercaderes</option>
            <option value="Patia">Patia</option>
            <option value="Popayán">Popayán</option>
        </select>

        @error('municipio_atencion')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </div>
    </li>

    <br>

    <li class="caja7">
        <label class="MA">Modalidad de Atención</label>
        <span>*</span>
        <br>
        <br>
        <input type="radio" name="modalidad_atencion" value="intramuros" required> Intramural
        <input type="radio" name="modalidad_atencion" value="extramural" required> Extramural

        @error('modalidad_atencion')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </li>

    <br>

    <li class="caja8">
        <label class="MA">Tiene alguna discapacidad</label>
        <span>*</span>
        <br>
        <br>
        <div class="radiotp">
        <input  type="radio" name="tiene_alguna_discapacidad" value="si" required> Si
        <input  type="radio" name="tiene_alguna_discapacidad" value="no" required> No

            @error('tiene_alguna_discapacidad')
                <small class="text-danger">*{{$message}}</small>
            @enderror
        </div>
    </li>

    <br>

    <li class="caja9" id="tipoDiscapacidadField" style="display: none;">
        <label class="TD" for="">Tipo de Discapacidad</label>
        <span>*</span>
        <br>
        <br>
        <select class="caja5" name="tipo_discapacidad" id="tipo_discapacidad">
            <option value="">Selecciona</option>
            <option value="Auditiva">Auditiva</option>
            <option value="Fisica">Física</option>
            <option value="Intelectual">Intelectual</option>
            <option value="Visual">Visual</option>
            <option value="Sordoceguera">Sordoceguera</option>
            <option value="Psicosocial">Psicosocial</option>
            <option value="Multiple">Múltiple</option>
        </select>

            @error('tipo_discapacidad')
                <small class="text-danger">*{{$message}}</small>
            @enderror
    </li>

    <li class="caja10" required>
        <label class="TD">Servicio en que fue atendido</label>
        <span>*</span>
        <br><br>
        <input type="radio" name="servicio_atendido" value="Medicina General">Medicina General<br>

        <div class="right">
            <input type="radio" name="servicio_atendido" value="Medicina Interna">Medicina Interna
        </div><br>

        <input type="radio" name="servicio_atendido" value="Nutricion">Nutricion<br>

        <div class="right">
            <input type="radio" name="servicio_atendido" value="Psicologia">Psicologia
        </div><br>

        <input type="radio" name="servicio_atendido" value="Enfermeria">Enfermeria<br>

        <div class="right">
            <input type="radio" name="servicio_atendido" value="Nefrologia">Nefrologia
        </div><br>

        <input type="radio" name="servicio_atendido" value="Endocrinologia">Endocrinologia<br>

        <div class="right">
            <input type="radio" name="servicio_atendido" value="Fisioterapia">Fisioterapia
        </div><br>

        <input type="radio" name="servicio_atendido" value="Trabajo Social">Trabajo Social<br>

        <div class="right">
            <input type="radio" name="servicio_atendido" value="Toma de Muestras de Laboratorio">Toma de Muestras de Laboratorio
        </div><br>

        <input type="radio" name="servicio_atendido" value="Otro">Otro<br><br>

        <input class="caja12 hidden" type="text" name="otro" placeholder="Digite su opcion">

        @error('otro')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </li>

    <h1 class="titleat">ATENCIÓN INDIVIDUAL y ASPECTOS GENERALES</h1>
    <div class="parraf2">Cómo califica la atención del personal que le prestó el servicio de acuerdo al grado de satisfacción <span>*</span></div>

    <div id="tablaResultados">
        <table>
            <tr>
                <th></th>
                <th>MUY BUENA</th>
                <th>BUENA</th>
                <th>REGULAR</th>
                <th>MALA</th>
                <th>MUY MALA</th>
            </tr>
            <tr>
                <td>El trato recibido por el personal encargado</td>
                <td><input type="radio" name="trato_personal" value="MUY BUENA"></td>
                <td><input type="radio" name="trato_personal" value="BUENA"></td>
                <td><input type="radio" name="trato_personal" value="REGULAR"></td>
                <td><input type="radio" name="trato_personal" value="MALA"></td>
                <td><input type="radio" name="trato_personal" value="MUY MALA"></td>
            </tr>
            <tr>
                <td>Tiempo de espera para ser atendido</td>
                <td><input type="radio" name="tiempo_espera" value="MUY BUENA"></td>
                <td><input type="radio" name="tiempo_espera" value="BUENA"></td>
                <td><input type="radio" name="tiempo_espera" value="REGULAR"></td>
                <td><input type="radio" name="tiempo_espera" value="MALA"></td>
                <td><input type="radio" name="tiempo_espera" value="MUY MALA"></td>
            </tr>
            <tr>
                <td>La información, el trato y condiciones de privacidad</td>
                <td><input type="radio" name="privacidad_info" value="MUY BUENA"></td>
                <td><input type="radio" name="privacidad_info" value="BUENA"></td>
                <td><input type="radio" name="privacidad_info" value="REGULAR"></td>
                <td><input type="radio" name="privacidad_info" value="MALA"></td>
                <td><input type="radio" name="privacidad_info" value="MUY MALA"></td>
            </tr>
            <tr>
                <td>Experiencia en general respecto a los servicios de salud</td>
                <td><input type="radio" name="experiencia_salud" value="MUY BUENA"></td>
                <td><input type="radio" name="experiencia_salud" value="BUENA"></td>
                <td><input type="radio" name="experiencia_salud" value="REGULAR"></td>
                <td><input type="radio" name="experiencia_salud" value="MALA"></td>
                <td><input type="radio" name="experiencia_salud" value="MUY MALA"></td>
            </tr>
    </table>

    {{-- <button class="resultados2" type="button" name="resultados_atencion" onclick="calcularResultado()">Calcular Resultados</button> --}}
        <button class="resultados2" type="button" onclick="calcularResultado()">Calcular Resultados</button>

        <textarea class="resultados" name="resultados_atencion" id="resultado" readonly></textarea>
        @error('resultados_atencion')
            <small class="text-danger">*{{$message}}</small>
        @enderror

        <label class="parrafop">¿Recomendaría a sus familiares y amigos esta IPS? <span>*</span>    </label>
        <div class="caja11">

        <input class="seleccion" type="radio" name="recomendacion" value="Definitiavamente SI" >Definitiavamente SI
        <br>
        <input class="seleccion" type="radio" name="recomendacion" value="Definitiavamente NO" >Definitiavamente NO
        <br>
        <input class="seleccion" type="radio" name="recomendacion" value="Probablemente SI" >Probablemente SI
        <br>
        <input class="seleccion" type="radio" name="recomendacion" value="Probablemente NO">Probablemente NO

        @error('recomendacion')
            <small class="text-danger">*{{$message}}</small>
        @enderror
    </div>
        <br>
        <br>

    <label class="parraf2C">Escribe aquí tus comentarios ,felicitaciones, quejas o inquietudes.</label>
    <br>
    <br>
    <textarea class="comentarios" name="comentarios" value="{{old('comentarios')}}" type="text"></textarea>

    @error('comentarios')
        <small class="text-danger">*{{$message}}</small>
    @enderror

    <br>
    <br>

    {{-- ADJUNTAR FIRMA --}}
    <div>
        <input class="adjuntarfir" type="file" label="firma" name="firma"/>
        <p>Nota: Al no adjuntar firma, cargara un tipo de campo que sea valido para la validacion del usuarios.
            Ejemplo: Cedula de Ciudadania, Comprobante </p>
        @error('firma')
            <small class="text danger">*{{$message}}</small>
        @enderror
    </div>


    {{-- ADJUNTAR FIRMA DIGITAL --}}











    <br>
    <br>

        <div>
            <button class="enviar" type="submit">Enviar</button>
        </div>

</form>

    <script src="js/index.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script src="js/firma.js"></script>

</body>
</html>
