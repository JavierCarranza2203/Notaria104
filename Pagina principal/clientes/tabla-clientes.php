<?php

    include '../../php/conection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaría 104 | Tabla de clientes</title>

    <link rel="stylesheet" href="../../css/style-reset.css">
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_tabla-clientes.css">
    <link rel="stylesheet" href="../../css/style-error-page.css">
    
    <script src="https://kit.fontawesome.com/f8571caff0.js" crossorigin="anonymous"></script>

    <script src="../../js/js_pagina-principal/dataTable_buscarCliente.js"></script>
</head>
<body>
    <?php
        session_start();
        $usuario = $_SESSION['usuario'];

        if($usuario = null || $usuario == '')
        {
    ?>
            <div class=error-container>
                <div class="error-container__content-container">
                <h1 class="error-container__h1">Usted no tiene autorización, por favor inicie sesión</h1>
                <i class="fa-solid fa-triangle-exclamation error-container__icon"></i>
                <a href="../../index.html" class="error-container__back"><i class="fa-solid fa-rotate-left"></i> Iniciar sesión</a>
                </div>
            </div>
    <?php  
            die();
        }
    ?>
    <header class="header">
        <h1 class="header__h1"><i class="fa-solid fa-folder-open"></i> H.A.N.</h1>
        <nav class="header__navbar" id="menu-container">
            <a href="../pagina-principal.php" class="header__link"><i class="fa-solid fa-house-chimney"></i> Página principal</a>
            <a href="agregar-cliente.php" class="header__link"><i class="fa-solid fa-user-plus"></i> Registrar cliente</a>
            <a class="header__link header__link--active"><i class="fa-solid fa-user-group"></i> Tabla de clientes</a>
        </nav>

        <a href="../../index.html" class="header__link header__link--close-sesion" id="btnCloseSession"><i class="fa-solid fa-user-lock"></i> Cerrar sesión</a>
    </header>

    <section class="section">
        <div class="section__header">
            <h2 class="section__h2">Tabla de clientes guardados</h2>
            <h3 class="section__h3"></h3>
        </div>

        <div class="section__table-container">
            <table class="section__table" id="TablaClientes">
                <thead class="section__table-header">
                    <th class="section__table-header-cell">Nombre de pila</th>
                    <th class="section__table-header-cell">Apellido paterno</th>
                    <th class="section__table-header-cell">Apellido materno</th>
                    <th class="section__table-header-cell">Teléfono celular</th>
                    <th class="section__table-header-cell">Mas datos</th>
                </thead>
                <?php
                    $sql = "SELECT * from cliente";
                    $result = mysqli_query($conection, $sql);

                    while($mostrar = mysqli_fetch_array($result))
                    {
                ?>             
                        <tr class="section__table-row">
                            <td class="section__table-cell"><?php echo $mostrar['nombre'] ?></td>
                            <td class="section__table-cell"><?php echo $mostrar['apellido_paterno'] ?></td>
                            <td class="section__table-cell"><?php 
                                if($mostrar['apellido_materno'] != null)
                                {
                                    echo $mostrar['apellido_materno'];
                                }
                                else
                                {
                                    echo "N/A";
                                }
                            ?></td>
                            <td class="section__table-cell"><?php echo $mostrar['telefono_celular'] ?></td>
                            <td class="section__table-cell"><button class="section__table-button">Ver todos los datos</button><input type="hidden" value="<?php echo $mostrar['id']?>"></td>
                        </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </section>

    <section class="modal-container" id="modal">
        <div class="modal-container__modal">
            <i class="fa-solid fa-circle-xmark modal-container__icon" id="btnCloseModal"></i>
            <ul class="modal-container__ul">
                <li><b>Folio: </b><span id="folioCliente"></span></li>
                <li><b>Nombre: </b><span id="nombreCliente"></span></li>
                <li><b>Apellido paterno: </b><span id="apellidoPaternoCliente"></span></li>
                <li><b>Apellido materno: </b><span id="apellidoMaternoCliente"></span></li>
                <li><b>Correo: </b><span id="correoCliente"></span></li>
                <li><b>Teléfono particular: </b><span id="telefonoParticularCliente"></span></li>
                <li><b>Teléfono celular: </b><span id="telefonoCelularCliente"></span></li>
                <li><b>Calle: </b><span id="calleCliente"></span></li>
                <li><b>Número interior: </b><span id="numIntCliente"></span></li>
                <li><b>Número exterior: </b><span id="numExtCliente"></span></li>
                <li><b>Colonia: </b><span id="coloniaCliente"></span></li>
                <li><b>Código postal: </b><span id="codigoPostalCliente"></span></li>
                <li><b>RFC: </b><span id="rfcCliente"></span></li>
            </ul>
            <div class="modal-container__button-container">
            <button class="modal-container__button"><i class="fa-solid fa-user-pen"></i> Editar datos</button>
            <button class="modal-container__button modal-container__button--delete"><i class="fa-solid fa-user-xmark"></i> Borrar cliente</button>
            </div>
        </div>
    </section>

    <script src="../../js/cerrar-sesion_v2.js"></script>
    <script src="../../js/js_pagina-principal/app_tabla-clientes.js"></script>
    <script>
        $(document).ready(function() {
            let table = $('#TablaClientes').DataTable( { ordering:false } );
            let linkAdded = false;
            table.on('draw.dt', function() {
                let info = table.page.info();
                if (info.recordsDisplay === 0 && !linkAdded) {
                    // No se encontraron resultados y el enlace no se ha agregado previamente
                    let message = '<a href="agregar-cliente.php" class="section__add-client">¿Desea agregar al cliente?</a>';
                    $('#TablaClientes').parent().append(message);
                    linkAdded = true;
                } else if (info.recordsDisplay > 0 && linkAdded) {
                    // Se encontraron resultados y el enlace está presente, eliminarlo
                    $('#TablaClientes').parent().find('a').remove();
                    linkAdded = false;
                }
            });
        });
    </script>
</body>
</html>