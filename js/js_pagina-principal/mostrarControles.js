// Obtiene todos los elementos del tipo input con dicha clase
const arrFileUpload = document.querySelectorAll('.fileUpload')

// Para cada uno de los inputs realiza la siguiente rutina
arrFileUpload.forEach(fileUpload => {
    // Se obtienen los elementos anterior y posterior a la etiqueta del tipo input,
    // que, por la estructura del HTML, son un span y un label, respectivamente
    let fileValue = fileUpload.previousElementSibling 
    let label = fileUpload.nextElementSibling
    // Establece el valor predeterminado de la etiqueta
    let labelValue = 'No se ha seleccionado ningún archivo'
    // Cada que se seleccione un nuevo archivo:
    fileUpload.addEventListener('change', (e) => {
        let fileName = ''
        // En caso de que se seleccione mas de uno:
        if (this.files && this.files.length > 1) {
            fileName = ( this.getAttribute('data-multiple-caption') || '').replace( '{count}', this.files.length )
        }
        // Recorta la ruta obtenida, dejando solo el nombre del archivo
        else {
            fileName = e.target.value.split('\\').pop()
        }
        // De obtenerse un archivo, se agrega el nombre a la etiqueta
        if (fileName) {
            fileValue.innerHTML = fileName
            fileValue.classList.add('valid')
        }
        // Si no se obtiene un archivo, restablece la etiqueta a su estado inicial
        else {
            fileValue.innerHTML = labelValue
            fileValue.classList.remove('valid')
        }
    })
});

