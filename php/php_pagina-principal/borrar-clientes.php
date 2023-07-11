<?php
    include '../conection.php';

    // Verificar la conexión
    if (!$conection) {
        die("Error de conexión a la base de datos");
    }

    $id = $_GET["id"];


    $query = "DELETE FROM cliente WHERE id = $id";
    $result = mysqli_query($conection, $query);

    if ($result) {

        $registro = true;

        $jsonRegistro = json_encode($registro);

        header("Content-Type: application/json");

        echo $jsonRegistro;
    } else {
        echo "Registro no encontrado";
    }

$conection->close();
?> 