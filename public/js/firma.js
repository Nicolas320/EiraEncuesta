var canvas = document.getElementById('canvas');
var signaturePad = new SignaturePad(canvas);

// function guardarFirma() {
//   var firma = signaturePad.toDataURL();
  
//   fetch('/guardar-firma', {
//       method: 'POST',
//       headers: {
//           'Content-Type': 'application/json',
//           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Asegúrate de tener el token CSRF en tu meta
//       },
//       body: JSON.stringify({ firma: firma })
//   })
//   .then(response => response.json())
//   .then(data => {
//       if (data.success) {
//           alert(data.message);
//       } else {
//           alert('Error al guardar la firma.');
//       }
//   })
//   .catch(error => {
//       console.error('Error:', error);
//   });
// }
function guardarFirma() {
  var firma = signaturePad.toDataURL();
  
  // Aquí haces la solicitud AJAX para enviar la firma al servidor
  fetch('/guardar-firma', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Asegúrate de tener el token CSRF en tu meta
      },
      body: JSON.stringify({ firma: firma })
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
          alert(data.message);
      } else {
          alert('Error al guardar la firma.');
      }
  })
  .catch(error => {
      console.error('Error:', error);
  });
}

function limpiarFirma() {
  signaturePad.clear();  
}

function limpiarFirma() {
  signaturePad.clear();  
}


  var firmaGuardada = false;

  function guardarFirma() {
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');

    // Obtén la imagen en formato base64
    var signatureData = canvas.toDataURL('image/png');

    // Verifica si la firma contiene algún píxel modificado
    if (!tieneTrabajo(ctx)) {
      alert('Por favor, realiza al menos un trazo antes de guardar la firma.');
      return;
    }

    // Convierte la imagen base64 a Blob
    var byteString = atob(signatureData.split(',')[1]);
    var ab = new ArrayBuffer(byteString.length);
    var ia = new Uint8Array(ab);
    for (var i = 0; i < byteString.length; i++) {
      ia[i] = byteString.charCodeAt(i);
    }
    var blob = new Blob([ab], { type: 'image/png' });

    // Puedes continuar con la lógica de guardar la firma aquí
    // ...

    firmaGuardada = true; // Marcar la firma como guardada
    console.log('Firma guardada con éxito');
  }

  function tieneTrabajo(ctx) {
    var imageData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height).data;
    for (var i = 0; i < imageData.length; i += 4) {
      // Verifica si algún píxel tiene un componente alfa diferente de cero (transparencia)
      if (imageData[i + 3] !== 0) {
        return true;
      }
    }
    return false;
  }

  function limpiarFirma() {
    var canvas = document.getElementById('canvas');
    var ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    document.getElementById('signature-data').value = ''; // Limpiar el campo oculto
    firmaGuardada = false; // Restablecer el estado de la firma
  }

  // Agregar una función para comprobar si la firma ha sido guardada
  function verificarFirmaGuardada() {
    if (firmaGuardada) {
      alert('La firma ya ha sido guardada. Si deseas hacer cambios, primero limpia la firma.');
    } else {
      alert('La firma no ha sido guardada aún.');
    }
  }


