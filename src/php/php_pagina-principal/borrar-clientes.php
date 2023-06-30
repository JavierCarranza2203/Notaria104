<?php

include 'conection.php';

if (isset($_POST["numero"])) {
    // Se envio el formulario correctamente
    $idCliente = $_POST["numero"];
    $tabla = 'cliente';
    $query = 'DELETE FROM '.$tabla.' WHERE id = '.$idCliente.'';
    $result = mysqli_query($conection, $query);
    // Si se ejecuto, regresar al inicio
    if ($result) {
        header("Location: ../tabla-clientes.php");
    }
    else {
        echo '
        <script>
            alert("No se pudo borrar el cliente. Intente de nuevo mas tarde")
        </script>
        ';
    }
}
else {
    // Mostrar el codigo de error
}

?>