try{
    //Rescata el URL
    const valores = window.location.search;

    //Crea la instancia
    const urlParams = new URLSearchParams(valores);

    //Accede a los valores
    var documento = urlParams.get('documento');

    var NombreDocumento = document.getElementById("NombreDocumento");

    //Busca el documento
    switch(documento)
    {
        /*/////// CONTRATOS /////////*/
        //Contrato de Compra Venta
        case "CCV":
            NombreDocumento.textContent = "Contrato de compra venta";
            MostrarControles_Conjunto1();
            break;
        //Contrato de Compra Venta Con Reserva de Dominio
        case "CCVCRD":
            NombreDocumento.textContent = "Contrato de compra venta con reserva de dominio";
            MostrarControles_Conjunto1();
            break;
        //Contrato de Arrendamiento
        case "CoA":
            NombreDocumento.textContent = "Contrato de arrendamiento"
            MostrarControles_Conjunto4();
            document.getElementById("IdentificacionInmueble").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Contrato de ComoDato
        case "CCD":
            NombreDocumento.textContent = "Contrato de comodato";
            MostrarControles_Conjunto4();
            document.getElementById("IdentificacionInmueble").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Contrato de Compra Venta a Plazos
        case "CCVP":
            NombreDocumento.textContent = "Contrato de compra venta a plazos";
            MostrarControles_Conjunto1();
            document.getElementById("Testigo1").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("CertificadoConReservaDePrioridad").classList.add("tramites-container__item-form-container-form-document");
            break;
        //Contrato de Servidumbre de Paso
        case "CSP":
            NombreDocumento.textContent = "Contrato de servidumbre de paso";
            MostrarControles_Conjunto1();
            break;
        //Contrato de Reconocimiento de Adeudo con Intereses y Garantia Hipotecaria
        case "CRAIGH":
            NombreDocumento.textContent = "Contrato de reconocimiento de adeudo con intereses y garantía hipotecaria";
            MostrarControles_Conjunto1();
            break;
        //Acta Constitutiva
        case "AC":
            NombreDocumento.textContent = "Acta constitutiva";
            break;
        //Acta Notarial
        case "AN":
            NombreDocumento.textContent = "Acta notarial";
            MostrarControles_Conjunto2();
            break;
        //Donación Gratuita Pura y Simple
        case "DGPS":
            NombreDocumento.textContent = "Donación gratuita pura y simple";
            MostrarControles_Conjunto1();
            break;
        //Donación Gratuita Pura y Simple con Reserva de Usufructo Vitalicio
        case "DGPSRUV":
            NombreDocumento.textContent = "Donación gratuita pura y simple con reserva de usufructo vitalicio";
            MostrarControles_Conjunto1();
            break;
        //Protocolizacion de Acta de Asamblea
        case "PAA":
            NombreDocumento.textContent = "Protocolización de acta de asamblea";
            document.getElementById("ActaElaboradaPorLaEmpresa").classList.remove("tramites-container__item-form-container-form-document");
            MostrarControles_Conjunto2();
            break;
        //Protocolizacion de Juicio Sucesorio
        case "PJS":
            NombreDocumento.textContent = "Protocolización de juicio sucesorio";
            MostrarControles_Conjunto3();
            document.getElementById("ConstanciaJuzgado").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Protocolizacion de Subdivision o Fusion
        case "PSoF":
            NombreDocumento.textContent = "Protocolización de subdivisión o fusión";
            MostrarControles_Conjunto3();
            document.getElementById("Plano").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("DictamenDeSubdivision").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Testamento Publico Abierto Sencillo
        case "TPAS":
            NombreDocumento.textContent = "Testamento publico abierto sencillo";
            MostrarControles_Conjunto4();
            document.getElementById("comprobanteDom").classList.add("tramites-container__item-form-container-form-document");
            document.getElementById("reciboAgua").classList.add("tramites-container__item-form-container-form-document");
            document.getElementById("NombresHijos").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Testamento Publico Abierto con Legados
        case "TPAL":
            NombreDocumento.textContent = "Testamento publico abierto con legados";
            MostrarControles_Conjunto4();
            document.getElementById("comprobanteDom").classList.add("tramites-container__item-form-container-form-document");
            document.getElementById("reciboAgua").classList.add("tramites-container__item-form-container-form-document");
            document.getElementById("NombresHijos").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("AntecedentesPropiedades").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Usufructo Vitalicio
        case "UV":
            NombreDocumento.textContent = "Usufructo vitalicio";
            document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("Comparecientes").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Convenio de Transmision de Propiedad, en Extincion Parcial de Fideicomiso
        case "CTPEPF":
            NombreDocumento.textContent = "Convenio de transmisión de propiedad en extinción parcial de fideicomiso";
            MostrarControles_Conjunto1();
            document.getElementById("PersonalidadEmpresa").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Declaracion Testimonial sobre el Nombre
        case "DTSN":
            NombreDocumento.textContent = "Declaración testimonial sobre el nombre";
            document.getElementById("Identificacion").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Declaracion Testimonial Sobre el Estado Civil
        case "DTSEC":
            NombreDocumento.textContent = "Declaración testimonial sobre el estado civil";
            document.getElementById("Testigo1").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("ActaMatrimonio").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("hojaGenerales").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Cancelacion de Reserva de Dominio
        case "CRD":
            NombreDocumento.textContent = "Cancelación de reserva de dominio";
            document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("INE").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("CURP").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("RFC").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("hojaGenerales").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("CertificadoConReservaDePrioridad").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Poder Especial y/o General
        case "PEyoG":
            NombreDocumento.textContent = "Poder especial y/o general";
            document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("INE").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("CURP").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("RFC").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("hojaGenerales").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("Poderante").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("Apoderado").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("ActaConstitutivaEmpresa").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("PoderRepresentante").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Cesion de Derechos
        case "CD":
            NombreDocumento.textContent = "Cesión de derechos";
            document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("INE").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("CURP").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("RFC").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("hojaGenerales").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Escrito Aclaratorio (Superficie)
        case "EAS":
            NombreDocumento.textContent = "Escrito aclaratorio (Superficie)";
            document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("Predial").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Escrito Aclaratorio (Nombre)
        case "EAN":
            NombreDocumento.textContent = "Escrito aclaratorio (Nombre)";
            document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("Identificacion").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Escrito Aclaratorio (Estado Civil)
        case "EAEC":
            NombreDocumento.textContent = "Escrito aclaratorio (Estado civil)";
            document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("Identificacion").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Carta de Autorizacion
        case "CaA":
            NombreDocumento.textContent = "Carta de autorización";
            document.getElementById("ActaNacimientoMenor").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("DatosGeneralesPadres").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("ActaDefuncion").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("DomicilioVivienda").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("NombrePersonaACargo").classList.remove("tramites-container__item-form-container-form-document");
            break;
        //Carta Responsiva
        case "CR":
            NombreDocumento.textContent = "Carta responsiva";
            document.getElementById("Comparecientes").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("TituloVehiculo").classList.remove("tramites-container__item-form-container-form-document");
            document.getElementById("TarjetaCirculacion").classList.remove("tramites-container__item-form-container-form-document");

            break;
        //En caso de que no encuentre el valor dado por URL
        default:
            break;
    }
}
catch(e){
    console.log("Al parecer hubo un error inesperado, el código del archivo mostrarControles.js lanzó una excepción");
    console.log(e);
    document.getElementById("solution").textContent = "Error inesperado, contacte al administrador de sistemas";
}

//Mostrar Escritura, certificado con reserva de prioridad, predial y comparecientes
function MostrarControles_Conjunto1()
{
    document.getElementById("Escritura").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("CertificadoConReservaDePrioridad").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("Predial").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("Comparecientes").classList.remove("tramites-container__item-form-container-form-document");
}

//Mostrar Comparecientes, poder y personalidad de la empresa
function MostrarControles_Conjunto2()
{
    document.getElementById("Comparecientes").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("Poder").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("PersonalidadEmpresa").classList.remove("tramites-container__item-form-container-form-document");
}

function MostrarControles_Conjunto3()
{
    MostrarControles_Conjunto1();
    document.getElementById("Escritura").classList.add("tramites-container__item-form-container-form-document");
}

function MostrarControles_Conjunto4(){
    document.getElementById("INE").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("CURP").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("RFC").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("actanac").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("ActaMatrimonio").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("comprobanteDom").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("reciboAgua").classList.remove("tramites-container__item-form-container-form-document");
    document.getElementById("hojaGenerales").classList.remove("tramites-container__item-form-container-form-document");
}