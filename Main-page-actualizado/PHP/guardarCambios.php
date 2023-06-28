<?php
include 'conection.php';

#region Variables del formulario
$id = $_POST["idCliente"];
$nombreDePila = $_POST["nombreDePila"];
$apellidoPaterno = $_POST["apellidoPaterno"];
$apellidoMaterno = $_POST["apellidoMaterno"];
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
// Consulta con todos los valores
$query = "UPDATE cliente SET nombre_de_pila='$nombreDePila',apellido_paterno='$apellidoPaterno',apellido_materno='$apellidoMaterno',fecha_de_nacimiento='$fechaNacimiento',telefono_particular='$telefonoParticular',telefono_celular='$telefonoCelular',correo_electronico='$correoElectronico',estado_civil='$estadoCivil',codigo_postal_nacimiento='$codigoPostalNacimiento',municipio_nacimiento='$municipioNacimiento',estado_nacimiento='$estadoNacimiento',pais_nacimiento='$paisNacimiento',calle_domicilio='$calleDomicilio',numero_interior_domicilio='$numeroInteriorDomicilio',numero_exterior_domicilio='$numeroExteriorDomicilio',colonia_domicilio='$coloniaDomicilio',codigo_postal_domicilio='$codigoPostalDomicilio' WHERE id = '$id'";
// Resultado de la consulta
$result = mysqli_query($conection, $query);
// Si se ejecuto, regresar al inicio
if ($result) {
    echo "<script> alert('Se han guardado los cambios correctamente'); window.location='../tabla-clientes.php'; </script>";
}
else{
    echo "<script> alert('No se puedieron actualizar los datos'); window.history.go(-1); </script>";
}

?>