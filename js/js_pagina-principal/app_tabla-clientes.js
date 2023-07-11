//Selecciona todos los botones de la tabla
const arrayBotones = document.querySelectorAll(".section__table-button");

//Selecciona el modal donde se muestran todos los datos
const modal = document.getElementById("modal");

//Selecciona el boton para cerrar el modal
const btnCloseModal = document.getElementById("btnCloseModal");

//Busca los elementos para mostrar los datos del cliente
const nombreCliente = document.getElementById("nombreCliente");
const apellidoPaternoCliente = document.getElementById("apellidoPaternoCliente");
const apellidoMaternoCliente = document.getElementById("apellidoMaternoCliente");
const correoCliente = document.getElementById("correoCliente");
const telefonoParticularCliente = document.getElementById("telefonoParticularCliente");
const telefonoCelularCliente = document.getElementById("telefonoCelularCliente");
const calleCliente = document.getElementById("calleCliente");
const numIntCliente = document.getElementById("numIntCliente");
const numExtCliente = document.getElementById("numExtCliente");
const coloniaCliente = document.getElementById("coloniaCliente");
const codigoPostalCliente = document.getElementById("codigoPostalCliente");
const rfcCliente = document.getElementById("rfcCliente");

let idClienteBorrar = 0;

btnCloseModal.addEventListener("click", ()=>{
    modal.classList.remove("modal-container--show");
});

//Recorre el array de botones para agregar el evento y mostrar los datos
for(let i = 0; i < arrayBotones.length; i++){
    arrayBotones[i].addEventListener("click", ()=>{
        let idCliente = arrayBotones[i].nextElementSibling.value;

        let httpRequest = new XMLHttpRequest();

        httpRequest.open("GET", "../../php/php_pagina-principal/buscar-cliente.php? id=" + idCliente, true);

        httpRequest.onreadystatechange = function() {

            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                let cliente = JSON.parse(httpRequest.responseText);
                idClienteBorrar = cliente.id;
                nombreCliente.textContent = cliente.nombre;
                apellidoPaternoCliente.textContent = cliente.apellido_paterno;
                apellidoMaternoCliente.textContent = cliente.apellido_materno;
                correoCliente.textContent = cliente.correo;
                telefonoParticularCliente.textContent = cliente.telefono_particular;
                telefonoCelularCliente.textContent = cliente.telefono_celular;
                calleCliente.textContent = cliente.domicilio_calle;
                coloniaCliente.textContent = cliente.domicilio_colonia;
                numIntCliente.textContent = cliente.num_interior;
                numExtCliente.textContent = cliente.num_exterior;
                codigoPostalCliente.textContent = cliente.codigo_postal;
                rfcCliente.textContent = cliente.rfc;

                modal.classList.add("modal-container--show");
            }
        };
        httpRequest.send();
    }); 
}

document.getElementById("btnBorrarCliente").addEventListener("click", ()=>{
    let httpRequest = new XMLHttpRequest();

    httpRequest.open("GET", "../../php/php_pagina-principal/borrar-clientes.php? id=" + idClienteBorrar, true);

    httpRequest.onreadystatechange = function() {

        if (httpRequest.readyState === 4 && httpRequest.status === 200) {
            let eliminado = JSON.parse(httpRequest.responseText);
            
            if(eliminado){
                alert("El cliente se ha eliminado");
                modal.classList.remove("modal-container--show");
                location.reload();
            }
            else{
                alert("Hubo un error, intente más tarde");
                modal.classList.remove("modal-container--show");
            }
        }
    };
    httpRequest.send();
});

document.getElementById("btnEditarCliente").addEventListener("click", ()=>{
    window.location.href = `editar-clientes.php?id=${idClienteBorrar}`;
});