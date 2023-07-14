document.getElementById("guardarNuevoDocumento").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita el envío del formulario por defecto
  
    const formulario = this; // Obtén una referencia al formulario
  
    const datosFormulario = new FormData(formulario); // Crea un objeto FormData con los datos del formulario
  
    const httpRequest = new XMLHttpRequest(); // Crea una instancia de XMLHttpRequest
  
    httpRequest.open("POST", "../../php/php_pagina-principal/guardar-archivos.php"); // Establece la URL y el método de la petición
  
    httpRequest.onreadystatechange = function() {
      if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
          let respuesta = httpRequest.responseText;

          if(respuesta){
            alert("Los archivos se guardaron");
          } 
        } else {
          // Hubo un error en la petición
          alert("Hubo un error");
          console.error('Error en la petición');
        }
      }
    };
  
    httpRequest.send(datosFormulario); // Envía los datos del formulario a través de la petición
  });
    