<?php
include '../conection.php';

// Verificar la conexión
if (!$conection) {
    die("Error de conexión a la base de datos");
}

$tabla = $_GET["tabla"];

$sql = "SELECT ".$tabla.".folio, datosidentificacion.nombre_cliente, datosidentificacion.volumen, datosidentificacion.instrumento FROM ".$tabla." INNER JOIN datosidentificacion ON ".$tabla.".id_datosIdentificacion = datosidentificacion.id";

$result = $conection->query($sql);

if ($result->num_rows > 0) {
    $registros = array();

    while ($registro = $result->fetch_assoc()) {
        $registros[] = $registro;
    }

    $jsonRegistros = json_encode($registros);

    header("Content-Type: application/json");

    echo $jsonRegistros;
} else {
    echo "No se encontraron registros";
}

$conection->close();
?>