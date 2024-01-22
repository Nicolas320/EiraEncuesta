document.addEventListener('DOMContentLoaded', function() {
    const tipoDiscapacidadField = document.getElementById('tipoDiscapacidadField');

    function toggleTipoDiscapacidad() {
        const tieneDiscapacidad = document.querySelector('input[name="tiene_alguna_discapacidad"]:checked');

        if (tieneDiscapacidad && tieneDiscapacidad.value === 'si') {
            tipoDiscapacidadField.style.display = 'block';
        } else {
            tipoDiscapacidadField.style.display = 'none';
        }
    }

    toggleTipoDiscapacidad();

    document.querySelectorAll('input[name="tiene_alguna_discapacidad"]').forEach(function(radio) {
        radio.addEventListener('change', toggleTipoDiscapacidad);
    });
});


/* OPCION DE OTRO */
var radioOtro = document.querySelector('input[name="servicio_atendido"][value="Otro"]');
    var inputOtro = document.querySelector('input[name="otro"]');

    radioOtro.addEventListener('change', function() {
        if (radioOtro.checked) {
            inputOtro.classList.remove('hidden');
        } else {
            inputOtro.classList.add('hidden');
        }
    });

    // Ocultar el campo de entrada al cargar la página
    inputOtro.classList.add('hidden');


 /* Funcion para evitar que se escriban letras en un input. */
 function ValidaSoloNumeros() {
    let codigo = event.keyCode;
    if ((codigo >= 48 && codigo <= 57) || codigo === 46) {
        return event.returnValue = true;
    }
    return event.returnValue = false;
}

//RESULTADOS ENCUESTA OPCIONES

    // Función para validar que solo se ingresen números en algunos campos
    function ValidaSoloNumeros() {
        if ((event.keyCode < 48) || (event.keyCode > 57)) 
            event.returnValue = false;
    }

    // Función para calcular el resultado y mostrarlo
    function calcularResultado() {
        var total = 0;

        // Obtén todos los radios dentro del contenedor de resultados
        var radiosResultados = document.querySelectorAll('input[type="radio"]:checked');

        // Itera sobre los radios de resultados
        radiosResultados.forEach(function (radio) {
            // Suma su valor al total
            // Utiliza un objeto para mapear las cadenas a sus valores numéricos correspondientes
            var valorNumerico = {
                "MUY BUENA": 5,
                "BUENA": 4,
                "REGULAR": 3,
                "MALA": 2,
                "MUY MALA": 1
            }[radio.value];

            if (!isNaN(valorNumerico)) {
                total += valorNumerico;
            }
        });

        // Muestra el resultado
        document.getElementById('resultado').textContent = interpretarResultado(total);
    }

    // Función para interpretar el resultado numérico
    function interpretarResultado(valor) {
        if (valor >= 20) {
            return "MUY BUENA";
        } else if (valor >= 15) {
            return "BUENA";
        } else if (valor >= 10) {
            return "REGULAR";
        } else if (valor >= 5) {
            return "MALA";
        } else {
            return "MUY MALA";
        }
    }

    // Función para limpiar la firma
    function limpiarFirma() {
        firmaPad.clear();
    }

    // Inicializar la librería Signature Pad
    var canvas = document.getElementById('canvas');
    var firmaPad = new SignaturePad(canvas);

    // Asegurarse de que el formulario se envíe con la firma como imagen en base64
    document.querySelector('form').addEventListener('submit', function (e) {
        var hiddenInput = document.getElementById('firma_oculta');
        hiddenInput.value = firmaPad.toDataURL();
    });



    