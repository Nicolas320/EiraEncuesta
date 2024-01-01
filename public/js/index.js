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