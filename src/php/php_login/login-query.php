<?php
    include '../conection.php';

    if(!$conection){
        die("No hay conexion: ".mysqli_connect_error());
    }

    $usuario = $_POST["txtUsuario"];
    $password = $_POST["txtPassword"];

    $query = mysqli_query($conexion, "SELECT*FROM usuarios WHERE nombre = '".$usuario."' and password = '".$password."'");
    
    $nr = mysqli_num_rows($query);

    if($nr == 1){
        
        session_start();

        $_SESSION['usuario'] = $usuario;

        header("Location: ../../../Pagina principal/index.html");
    }
    else if($nr == 0){
        echo "No ingreso";
    }
?>