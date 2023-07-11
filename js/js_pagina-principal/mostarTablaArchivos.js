const arrayBotones = document.querySelectorAll(".new-document__item a");

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
    console.log(tipoDocumento);
     conjuntoDatos.forEach(registro=>{
        console.log(registro);
     })
}
