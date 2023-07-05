try{
    /*    ************************************************
    *    **    DECLARACIÓN DE CONSTANTES Y VARIABLES   **
    *    ************************************************
    */
    //Obtiene el formulario
    const frmNuevoCliente = document.getElementById("frmNuevoCliente");

    //Obtiene los campos de texto
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
    const camposConPrimerLetraMayuscula = [txtNombre, txtApellidoPaterno, txtApellidoMaterno];

    //Obtiene el boton de guardar
    const btnGuardar = document.getElementById("btnGuardar");

    //Obtiene los botones y el message box
    const btnCerrarMessageBox = document.getElementById("messageBoxIconClose");
    const messageBoxIcon = document.getElementById("messageBoxIcon");
    const messageBoxMessage = document.getElementById("messageBoxMessage");
    const messageBox = document.getElementById("messageBox");

    //Define un objeto con el formato para cada uno de los campos
    const cadenaCaracteres = {
        formatoSoloNumeros:  /^\d+$/,
        formato1Nombre: /^[a-zA-Z]+\s[a-zA-Z]+$/,
        formato2Nombre: /^[a-zA-Z]+$/,
        formatoCorreo: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        formatoDomicilio: /^[a-zA-Z0-9\s.-]+$/,
        formatoRFC: /^[A-Z]{4}[0-9]{6}[A-Z]{2}[A-Z0-9]{1}$/,
    };

    //Define un objeto para saber cuando todos los campos esten correctos
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
        RFC: false
    };
    /*    *********************************************************
    *    **    FIN DE LA DECLARACIÓN DE CONSTANTES Y VARIABLES   **
    *    **********************************************************
    */
    /*    *************************************************
    *    **    FUNCIONAMIENTO DEL ENViO DEL FORMULARIO   **
    *    **************************************************
    */
    //Funcion para mostrar si un campo es valido o no
    function MostrarCampoValido(campo, validado){
        if(validado){
            campo.nextElementSibling.classList.remove("fa-circle-xmark");
            campo.nextElementSibling.classList.remove("form__icon--invalid");
            campo.nextElementSibling.classList.add("fa-circle-check");
            campo.nextElementSibling.classList.add("form__icon--valid");

            return true;
        }
        else{
            campo.nextElementSibling.classList.remove("fa-circle-check");
            campo.nextElementSibling.classList.remove("form__icon--valid");
            campo.nextElementSibling.classList.add("fa-circle-xmark");
            campo.nextElementSibling.classList.add("form__icon--invalid");

            return false
        }
    }

    //Funcion para quitar la validacion (se usa para campos opcionales)
    function QuitarValidacion(campo){
        campo.nextElementSibling.classList.remove("fa-circle-check");
        campo.nextElementSibling.classList.remove("form__icon--valid");
        campo.nextElementSibling.classList.remove("fa-circle-xmark");
        campo.nextElementSibling.classList.remove("form__icon--invalid");
        
        return true;
    }

    txtNombre.addEventListener("blur", ()=>{
        campos.Nombre = MostrarCampoValido(txtNombre, (cadenaCaracteres.formato1Nombre.test(txtNombre.value) || cadenaCaracteres.formato2Nombre.test(txtNombre.value)));
    });

    txtApellidoPaterno.addEventListener("blur", ()=>{
        campos.ApellidoPaterno = MostrarCampoValido(txtApellidoPaterno, cadenaCaracteres.formato2Nombre.test(txtApellidoPaterno.value));
    });

    txtApellidoMaterno.addEventListener("blur", ()=>{
        if(txtApellidoMaterno.value == "" || txtApellidoMaterno.value == null){
            campos.ApellidoMaterno = QuitarValidacion(txtApellidoMaterno);
        }
        else{
            campos.ApellidoMaterno = MostrarCampoValido(txtApellidoMaterno, cadenaCaracteres.formato2Nombre.test(txtApellidoMaterno.value));
        }
    });

    txtTelefonoParticular.addEventListener("blur", ()=>{
        if(txtTelefonoParticular.value == "" || txtTelefonoParticular.value == null){
            campos.TelefonoParticular = QuitarValidacion(txtTelefonoParticular);
        }
        else{
            campos.TelefonoParticular = MostrarCampoValido(txtTelefonoParticular, (cadenaCaracteres.formatoSoloNumeros.test(txtTelefonoParticular.value) && txtTelefonoParticular.value.length >= 10));
        }
    });

    txtTelefonoCelular.addEventListener("blur", ()=>{
        campos.TelefonoCelular = MostrarCampoValido(txtTelefonoCelular, (cadenaCaracteres.formatoSoloNumeros.test(txtTelefonoCelular.value) && txtTelefonoCelular.value.length >= 10));
    });

    txtCorreoElectronico.addEventListener("blur", ()=>{
        if(txtCorreoElectronico.value == "" || txtCorreoElectronico.value == null){
            campos.CorreoElectronico = QuitarValidacion(txtCorreoElectronico);
        }
        else{
            campos.CorreoElectronico = MostrarCampoValido(txtCorreoElectronico, cadenaCaracteres.formatoCorreo.test(txtCorreoElectronico.value));
        }
    });

    txtCalle.addEventListener("blur", ()=>{
        let texto = txtCalle.value;
        txtCalle.value = texto.charAt(0).toUpperCase() + texto.slice(1);
        campos.Calle = MostrarCampoValido(txtCalle, cadenaCaracteres.formatoDomicilio.test(txtCalle.value));
    });

    txtNumInterior.addEventListener("blur", ()=>{
        if(txtNumInterior.value == "" || txtNumInterior.value == null){
            campos.NumInterior = QuitarValidacion(txtNumInterior);
        }
        else{
            campos.NumInterior = MostrarCampoValido(txtNumInterior, cadenaCaracteres.formatoDomicilio.test(txtNumInterior.value));
        }
    });

    txtNumExterior.addEventListener("blur", ()=>{
        campos.NumExterior = MostrarCampoValido(txtNumExterior, cadenaCaracteres.formatoSoloNumeros.test(txtNumExterior.value));
    });

    txtColonia.addEventListener("blur", ()=>{
        let texto = txtColonia.value;
        txtColonia.value = texto.charAt(0).toUpperCase() + texto.slice(1);
        campos.Colonia = MostrarCampoValido(txtColonia, cadenaCaracteres.formatoDomicilio.test(txtColonia.value));
    });

    txtCodigoPostal.addEventListener("blur", ()=>{
        campos.CodigoPostal = MostrarCampoValido(txtCodigoPostal, cadenaCaracteres.formatoSoloNumeros.test(txtCodigoPostal.value));
    });

    txtRFC.addEventListener("blur", ()=>{
        txtRFC.value = txtRFC.value.toUpperCase();
        campos.RFC = MostrarCampoValido(txtRFC, cadenaCaracteres.formatoRFC.test(txtRFC.value));
    });

    camposConPrimerLetraMayuscula.forEach(input =>{
        input.addEventListener("keyup", ()=>{
            let palabras = input.value.split(" ");
            for(let i = 0; i < palabras.length; i++){
                palabras[i] = palabras[i].charAt(0).toUpperCase() + palabras[i].slice(1);
            }

            input.value = palabras.join(" ");
        });
    });

    frmNuevoCliente.addEventListener("submit", function(event){
        event.preventDefault();

        if(MessageBoxShow((campos.Nombre == true &&
            campos.ApellidoPaterno == true &&
            campos.ApellidoMaterno == true &&
            campos.TelefonoParticular == true &&
            campos.TelefonoCelular == true &&
            campos.CorreoElectronico == true &&
            campos.Calle == true &&
            campos.NumInterior == true &&
            campos.NumExterior == true &&
            campos.Colonia == true &&
            campos.CodigoPostal == true &&
            campos.RFC == true))){
                frmNuevoCliente.submit();
            };
    });
    /*    *********************************************************
    *    **    FIN DEL FUNCIONAMIENTO DEL ENViO DEL FORMULARIO   **
    *    **********************************************************
    */
    function MessageBoxShow(validado){
        messageBox.classList.add("message-box--show");
        if(validado){
            messageBox.classList.add("message-box--correct");
            messageBoxIcon.classList.add("fa-user-check");
            messageBoxMessage.textContent = "El cliente se ha agregado correctamente";

            return true;
        }
        else{
            messageBox.classList.add("message-box--incorrect");
            messageBoxIcon.classList.add("fa-user-xmark");
            messageBoxMessage.textContent = "Hubo un error, por favor verifique los datos";

            return false;
        }
    }

    btnCerrarMessageBox.addEventListener("click", ()=>{
        messageBox.classList.remove("message-box--show");
        messageBox.classList.remove("message-box--correct");
        messageBox.classList.remove("message-box--incorrect");
        messageBoxIcon.classList.remove("fa-user-check");
        messageBoxIcon.classList.remove("fa-user-xmark");
    });
}
catch(exception){
    alert(exception);
}