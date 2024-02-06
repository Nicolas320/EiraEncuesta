var canvas = document.getElementById('canvas');
var signaturePad = new SignaturePad(canvas);


//GUARDAR FIRMA
function guardarFirma() {
    var canvas = document.getElementById('canvas');
    var firmaDigitalBase64 = canvas.toDataURL();  // Obtener la firma en base64

    // Enviar la firma al controlador
    axios.post('/guardar-firma', { firmaDigitalBase64: firmaDigitalBase64 })
        .then(response => {
            console.log(response.data);
        })
        .catch(error => {
            console.error(error);
        });
}


document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
  guardarFirma();
});

function limpiarFirma() {
  signaturePad.clear();
}




