const form = document.getElementById('formCliente')
const arrInputs = document.querySelectorAll('#formCliente input')
const select = document.getElementById('estadoCivil')
const btnGuardarCliente = document.getElementById('guardarCliente')
const mssgForm = document.querySelector('.client-form-container__form-message')
const inputFechaNacimiento = document.getElementById('fechaNacimiento')
const labelFechaNacimiento = document.querySelector('.message-fechaNacimiento')

const expresiones = {
    letras: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    letrasNumeros: /^[a-zA-ZÀ-ÿ0-9-.\s]{1,40}$/,
    curp: /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
    telefono: /^\d{10,13}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    codigoPostal: /^\d{4,6}$/,
    numeroIntExt: /^[a-zA-ÿ0-9-.\s]{1,4}$/
}

const campos = {
    nombreDePila: false,
    apellidoPaterno: false,
    apellidoMaterno: true,
    CURPCliente: false,
    fechaNacimiento: false,
    telefonoParticular: true,
    telefonoCelular: false,
    correoElectronico: false,
    estadoCivil: false,
    codigoPostalNacimiento: false,
    municipioNacimiento: false,
    estadoNacimiento: false,
    paisNacimiento: false,
    calleDomicilio: false,
    numeroInteriorDomicilio: true,
    numeroExteriorDomicilio: false,
    coloniaDomicilio: false,
    codigoPostalDomicilio: false
}

const validarForm = (e) => {
    switch (e.target.name) {
        // Campos nombre completo
        case "nombreDePila":
            validarCampo(expresiones.letras, e.target, 'nombreDePila')
            break
        case "apellidoPaterno":
            validarCampo(expresiones.letras, e.target, 'apellidoPaterno')
            break
        case "apellidoMaterno":
            validarCampo(expresiones.letras, e.target, 'apellidoMaterno')
            break
        // Campo curp
        case "CURPCliente":
            validarCampo(expresiones.curp, e.target, 'CURPCliente')
            break
        // Campos telefono
        case "telefonoParticular":
            validarCampo(expresiones.telefono, e.target, 'telefonoParticular')
            break
        case "telefonoCelular":
            validarCampo(expresiones.telefono, e.target, 'telefonoCelular')
            break
        // Campo correo electronico
        case "correoElectronico":
            validarCampo(expresiones.correo, e.target, 'correoElectronico')
            break
        // Campo seleccion estado civil
        case "estadoCivil":
            validarCampo(expresiones.letras, e.target, 'estadoCivil')
            break
        // Campos de lugar de nacimiento
        case "codigoPostalNacimiento":
            validarCampo(expresiones.codigoPostal, e.target, 'codigoPostalNacimiento')
            break
        case "municipioNacimiento":
            validarCampo(expresiones.letras, e.target, 'municipioNacimiento')
            break
        case "estadoNacimiento":
            validarCampo(expresiones.letras, e.target, 'estadoNacimiento')
            break
        case "paisNacimiento":
            validarCampo(expresiones.letras, e.target, 'paisNacimiento')
            break
        // Campos de domicilio
        case "calleDomicilio":
            validarCampo(expresiones.letrasNumeros, e.target, 'calleDomicilio')
            break
        case "numeroInteriorDomicilio":
            validarCampo(expresiones.numeroIntExt, e.target, 'numeroInteriorDomicilio')
            break
        case "numeroExteriorDomicilio":
            validarCampo(expresiones.numeroIntExt, e.target, 'numeroExteriorDomicilio')
            break
        case "coloniaDomicilio":
            validarCampo(expresiones.letrasNumeros, e.target, 'coloniaDomicilio')
            break
        case "codigoPostalDomicilio":
            validarCampo(expresiones.codigoPostal, e.target, 'codigoPostalDomicilio')
            break
        // Ninguno de los anteriores
        default:
            break
    }
}

const validarCadena = (e) => {
    // Obtiene la cadena y elimina espacios al inicio y al final
    textoSinEspacios = e.target.value.replace(/\s+/g, " ").trim()
    e.target.value = textoSinEspacios
}

