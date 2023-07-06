<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaría 104 | Validar usuario</title>

    <link rel="stylesheet" href="../../css/style-reset.css">
    <link rel="stylesheet" href="../../css/style-error-page.css">

    <script src="https://kit.fontawesome.com/f8571caff0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    try
    {
        include '../conection.php';

        $nombre = $_POST["txtNombre"];
        $password = $_POST["txtContrasenia"];

        $query = mysqli_query($conection, "SELECT*FROM usuario WHERE nombre = '".$nombre."' and contrasenia = '".$password."'");
        
        $nr = mysqli_num_rows($query);

        if($nr == 1)
        {    
            session_start();

            $_SESSION['usuario'] = $nombre;

            header("Location: ../../Pagina principal/pagina-principal.php");
        }
        else
        {
    ?>
            <div class="error-container">
                <div class="error-container__content-container">
                    <h1 class="error-container__h1">Usuario o contraseña incorrectos</h1>
                    <i class="fa-solid fa-user-large-slash error-container__icon"></i>
                    <a href="../../index.html" class="error-container__back"><i class="fa-solid fa-rotate-left"></i> Volver a intentar</a>
                </div>
            </div>
    <?php
            die();
        }
    }
    catch(Exception $e)
    {
    ?>
        <div class="error-container">
            <div class="error-container__content-container">
                <h1 class="error-container__h1">¡Ha ocurrido un error inesperado!</h1>
                <i class="fa-solid fa-plug-circle-xmark error-container__icon"></i>
                <h1 class="error-container__h1"><?php echo $e->getMessage();?></h1>
            </div>
        </div>
    <?php
    }
    ?>
</body>
</html>