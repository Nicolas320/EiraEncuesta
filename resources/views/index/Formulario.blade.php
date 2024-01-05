    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/index.css') }}">
        <link rel="shortcut icon" href="https://cdn.jotfor.ms/assets/img/favicons/favicon-2021-light%402x.png">
        <title>ENCUESTA DE SATISFACCION EIRA SALUD IPS</title>
    </head>
    <body>

        
    <img class="img-eira" src="img/LogoEira.png" alt="" width="280">


    <form action="{{ route('guardar.registro') }}" method="POST">
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
        <br>
        <select class="caja1"  name="tipo_documento" id="tipo_documento" required>
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
    </li>
        <br>
        <br>

        <li class="caja2">
            <label class="ND" for="Número de documento">Número de documento</label>
            <span>*</span>
            <br>
            <br>
            <input class="inp" type="number" placeholder="Por ej., 23" name="numero_documento" required>
        </li>

        <br>

        <li class="caja3">
            <label class="NYA" for="">Nombres y apellidos</label>
            <span>*</span>
            <br>
            <br>
            <input class="inp" placeholder="" name="nombres_apellidos" type="text" required>
        </li>
        
        <br>

        <li class="cajatl">
            <label class="TL"  for="">Teléfono</label>
            <span>*</span>
            <br>
            <br>
            <input class="inp" placeholder="Por ej., 23" name="telefono" type="text" required>
        </li>

        <br>

        <li class="fcdt1">
        
            <label class="TL" for="">Fecha de atención</label>
            <span>*</span>
            <br>
            <br>
            <input class="fcdt" type="date" name="fecha_atencion" required>
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
        </li>

        <br>

        <li class="caja8">
        <label class="MA" required >Tiene alguna discapacidad</label>
        <span>*</span>
        <br>
        <br>
        <div class="radiotp">
        <input  type="radio" name="tiene_alguna_discapacidad" value="si"> Si
        <input  type="radio" name="tiene_alguna_discapacidad" value="no"> No
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
    </li>


        <li class="caja10">
            <label class="TD">Servicio en que fue atendido</label>
            <span>*</span>
            <br>
            <br>
                <input type="radio" name="servicio_atendido" value="Medicina General">Medicina General  
                <br>
                <div class="right">
                <input type="radio" name="servicio_atendido" value="Medicina Interna">Medicina Interna
                </div>
                <br>
                <input type="radio" name="servicio_atendido" value="Nutricion">Nutricion
                <br>
                <div class="right">
                <input type="radio" name="servicio_atendido" value="Psicologia">Psicologia
                </div>
                <br>
                <input type="radio" name="servicio_atendido" value="Enfermeria">Enfermeria
                <br>
                <div class="right">
                <input type="radio" name="servicio_atendido" value="Nefrologia">Nefrologia 
                </div>
                <br>
                <input type="radio" name="servicio_atendido" value="Endocrinologia">Endocrinologia 
                <br>
                <div class="right">
                <input type="radio" name="servicio_atendido" value="Fisioterapia">Fisioterapia
                </div>
                <br>
                <input type="radio" name="servicio_atendido" value="Trabajo Social">Trabajo Social
                <br>
                <div class="right">
                <input type="radio" name="servicio_atendido" value="Toma de Muestras de Laboratorio">Toma de Muestras de Laboratorio
                </div>
                <br>
                <input type="radio" name="servicio_atendido" value="Otro">Otro 
        </li>

            <h1 class="title2">ATENCIÓN INDIVIDUAL y ASPECTOS GENERALES</h1>
            <div class="parraf2">Cómo califica la atención del personal que le prestó el servicio de acuerdo al grado de satisfacción</div>
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
            
            <label class="parrafop">¿Recomendaría a sus familiares y amigos esta IPS?</label>
            <div class="caja11">

            <input class="seleccion" type="radio" name="recomendacion" value="Definitiavamente SI" >Definitiavamente SI
            <br>
            <input class="seleccion" type="radio" name="recomendacion" value="Definitiavamente NO" >Definitiavamente NO
            <br>
            <input class="seleccion" type="radio" name="recomendacion" value="Probablemente SI" >Probablemente SI
            <br>
            <input class="seleccion" type="radio" name="recomendacion" value="Probablemente NO">Probablemente NO
        </div>
            <br>
            <br>

        <label class="parraf2">Escribe aquí tus comentarios ,felicitaciones, quejas o inquietudes.</label>
        <br>
        <br>
        <textarea class="comentarios" name="comentarios" type="text"></textarea>

        <br>
        <br>


        <label class="parraf2" name="firma">Firma</label>
    <!-- <span>*</span> -->

    <canvas id="canvas" name="firma" width="500" height="200"></canvas>

    <input type="hidden" id="firma_oculta" name="firma" value="">



    <span class="limpiar" onclick="limpiarFirma()" style="cursor: pointer; color: blue; text-decoration: underline none;">Limpiar</span>

        <div>
            <button class="enviar" type="submit">Enviar</button>
        </div>

        <script src="js/index.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

        <script src="js/firma.js"></script>

    </form>

    </body>
    </html>