const validarCampo = (expresion, input, campo) => {
    // Verifica que no haya seleccionado la opcion por default
    if (input.name == 'estadoCivil' && input.selectedIndex == 0) {
        document.querySelector(`.message-${campo}`).classList.remove('success')
        document.querySelector(`.message-${campo}`).classList.add('error')
        document.querySelector(`.message-${campo}`).innerHTML = '<i class="fas fa-exclamation-circle"></i> Informacion invalida'
        campos[campo] = false
    }
    // Verifica si el campo es opcional y esta vacio
    if (input.value == '' && input.required == false) {
        document.querySelector(`.message-${campo}`).classList.remove('error')
        document.querySelector(`.message-${campo}`).classList.remove('success')
        document.querySelector(`.message-${campo}`).classList.add('optional')
        document.querySelector(`.message-${campo}`).innerHTML = 'Campo opcional'
        campos[campo] = true
    }
    // Verifica si esta vacio (asumiendo que es requerido)
    else if (input.value == '') {
        document.querySelector(`.message-${campo}`).classList.remove('error')
        document.querySelector(`.message-${campo}`).classList.remove('success')
        document.querySelector(`.message-${campo}`).innerHTML = 'Campo obligatorio'
        campos[campo] = false
    }
    // Evalua el valor con la expresion regular
    else if (expresion.test(input.value)) {
        document.querySelector(`.message-${campo}`).classList.remove('optional')
        document.querySelector(`.message-${campo}`).classList.remove('error')
        document.querySelector(`.message-${campo}`).classList.add('success')
        document.querySelector(`.message-${campo}`).innerHTML = '<i class="fas fa-check-circle"></i> Informacion valida'
        campos[campo] = true
    }
    // No cumple las anteriores excepciones ni la expresion regular
    else {
        document.querySelector(`.message-${campo}`).classList.remove('optional')
        document.querySelector(`.message-${campo}`).classList.remove('success')
        document.querySelector(`.message-${campo}`).classList.add('error')
        document.querySelector(`.message-${campo}`).innerHTML = '<i class="fas fa-exclamation-circle"></i> Informacion invalida'
        campos[campo] = false
    }
}

const validarFecha = () => {
    if (inputFechaNacimiento.value != '' && inputFechaNacimiento.value >= inputFechaNacimiento.min && inputFechaNacimiento.value <= inputFechaNacimiento.max) {
        labelFechaNacimiento.classList.remove('error')
        labelFechaNacimiento.classList.add('success')
        labelFechaNacimiento.innerHTML = '<i class="fas fa-check-circle"></i> Fecha valida'
        campos.fechaNacimiento = true
    }
    else {
        labelFechaNacimiento.classList.remove('success')
        labelFechaNacimiento.classList.add('error')
        labelFechaNacimiento.innerHTML = '<i class="fas fa-exclamation-circle"></i> Fecha invalida'
        campos.fechaNacimiento = false
    }
}

arrInputs.forEach((input) => {
    input.addEventListener('keyup', validarForm)
    input.addEventListener('blur', validarForm)
    input.addEventListener('blur', validarCadena)
})

select.addEventListener('change', validarForm)
inputFechaNacimiento.addEventListener('change', validarFecha)
inputFechaNacimiento.addEventListener('blur', validarFecha)

// Detecta el click en el boton para guardar
btnGuardarCliente.addEventListener('click', () => {
    // Verifica si todos los campos estan validados
    if (campos.nombreDePila &&
        campos.apellidoPaterno &&
        campos.apellidoMaterno &&
        campos.fechaNacimiento &&
        campos.telefonoParticular &&
        campos.telefonoCelular &&
        campos.correoElectronico &&
        campos.estadoCivil &&
        campos.codigoPostalNacimiento &&
        campos.municipioNacimiento &&
        campos.estadoNacimiento &&
        campos.paisNacimiento &&
        campos.calleDomicilio &&
        campos.numeroInteriorDomicilio &&
        campos.numeroExteriorDomicilio &&
        campos.coloniaDomicilio &&
        campos.codigoPostalDomicilio) {
            // Muestra el mensaje de envio del formulario
            document.querySelector('.client-form-container__form-message').classList.remove('error')
            document.querySelector('.client-form-container__form-message').innerText = 'Datos correctos. Validando la informacion...'
            document.querySelector('.client-form-container__form-message').style.display = 'flex'
            // Hace scroll para que aparezca en pantalla
            mssgForm.scrollIntoView({behavior: 'smooth', block: 'start'})
            // Espera 5 segundos para desaparecer el mensaje de envio del formulario
            setTimeout(() => {
                document.querySelector('.client-form-container__form-message').style.display = 'none'
                document.querySelector('.client-form-container__form-message').classList.remove('error')
                // Envia 
                form.submit()
            }, 2500);
        }
        // Hay algun campo invalido
        else {
            document.querySelector('.client-form-container__form-message').classList.add('error')
            document.querySelector('.client-form-container__form-message').innerText = 'Verifique correctamente los campos.'
            document.querySelector('.client-form-container__form-message').style.display = 'flex'
            // Hace scroll para que aparezca en pantalla
            mssgForm.scrollIntoView({behavior: 'smooth', block: 'start'})
            setTimeout(() => {
                document.querySelector('.client-form-container__form-message').style.display = 'none'
                document.querySelector('.client-form-container__form-message').classList.remove('error')
            }, 3000);
        }
})