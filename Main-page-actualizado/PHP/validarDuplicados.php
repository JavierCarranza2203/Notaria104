<?php

include 'conection.php';

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

$clienteExiste = false;
$nombreCompletoNuevoRegistro = $nombreDePila.' '.$apellidoPaterno.' '.$apellidoMaterno;
$nombreCompletoRegistroExistente = '';
$curpObtenido = '';

// Obtener los datos para validar no duplicados
$queryClientesRegistrados = "SELECT nombre_de_pila, apellido_paterno, apellido_materno, curp FROM cliente";
$resultadoClientesRegistrados = mysqli_query($conection, $queryClientesRegistrados);

while ($row = $resultadoClientesRegistrados->fetch_array()) {
    $nombreCompletoRegistroExistente = $row["nombre_de_pila"].' '.$row["apellido_paterno"].' '.$row["apellido_materno"];
    $curpObtenido = $row["curp"];

    if ($nombreCompletoNuevoRegistro == $nombreCompletoRegistroExistente && $curp == $curpObtenido) {
        $clienteExiste = true;
        break;
    }
}

if ($clienteExiste) {
    echo 'Error al agregar, el cliente ya existe.';
}
else {
    echo 'Se agrego correctamente el cliente';
}

?>