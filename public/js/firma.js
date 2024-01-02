var canvas = document.getElementById('canvas');
var signaturePad = new SignaturePad(canvas);

function guardarFirma() {
  var firma = signaturePad.toDataURL();
}

function limpiarFirma() {
  signaturePad.clear();  
}
