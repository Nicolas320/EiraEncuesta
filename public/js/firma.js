var canvas = document.getElementById('canvas');
var signaturePad = new SignaturePad(canvas);

function guardarFirma() {
  var firmaBase64 = signaturePad.toDataURL();
  document.getElementById('firma_oculta').value = firmaBase64;
}

document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
  guardarFirma(); 
});

function limpiarFirma() {
  signaturePad.clear();  
}