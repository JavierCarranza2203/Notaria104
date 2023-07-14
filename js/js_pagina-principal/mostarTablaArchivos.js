const arrayBotones = document.querySelectorAll(".new-document__item a");
const contenedorMisDocumentos = document.getElementById("contenedorMisDocumentos");
const contenedorTabla = document.getElementById("contenedorTabla");
const cuerpoTabla = document.getElementById("tableBody");
const lblTipoDocumento = document.getElementById("tipoDocumento");
const btnRegresar = document.getElementById("btnRegresar");


function mostrarDatos(conjuntoDatos, tipoDocumento){
    cuerpoTabla.innerHTML = ''
    lblTipoDocumento.textContent = nombrarEncabezadoTabla(tipoDocumento);
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

function nombrarEncabezadoTabla(tipoDocumento){
    switch(tipoDocumento){
        case "ccv":
            return "contratos de compra venta"
            break;
        //Contrato de Compra Venta Con Reserva de Dominio
        case "ccvcrd":
            return "contratos de compra venta con reserva de dominio";
        //Contrato de Arrendamiento
        case "coa":
            return "contratos de arrendamiento";
        //Contrato de ComoDato
        case "ccd":
            return "contratos de comodato";
        //Contrato de Compra Venta a Plazos
        case "ccvp":
            return "contratos de compra venta a plazos";
        //Contrato de Servidumbre de Paso
        case "csp":
            return "Contrato de servidumbre de paso";
        //Contrato de Reconocimiento de Adeudo con Intereses y Garantia Hipotecaria
        case "craigh":
            return "contrato de reconocimiento de adeudo con intereses y garantía hipotecaria";
        //Acta Constitutiva
        case "ac":
            return "acta constitutiva";
        //Acta Notarial
        case "an":
            return "acta notarial";
        //Donación Gratuita Pura y Simple
        case "dgps":
            return "donación gratuita pura y simple";
        //Donación Gratuita Pura y Simple con Reserva de Usufructo Vitalicio
        case "dgpsruv":
            return "donación gratuita pura y simple con reserva de usufructo vitalicio";
        //Protocolizacion de Acta de Asamblea
        case "paa":
            return "protocolización de acta de asamblea";
        //Protocolizacion de Juicio Sucesorio
        case "pjs":
            return "protocolización de juicio sucesorio";
        //Protocolizacion de Subdivision o Fusion
        case "psof":
            return "protocolización de subdivisión o fusión";
        //Testamento Publico Abierto Sencillo
        case "tpas":
            return "testamento publico abierto sencillo";
        //Testamento Publico Abierto con Legados
        case "tpal":
            return "testamento publico abierto con legados";
        //Usufructo Vitalicio
        case "uv":
            return "tsufructo vitalicio";
        //Convenio de Transmision de Propiedad, en Extincion Parcial de Fideicomiso
        case "ctpepf":
            return "convenio de transmisión de propiedad en extinción parcial de fideicomiso";
        //Declaracion Testimonial sobre el Nombre
        case "dtsn":
            return "teclaración testimonial sobre el nombre";
        //Declaracion Testimonial Sobre el Estado Civil
        case "dtsec":
            return "declaración testimonial sobre el estado civil";
        //Cancelacion de Reserva de Dominio
        case "crd":
            return "cancelación de reserva de dominio";
        //Poder Especial y/o General
        case "peyog":
            return "poder especial y/o general";
        //Cesion de Derechos
        case "cd":
            return "cesión de derechos";
        //Escrito Aclaratorio (Superficie)
        case "eas":
            return "escrito aclaratorio (Superficie)";
        //Escrito Aclaratorio (Nombre)
        case "ean":
            return "escrito aclaratorio (Nombre)";
        //Escrito Aclaratorio (Estado Civil)
        case "eaec":
           return "escrito aclaratorio (Estado civil)";
        //Carta de Autorizacion
        case "caa":
            return "carta de autorización";
        //Carta Responsiva
        case "cr":
            return "carta responsiva";
    }
}

btnRegresar.addEventListener("click", ()=>{
    contenedorMisDocumentos.classList.remove("section--hidden");
    contenedorTabla.classList.add("section--hidden");
});