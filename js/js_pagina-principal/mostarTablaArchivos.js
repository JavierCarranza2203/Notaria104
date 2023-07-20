const arrayBotones = document.querySelectorAll(".new-document__item a");
const contenedorMisDocumentos = document.getElementById("contenedorMisDocumentos");
const contenedorTabla = document.getElementById("contenedorTabla");
const cuerpoTabla = document.getElementById("tableBody");
const lblTipoDocumento = document.getElementById("tipoDocumento");
const btnRegresar = document.getElementById("btnRegresar");
const estructuraDocumentos = {
    ac: {},
    an: {
      documentos: ['Poder', 'Personalidad empresa'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    coa: {
      documentos: ['INE', 'CURP', 'RFC', 'Acta de nacimiento', 'Acta de matrimonio', 'Comprobante de domicilio', 'Recibo de agua', 'Hoja de generales', 'Identificacion del inmueble'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    ccd: {
      documentos: ['INE', 'CURP', 'RFC', 'Acta de nacimiento', 'Acta de matrimonio', 'Comprobante de domicilio', 'Recibo agua', 'Hoja de generales', 'Identificacion inmueble'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    ccv: {
      documentos: ['Escritura', 'Certificado', 'Predial'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    ccvp: {
      documentos: ['Escritura', 'Predial'],
      comparecientes: true,
      testigos: true,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    ccvcrd: {
      documentos: ['Escritura', 'Certificado', 'Predial'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    craigh: {
      documentos: ['Escritura', 'Certificado', 'Predial'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    csp: {
      documentos: ['Escritura', 'Certificado', 'Predial'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    dgps: {
      documentos: ['Escritura', 'Certificado', 'Predial'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    dgpsruv: {
      documentos: ['Escritura', 'Certificado', 'Predial'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    paa: {
      documentos: ['Acta elaborada por la empresa', 'Poder', 'Personalidad de la empresa'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    pjs: {
      documentos: ['Constancia elaborada por el juzgado', 'Certificado', 'Predial'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    psof: {
      documentos: ['Plano', 'Dictamen de subdivision', 'Predial', 'Certificado'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    tpas: {
      documentos: ['INE', 'CURP', 'RFC', 'Acta de nacimiento', 'Acta de matrimonio', 'Hoja de generales', 'Nombres de los hijos'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    tpal: {
      documentos: ['INE', 'CURP', 'RFC', 'actanac', 'ActaMatrimonio', 'Hoja de generales', 'NombresHijos', 'AntecedentesPropiedades'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    uv: {
      documentos: 'Escritura',
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    ctpepf: {
      documentos: ['Escritura', 'Certificado', 'Predial', 'Poder', 'Personalidad de la empresa', 'Personalidad o poder'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    dtsn: {
      documentos: ['Documento de identificación 1', 'Documento de identificación 2', 'Documento de identificación 3', 'Hoja de generales'],
      comparecientes: false,
      testigos: true,
      conjuntoArchivos1: true,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    dtsec: {
      documentos: ['Acta de matrimonio', 'Hoja de generales'],
      comparecientes: false,
      testigos: true,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    crd: {
      documentos: ['Escritura', 'INE', 'RFC', 'CURP', 'Hoja de generales', 'Certificado con reserva de prioridad'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: true,
      identificacionPersona: false
    },
    peyog: {
      documentos: ['Escritura', 'INE', 'RFC', 'CURP', 'Hoja de generales', 'Poderante', 'Apoderado', 'Datos de la empresa', 'Acta constitutiva de la empresa', 'Poder del representante'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: true,
      identificacionPersona: false
    },
    cd: {
      documentos: ['Escritura', 'INE', 'RFC', 'CURP', 'Hoja de generales'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: true,
      identificacionPersona: false
    },
    eas: {
      documentos: ['Escritura', 'Predial'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    ean: {
      documentos: ['Escritura', 'Documento de identificación 1', 'Documento identificación 2', 'Documento de identificación 3', 'Hoja de generales'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: true
    },
    eaec: {
      documentos: ['Escritura', 'Documento de identificación 1', 'Documento identificación 2', 'Documento de identificación 3', 'Hoja de generales'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: true
    },
    caa: {
      documentos: ['Acta de nacimiento del menor', 'Datos generales de los padres', 'Acta de defunción', 'Domicilio de vivienda', 'Nombre de la persona a cargo'],
      comparecientes: false,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    },
    cr: {
      documentos: ['Título del vehículo', 'Tarjeta circulación'],
      comparecientes: true,
      testigos: false,
      conjuntoArchivos1: false,
      conjuntoArchivos2: false,
      identificacionPersona: false
    }
  };
  
const estructuraComparecientes = ['INE', 'CURP', 
'RFC', 'Acta de nacimiento', 'Acta de matrimonio', 
'Comprobante de domicilio', 'Recibo de agua', 'Hoja de generales'];

const estructuraTestigos = ['INE', 'CURP', 'RFC', 
'Acta de nacimiento', 'Acta de matrimonio', 'Comprobante de domicilio', 'Recibo de agua', 
'Hoja de generales'];

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
        icon2.classList.add("fa-file-arrow-down");
        icon.classList.add("fa-folder-open");

        let celdaVerArchivos = document.createElement('td');
        icon.addEventListener("click", ()=>{
            mostraDocumentos(tipoDocumento, registro.folio);
        })
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

function mostraDocumentos(tipoDocumento, folioDocumento){
    const modal = document.getElementById("verArchivos");
    
    if(estructuraDocumentos.hasOwnProperty(tipoDocumento)){
      const requisitos = estructuraDocumentos[tipoDocumento].documentos;
      
      requisitos.forEach(archivo=>{
        const divElement = document.createElement("div");
        divElement.classList.add("contenedor-requisito");

        const aElement = document.createElement("a");
        aElement.textContent = archivo;

        divElement.appendChild(aElement);
        modal.appendChild(divElement);
      });
    }
    else{
      alert("Hubo un error al cargar los archivos, recargue la página e intente de nuevo.")
    }
}

btnRegresar.addEventListener("click", ()=>{
    contenedorMisDocumentos.classList.remove("section--hidden");
    contenedorTabla.classList.add("section--hidden");
});