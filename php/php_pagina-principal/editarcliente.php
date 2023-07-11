<?php

include '../conection.php';

$clienteId = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellidoPaterno = $_POST['txtApellidoPaterno'];
$apellidoMaterno = $_POST['txtApellidoMaterno'];
$telefonoParticular = $_POST['txtTelefonoParticular'];
$telefonoCelular = $_POST['txtTelefonoCelular'];
$correoElectronico = $_POST['txtCorreoElectronico'];
$calle = $_POST['txtCalle'];
$numInterior = $_POST['txtNumInterior'];
$numExterior = $_POST['txtNumExterior'];
$colonia = $_POST['txtColonia'];
$codigoPostal = $_POST['txtCodigoPostal'];
$rfc = $_POST['txtRFC'];

// Consulta SQL para actualizar los datos del cliente
$query = "UPDATE cliente SET nombre = '$nombre', apellido_paterno = '$apellidoPaterno', apellido_materno = '$apellidoMaterno', telefono_particular = '$telefonoParticular', telefono_celular = '$telefonoCelular', correo = '$correoElectronico', domicilio_calle = '$calle', num_interior = '$numInterior', num_exterior = '$numExterior', domicilio_colonia = '$colonia', codigo_postal = '$codigoPostal', rfc = '$rfc' WHERE id = $clienteId";


$resultado = mysqli_query($conection, $query);

echo "El cliente se ha actualizado";
?>