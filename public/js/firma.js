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

// CAMPOS DE FIRMAS DIGIAL + IMAGEN


function mostrarCampo() {
  var tipoFirma = document.getElementById("tipoFirma").value;
  console.log("🚀 ~ mostrarCampo ~ tipoFirma:", tipoFirma)
  var firmaDigitalContainer = document.getElementById("firmaDigitalContainer");
  var adjuntarFirmaContainer = document.getElementById("adjuntarFirmaContainer");

  // Ocultar ambos contenedores
  firmaDigitalContainer.classList.add("hidden");
  adjuntarFirmaContainer.classList.add("hidden");

  // Mostrar el contenedor correspondiente
  if (tipoFirma === "firmaDigital") {
      firmaDigitalContainer.classList.remove("hidden");
  }
  if (tipoFirma === "adjuntarFirma") {
      adjuntarFirmaContainer.classList.remove("hidden");
  }
}
