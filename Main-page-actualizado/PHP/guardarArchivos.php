<?php

include 'conection.php';
$tipoTramite = $_POST['tipoTramite'];
$arrArchivosTMP = [];
$arrArchivos = [];
$arrArchivosExt = [];
$arrConsultas = [];
$arrResultados = [];
$arrArchivosEnviados = [];
$carpetaPrincipal = 'archivos/';
$subcarpeta = "$tipoTramite/";
$rutaDestino = $carpetaPrincipal.$subcarpeta;
date_default_timezone_set('America/Matamoros');
$fechaActual = date("d-m-Y");
$horaActual = date("h-i-s");
$fechaArchivo = $fechaActual.'_'.$horaActual.'_';
$archivosGuardados = false;
$tipoTramite = $_POST['tipoTramite'].'_';

if (isset($_POST['guardar'])) {
    $arr = $_FILES;
    foreach ($arr as $clave => $valor) {
        if ($_FILES[$clave]["name"] !== '') {
            $arrArchivosTMP[] = $_FILES[$clave]["tmp_name"];
            $arrArchivosExt[] = pathinfo($_FILES[$clave]["name"], PATHINFO_EXTENSION);
            $arrArchivos[] = $tipoTramite.$fechaArchivo;
            $arrArchivosEnviados[] = true;
            echo "Clave: $clave<br>";
        }
    }

    if (!file_exists('../'.$rutaDestino)) {
        mkdir('../'.$rutaDestino, 0777, true);
    }

    $cantidadArchivos = count($arrArchivos);
    for ($i = 0; $i < $cantidadArchivos; $i++) {
        if ($arrArchivosEnviados[$i]) {
            $arrArchivos[$i] = $arrArchivos[$i].($i+1).'.'.$arrArchivosExt[$i];

            $moverArchivo = move_uploaded_file($arrArchivosTMP[$i], '../'.$rutaDestino.$arrArchivos[$i]);
            if ($moverArchivo) {
                $arrConsultas[$i] = "INSERT INTO tramite VALUES('', '$carpetaPrincipal', '$subcarpeta', '$arrArchivos[$i]', '$arrArchivosExt[$i]')";
                $arrResultados[$i] = mysqli_query($conection, $arrConsultas[$i]);

                if ($arrResultados[$i]) {
                    $archivosGuardados = true;
                }
                else {
                    printf("Error message: %s\n", mysqli_error($conection));
                    $archivosGuardados = false;
                }
            }
            else {
                echo 'No se pudo mover el archivo: '.$arrArchivos[$i].'<br>';
            }
        }
    }
    if ($archivosGuardados) {
        echo "<script>alert('Se guardaron los archivos correctamente'); window.location='../index.html'</script>";
    }
}
else {
    // Mensaje de error
    echo 'No se envio el form';
}

mysqli_close($conection);

?>