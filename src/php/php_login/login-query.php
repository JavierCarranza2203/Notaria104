<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "notaria104";

    $conexion = mysqli_connect($host, $user, $pass, $db);

    if(!$conexion){
        die("No hay conexion: ".mysqli_connect_error());
    }

    $usuario = $_POST["txtUsuario"];
    $password = $_POST["txtPassword"];

    $query = mysqli_query($conexion,"SELECT*FROM usuarios WHERE nombre = '".$usuario."' and password = '".$password."'");
    $nr = mysqli_num_rows($query);

    if($nr == 1){
        header("Location: ../../Main-Page/index.html");
    }
    else if($nr == 0){
        echo "No ingreso";
    }
?>