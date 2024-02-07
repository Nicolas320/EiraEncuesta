var canvas = document.getElementById('canvas');
var signaturePad = new SignaturePad(canvas);


function guardarFirma() {
    var canvas = document.getElementById("canvas");
    var firmaData = canvas.toDataURL();

    document.getElementById("firma_oculta").value = firmaData;
}


document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
  guardarFirma();
});

function limpiarFirma() {
  signaturePad.clear();
}



// //FIRMA DIGITAL + ADJUNTAR FIMA

    function toggleCamposFirma() {
        var tipoFirma = document.getElementById("tipoFirma").value;
        var adjuntarContainer = document.getElementById("adjuntarFirmaContainer");
        var firmaDigitalContainer = document.getElementById("firmaDigitalContainer");

        if (tipoFirma === "selecciona") {
            adjuntarContainer.style.display = "none";
            firmaDigitalContainer.style.display = "none";
        } else if (tipoFirma === "adjuntar") {
            adjuntarContainer.style.display = "block";
            firmaDigitalContainer.style.display = "none";
        } else {
            adjuntarContainer.style.display = "none";
            firmaDigitalContainer.style.display = "block";
        }
    }

    // Llamar a toggleCamposFirma al cargar la página para manejar el estado inicial del formulario
    window.onload = toggleCamposFirma;

