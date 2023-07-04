try{
    /*    ************************************************
    *    **    DECLARACIÓN DE CONSTANTES Y VARIABLES   **
    *    ************************************************
    */
    const frmNuevoCliente = document.getElementById("frmNuevoCliente");
    const txtNombre = document.getElementById("txtNombre");
    const txtApellidoPaterno = document.getElementById("txtApellidoPaterno");
    const txtApellidoMaterno = document.getElementById("txtApellidoMaterno");
    const txtTelefonoParticular = document.getElementById("txtTelefonoParticular");
    const txtTelefonoCelular = document.getElementById("txtTelefonoCelular");
    const txtCorreoElectronico = document.getElementById("txtCorreoElectronico");
    const txtCalle = document.getElementById("txtCalle");
    const txtNumInterior = document.getElementById("txtNumInterior");
    const txtNumExterior = document.getElementById("txtNumExterior");
    const txtColonia = document.getElementById("txtColonia");
    const txtCodigoPostal = document.getElementById("txtCodigoPostal");
    const txtRFC = document.getElementById("txtRFC");

    const cadenaCaracteres = {
        formatoSoloNumeros:  /^\d+$/,
        formato1Nombre: /^[a-zA-Z]+\s[a-zA-Z]+$/,
        formato2Nombre: /^[a-zA-Z]+$/,
        formatoCorreo: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        formatoDomicilio: /^[a-zA-Z0-9.-]+$/,
        formatoRFC: /^[A-Z]{4}[0-9]{6}[A-Z]{3}[A-Z0-9]{2}$/,
    };

    const campos = {
        Nombre: false,
        ApellidoPaterno: false,
        ApellidoMaterno: true,
        TelefonoParticular: true,
        TelefonoCelular: false,
        CorreoElectronico: true,
        Calle: false,
        NumInterior: true,
        NumExterior: false,
        Colonia: false,
        CodigoPostal: false,
        txtRFC: false
    };

    txtNombre.addEventListener("blur", ()=>{
        if(cadenaCaracteres.formato1Nombre.test(txtNombre.value) || cadenaCaracteres.formato2Nombre.test(txtNombre.value)){
            txtNombre.nextElementSibling.classList.remove("fa-circle-xmark");
            txtNombre.nextElementSibling.classList.remove("form__icon--invalid");
            txtNombre.nextElementSibling.classList.add("fa-circle-check");
            txtNombre.nextElementSibling.classList.add("form__icon--valid");
        }
        else{
            txtNombre.nextElementSibling.classList.remove("fa-circle-check");
            txtNombre.nextElementSibling.classList.remove("form__icon--valid");
            txtNombre.nextElementSibling.classList.add("fa-circle-xmark");
            txtNombre.nextElementSibling.classList.add("form__icon--invalid");
        }
    });

    txtApellidoPaterno.addEventListener("blur", ()=>{
        if(cadenaCaracteres.formato2Nombre.test(txtApellidoPaterno.value)){
            txtApellidoPaterno.nextElementSibling.classList.remove("fa-circle-xmark");
            txtApellidoPaterno.nextElementSibling.classList.remove("form__icon--invalid");
            txtApellidoPaterno.nextElementSibling.classList.add("fa-circle-check");
            txtApellidoPaterno.nextElementSibling.classList.add("form__icon--valid");
        }
        else{
            txtApellidoPaterno.nextElementSibling.classList.remove("fa-circle-check");
            txtApellidoPaterno.nextElementSibling.classList.remove("form__icon--valid");
            txtApellidoPaterno.nextElementSibling.classList.add("fa-circle-xmark");
            txtApellidoPaterno.nextElementSibling.classList.add("form__icon--invalid");
        }
    });

    txtApellidoMaterno.addEventListener("blur", ()=>{
        if(cadenaCaracteres.formato2Nombre.test(txtApellidoMaterno.value)){
            txtApellidoMaterno.nextElementSibling.classList.remove("fa-circle-xmark");
            txtApellidoMaterno.nextElementSibling.classList.remove("form__icon--invalid");
            txtApellidoMaterno.nextElementSibling.classList.add("fa-circle-check");
            txtApellidoMaterno.nextElementSibling.classList.add("form__icon--valid");
        }
        else if(txtApellidoMaterno.value == ""){
            txtApellidoMaterno.nextElementSibling.classList.remove("fa-circle-check");
            txtApellidoMaterno.nextElementSibling.classList.remove("form__icon--valid");
            txtApellidoMaterno.nextElementSibling.classList.remove("fa-circle-xmark");
            txtApellidoMaterno.nextElementSibling.classList.remove("form__icon--invalid");
        }
        else{
            txtApellidoMaterno.nextElementSibling.classList.remove("fa-circle-check");
            txtApellidoMaterno.nextElementSibling.classList.remove("form__icon--valid");
            txtApellidoMaterno.nextElementSibling.classList.add("fa-circle-xmark");
            txtApellidoMaterno.nextElementSibling.classList.add("form__icon--invalid");
        }
    });

    txtTelefonoParticular.addEventListener("blur", ()=>{
        if(cadenaCaracteres.formatoSoloNumeros.test(txtTelefonoParticular.value) && txtTelefonoParticular.value.length >= 10){
            txtTelefonoParticular.nextElementSibling.classList.remove("fa-circle-xmark");
            txtTelefonoParticular.nextElementSibling.classList.remove("form__icon--invalid");
            txtTelefonoParticular.nextElementSibling.classList.add("fa-circle-check");
            txtTelefonoParticular.nextElementSibling.classList.add("form__icon--valid");
        }
        else if(txtTelefonoParticular.value == ""){
            txtTelefonoParticular.nextElementSibling.classList.remove("fa-circle-check");
            txtTelefonoParticular.nextElementSibling.classList.remove("form__icon--valid");
            txtTelefonoParticular.nextElementSibling.classList.remove("fa-circle-xmark");
            txtTelefonoParticular.nextElementSibling.classList.remove("form__icon--invalid");
        }
        else{
            txtTelefonoParticular.nextElementSibling.classList.remove("fa-circle-check");
            txtTelefonoParticular.nextElementSibling.classList.remove("form__icon--valid");
            txtTelefonoParticular.nextElementSibling.classList.add("fa-circle-xmark");
            txtTelefonoParticular.nextElementSibling.classList.add("form__icon--invalid");
        }
    });

    txtTelefonoCelular.addEventListener("blur", ()=>{
        if(cadenaCaracteres.formatoSoloNumeros.test(txtTelefonoCelular.value) && txtTelefonoCelular.value.length >= 10){
            txtTelefonoCelular.nextElementSibling.classList.remove("fa-circle-xmark");
            txtTelefonoCelular.nextElementSibling.classList.remove("form__icon--invalid");
            txtTelefonoCelular.nextElementSibling.classList.add("fa-circle-check");
            txtTelefonoCelular.nextElementSibling.classList.add("form__icon--valid");
        }
        else{
            txtTelefonoCelular.nextElementSibling.classList.remove("fa-circle-check");
            txtTelefonoCelular.nextElementSibling.classList.remove("form__icon--valid");
            txtTelefonoCelular.nextElementSibling.classList.add("fa-circle-xmark");
            txtTelefonoCelular.nextElementSibling.classList.add("form__icon--invalid");
        }
    });

    txtCalle.addEventListener("blur", ()=>{
        if(cadenaCaracteres.formatoDomicilio.test(txtCalle.value)){
            txtCalle.nextElementSibling.classList.remove("fa-circle-xmark");
            txtCalle.nextElementSibling.classList.remove("form__icon--invalid");
            txtCalle.nextElementSibling.classList.add("fa-circle-check");
            txtCalle.nextElementSibling.classList.add("form__icon--valid");
        }
        else{
            txtCalle.nextElementSibling.classList.remove("fa-circle-check");
            txtCalle.nextElementSibling.classList.remove("form__icon--valid");
            txtCalle.nextElementSibling.classList.add("fa-circle-xmark");
            txtCalle.nextElementSibling.classList.add("form__icon--invalid");
        }
    });

}
catch(exception){
    alert(exception);
}