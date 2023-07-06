const arrayBotones = document.getElementsByClassName("section__table-button");
const x = document.getElementById("idCliente");

for(let i = 0; i < arrayBotones.length; i++){
    arrayBotones[i].addEventListener("click", ()=>{
        let idCliente = arrayBotones[i].nextElementSibling.value;

        let httpRequest = new XMLHttpRequest();

        httpRequest.open("GET", "../../php/php_pagina-principal/buscar-cliente.php? id=" + idCliente, true);

        httpRequest.onreadystatechange = function() {

            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                let cliente = JSON.parse(httpRequest.responseText);
                x.textContent = "Id:" + cliente.id;
            }
        };
        httpRequest.send();
    }); 
}
