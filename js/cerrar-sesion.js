window.addEventListener("unload", ()=>{
    //Define la solicitud para cerrar la sesión (Este código no es js es AJAX)
    var xhr = new XMLHttpRequest();
    //Entra al archivo para cerrar la sesión
    xhr.open("GET", "../php/logout.php", false);
    //Manda la solicitud
    xhr.send();
});