const arrayBotones = document.querySelectorAll(".new-document__item a");
const contenedorMisDocumentos = document.getElementById("contenedorMisDocumentos");
const contenedorTabla = document.getElementById("contenedorTabla");
const cuerpoTabla = document.getElementById("tableBody");
const lblTipoDocumento = document.getElementById("tipoDocumento");
//const btnRegresar = document.getElementById("btnRegresar");


function mostrarDatos(conjuntoDatos, tipoDocumento){
    cuerpoTabla.innerHTML = ''
    lblTipoDocumento.textContent = tipoDocumento;
     conjuntoDatos.forEach(registro=>{
        let fila = document.createElement('tr');
        let icon = document.createElement('i');
        let icon2 = document.createElement('i');

        // Crear las celdas de la fila con los datos
        let celdaFolio = document.createElement('td');
        celdaFolio.textContent = registro.folio;
        fila.appendChild(celdaFolio);
  
        let celdaNombreCliente = document.createElement('td');
        celdaNombreCliente.textContent = registro.nombre_cliente;
        fila.appendChild(celdaNombreCliente);
  
        let celdaVolumen = document.createElement('td');
        celdaVolumen.textContent = registro.volumen;
        fila.appendChild(celdaVolumen);
  
        let celdaInstrumento = document.createElement('td');
        celdaInstrumento.textContent = registro.instrumento;
        fila.appendChild(celdaInstrumento);

        icon.classList.add("fa-solid");
        icon2.classList.add("fa-solid");
        icon.classList.add("fa-folder-open");

        let celdaVerArchivos = document.createElement('td');
        celdaVerArchivos.appendChild(icon);
        fila.appendChild(celdaVerArchivos);

        let celdaDescargarArchivos = document.createElement('td');
        icon2.classList.add("fa-file-arrow-down");
        celdaDescargarArchivos.appendChild(icon2);
        fila.appendChild(celdaDescargarArchivos);

    
        celdaFolio.classList.add("section__table-cell");
        celdaNombreCliente.classList.add("section__table-cell");
        celdaVolumen.classList.add("section__table-cell");
        celdaInstrumento.classList.add("section__table-cell");
        celdaVerArchivos.classList.add("section__table-cell");
        celdaDescargarArchivos.classList.add("section__table-cell");

        fila.classList.add("section__table-row")
        // Agregar la fila al cuerpo de la tabla
        cuerpoTabla.appendChild(fila);
     })

    contenedorMisDocumentos.classList.add("section--hidden");
    contenedorTabla.classList.remove("section--hidden");
}