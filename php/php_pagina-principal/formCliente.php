<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de clientes</title>
    <link rel="stylesheet" href="../../src/css/estilos_pagina-principal/style_error-page.css">
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
    include '../conection.php';

    #region Variables del formulario
    $nombre = $_POST['txtNombre'];
    $apellido_paterno = $_POST['txtApellidoPaterno'];
    $apellido_materno = $_POST['txtApellidoMaterno'];
    $telefono_particular = $_POST['txtTelefonoParticular'];
    $telefono_celular = $_POST['txtTelefonoCelular'];
    $correo = $_POST['txtCorreoElectronico'];
    $domicilio_calle = $_POST['txtCalle'];
    $num_interior = $_POST['txtNumInterior'];
    $num_exterior = $_POST['txtNumExterior'];
    $domicilio_colonia = $_POST['txtColonia'];
    $codigo_postal = $_POST['txtCodigoPostal'];
    $rfc = $_POST['txtRFC'];

    // Calcular el campo "folio"
    $folio = "23" . substr($rfc, -9);

    $clienteExiste = false;
    $nombreCompletoNuevoRegistro = $nombre.' '.$apellido_paterno.' '.$apellido_materno;
    $nombreCompletoRegistroExistente = '';
    $rfcRegistroExistente = '';

    // Obtener los datos para validar no duplicados
    $queryClientesRegistrados = "SELECT nombre, apellido_paterno, apellido_materno, rfc FROM cliente";
    $resultadoClientesRegistrados = mysqli_query($conection, $queryClientesRegistrados);

    while ($row = $resultadoClientesRegistrados->fetch_array()) {
        $nombreCompletoRegistroExistente = $row["nombre"].' '.$row["apellido_paterno"].' '.$row["apellido_materno"];
        $rfcRegistroExistente = $row["rfc"];
        // Valida la existencia mediante el nombre y CURP
        if ($nombreCompletoNuevoRegistro == $nombreCompletoRegistroExistente && $rfc == $rfcRegistroExistente) {
            $clienteExiste = true;
            break;
        }
    }

    if ($clienteExiste) {
        echo 'El cliente ya existe';
    }
    else {
        $sql = "INSERT INTO cliente (nombre, apellido_paterno, apellido_materno, telefono_particular, telefono_celular, correo, domicilio_calle, num_interior, num_exterior, domicilio_colonia, codigo_postal, rfc, folio)
        VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$telefono_particular', '$telefono_celular', '$correo', '$domicilio_calle', '$num_interior', '$num_exterior', '$domicilio_colonia', '$codigo_postal', '$rfc', '$folio')";

        // Ejecutar la consulta
        if ($conection->query($sql) === TRUE) {
            // Redireccionar a otra página
            header("Location: ../../Pagina principal/clientes/agregar-cliente.php");
            exit();
        } else {
            echo "Error al insertar datos: " . $conection->error;
        }

        $conection->close();

    }
}
// Si no los hay, muestra codigo de error (se trato de acceder a la pagina sin datos en el form)
else {

}

?>