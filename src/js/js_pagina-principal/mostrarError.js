// Metodo para mostrar el error
function MostrarError(CodigoError) { 
    document.getElementById("CodigoError").textContent = "Código de error: " + CodigoError;
    document.getElementById("error-container").classList.add("show-error-container");
    document.body.classList.add("body-error");
}