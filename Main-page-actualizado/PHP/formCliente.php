<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de clientes</title>
</head>
<body>
    <!--Mensaje de error-->
    <div class="error-container" id="error-container">
        <div class="error-container__icon-container">
            <h1>¡Ocurrió un error!</h1>
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <div class="error-container__info">
            <h3 id="solution">Intente de nuevo y si el problema continúa, contacte al administrador de sistemas.</h3>
            <h3 class="error-container__info-error-code" id="CodigoError">Ocurrió un error desconocido</h3>
        </div>
    </div>
</body>
</html>
<?php
// Verifica si hay datos enviados del formulario
if ($_POST) {
    include 'conection.php';

    #region Variables del formulario
    $nombreDePila = $_POST["nombreDePila"];
    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $curp = $_POST['CURPCliente'];
    $fechaNacimiento = $_POST["fechaNacimiento"];
    $telefonoParticular = $_POST["telefonoParticular"];
    $telefonoCelular = $_POST["telefonoCelular"];
    $correoElectronico = $_POST["correoElectronico"];
    $estadoCivil = $_POST["estadoCivil"];
    $codigoPostalNacimiento = $_POST["codigoPostalNacimiento"];
    $municipioNacimiento = $_POST["municipioNacimiento"];
    $estadoNacimiento = $_POST["estadoNacimiento"];
    $paisNacimiento = $_POST["paisNacimiento"];
    $calleDomicilio = $_POST["calleDomicilio"];
    $numeroInteriorDomicilio = $_POST["numeroInteriorDomicilio"];
    $numeroExteriorDomicilio = $_POST["numeroExteriorDomicilio"];
    $coloniaDomicilio = $_POST["coloniaDomicilio"];
    $codigoPostalDomicilio = $_POST["codigoPostalDomicilio"];
    #endregion

    $clienteExiste = false;
    $nombreCompletoNuevoRegistro = $nombreDePila.' '.$apellidoPaterno.' '.$apellidoMaterno;
    $nombreCompletoRegistroExistente = '';
    $curpRegistroExistente = '';

    // Obtener los datos para validar no duplicados
    $queryClientesRegistrados = "SELECT nombre_de_pila, apellido_paterno, apellido_materno, curp FROM cliente";
    $resultadoClientesRegistrados = mysqli_query($conection, $queryClientesRegistrados);

    while ($row = $resultadoClientesRegistrados->fetch_array()) {
        $nombreCompletoRegistroExistente = $row["nombre_de_pila"].' '.$row["apellido_paterno"].' '.$row["apellido_materno"];
        $curpRegistroExistente = $row["curp"];
        // Valida la existencia mediante el nombre y CURP
        if ($nombreCompletoNuevoRegistro == $nombreCompletoRegistroExistente && $curp == $curpRegistroExistente) {
            $clienteExiste = true;
            break;
        }
    }

    if ($clienteExiste) {
        // El cliente ya existe, mostrar pantalla con el mensaje
        echo 'El cliente ya existe';
    }
    // Nuevo codigo de error, el cliente ya existe
    else {
        // Consulta con todos los valores
        $query = "INSERT INTO cliente VALUES ('','$nombreDePila','$apellidoPaterno','$apellidoMaterno','$curp','$fechaNacimiento','$telefonoParticular','$telefonoCelular','$correoElectronico','$estadoCivil','$codigoPostalNacimiento','$municipioNacimiento','$estadoNacimiento','$paisNacimiento','$calleDomicilio','$numeroInteriorDomicilio','$numeroExteriorDomicilio','$coloniaDomicilio','$codigoPostalDomicilio')";
        // Resultado de la consulta
        $result = mysqli_query($conection, $query);
        // Si se ejecuto, regresar al inicio
        if ($result) {
            header("Location: ../index.html");
        }
    }
}
// Si no los hay, muestra codigo de error (se trato de acceder a la pagina sin datos en el form)
else {

}

?>