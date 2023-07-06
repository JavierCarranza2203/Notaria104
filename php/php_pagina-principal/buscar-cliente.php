<?php
include '../conection.php';

// Verificar la conexión
if ($conection->connect_error) {
    die("Error de conexión a la base de datos: " . $conection->connect_error);
}

$id = $_GET["id"];

$sql = "SELECT * FROM cliente WHERE id = $id";

$result = $conection->query($sql);

if ($result->num_rows > 0) {
    $registro = $result->fetch_assoc();

    $jsonRegistro = json_encode($registro);

    header("Content-Type: application/json");

    echo $jsonRegistro;
} else {
    echo "Registro no encontrado";
}

$conection->close();
?>
