const arrayBotones = document.querySelectorAll(".new-document__item a");
const contenedorMisDocumentos = document.getElementById("conenedorMisDocumentos");
const contenedorTabla = document.getElementById("contenedorTabla");
const cuerpoTabla = document.getElementById("tableBody");
const lblTipoDocumento = document.getElementById("tipoDocumento");

//Recorre el array de botones para agregar el evento y mostrar los datos
for(let i = 0; i < arrayBotones.length; i++){
    arrayBotones[i].addEventListener("click", ()=>{
        let tipoDocumento = arrayBotones[i].id.toLowerCase();

        let httpRequest = new XMLHttpRequest();

        httpRequest.open("GET", "../../php/php_pagina-principal/buscarArchivos.php?tabla=" + tipoDocumento, true);

        httpRequest.onreadystatechange = function() {

            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                let consulta = JSON.parse(httpRequest.responseText);
                
                mostrarDatos(consulta, tipoDocumento);
            }
        };
        httpRequest.send();
    }); 
}


function mostrarDatos(conjuntoDatos, tipoDocumento){
    lblTipoDocumento.textContent = tipoDocumento;
     conjuntoDatos.forEach(registro=>{
        const fila = document.createElement('tr');

        // Crear las celdas de la fila con los datos
        const celdaFolio = document.createElement('td');
        celdaFolio.textContent = registro.folio;
        fila.appendChild(celdaFolio);
  
        const celdaNombreCliente = document.createElement('td');
        celdaNombreCliente.textContent = registro.nombre_cliente;
        fila.appendChild(celdaNombreCliente);
  
        const celdaVolumen = document.createElement('td');
        celdaVolumen.textContent = registro.volumen;
        fila.appendChild(celdaVolumen);
  
        const celdaInstrumento = document.createElement('td');
        celdaInstrumento.textContent = registro.instrumento;
        fila.appendChild(celdaInstrumento);
  
        // Agregar la fila al cuerpo de la tabla
        cuerpoTabla.appendChild(fila);
     })
}
