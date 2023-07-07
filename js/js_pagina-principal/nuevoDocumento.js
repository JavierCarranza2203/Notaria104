const frmNuevoDocumento = document.getElementById("frmNuevoDocumento");
const tipoDocumento = document.getElementById("txtDocumento").value;


function crearComponente(nombreDocumento){
    let contenedor = document.createElement("div");
    let checkbox = document.createElement("input");
    let nombreTipoDocumento = document.createElement("h1");
    let inputFile = document.createElement("input");
    let previewPDF = document.createElement("button");

    checkbox.type = "checkbox";
    inputFile.type = "file";
    previewPDF.textContent = "Vista previa";
    nombreTipoDocumento.textContent = nombreDocumento;

    contenedor.appendChild(checkbox);
    contenedor.appendChild(nombreTipoDocumento);
    contenedor.appendChild(inputFile);
    contenedor.appendChild(previewPDF);

    return contenedor;
}

let INE = crearComponente("INE");
frmNuevoDocumento.appendChild(INE);