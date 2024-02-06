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




