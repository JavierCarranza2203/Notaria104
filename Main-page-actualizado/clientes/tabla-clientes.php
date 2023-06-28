<?php

    include '../PHP/conection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de clientes</title>

    <!--<link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>-->
    <link rel="stylesheet" href="../CSS/normalize.css">
    <link rel="stylesheet" href="../CSS/style_datatable.css">
    <link rel="stylesheet" href="../CSS/style_dtable.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f8571caff0.js" crossorigin="anonymous"></script>

    <script src="../JS/buscarCliente.js"></script>
</head>
<body>
    <header class="header-container">
        <h2>Clientes</h2>

        <div class="back">
            <a href="../index.html">Regresar</a>
        </div>
    </header>

    <table class="display" id="TablaClientes">
        <thead>
            <tr>
                <th>Editar</th>
                <th>Borrar</th>
                <th>Id</th>
                <th>Nombre de pila</th>
                <th>Apellido paterno</th>
                <th>Apellido materno</th>
                <th>Fecha de nacimiento</th>
                <th>Telefono particular</th>
                <th>Telofono celular</th>
                <th>Correo electronico</th>
                <th>Estado civil</th>
                <th>Codigo postal de nacimiento</th>
                <th>Municipio de nacimiento</th>
                <th>Estado de nacimiento</th>
                <th>Pais de nacimiento</th>
                <th>Domicilio (Calle)</th>
                <th>Numero interior</th>
                <th>Numero exterior</th>
                <th>Domicilio (Colonia)</th>
                <th>Codigo postal del domicilio</th>
            </tr>
        </thead>

        <?php
            $sql = "SELECT * from cliente";
            $result = mysqli_query($conection, $sql);

            while($mostrar = mysqli_fetch_array($result))
            {
        ?>             
                <tr>
                    <td>
                        <!--BOTON PARA EDITAR CLIENTE-->
                        <label for="idCliente<?php echo $mostrar['id']; ?>">
                            <i class="fa-solid fa-pen"></i>
                        </label>
                        <form action="editar-clientes.php" method="post">
                            <input type="submit" name="idCliente<?php echo $mostrar['id']; ?>" id="idCliente<?php echo $mostrar['id']; ?>" hidden value="<?php echo $mostrar['id']; ?>">
                            <input type="hidden" name="numero" id="numero" value="<?php echo $mostrar['id']; ?>">
                        </form>
                    </td>
                    <td>
                        <!--BOTON PARA ELIMINAR CLIENTE-->
                        <label for="borrarIdCliente<?php echo $mostrar['id']; ?>">
                        <i class="fas fa-times-circle"></i>
                        </label>
                        <form action="PHP/borrar-clientes.php" method="post" id="formBorrarCliente<?php echo $mostrar['id']; ?>">
                            <input type="button" name="borrarIdCliente<?php echo $mostrar['id']; ?>" id="borrarIdCliente<?php echo $mostrar['id']; ?>" hidden value="<?php echo $mostrar['id']; ?>" class="btnBorrarCliente">
                            <input type="hidden" name="numero" id="numero" value="<?php echo $mostrar['id']; ?>">
                        </form>
                    </td>
                    <td><?php echo $mostrar['id'] ?></td>
                    <td><?php echo $mostrar['nombre_de_pila'] ?></td>
                    <td><?php echo $mostrar['apellido_paterno'] ?></td>
                    <td><?php 
                        if($mostrar['apellido_materno'] != null)
                        {
                            echo $mostrar['apellido_materno'];
                        }
                        else
                        {
                            echo "N/A";
                        }
                    ?></td>
                    <td><?php echo $mostrar['fecha_de_nacimiento'] ?></td>
                    <td><?php 
                        if($mostrar['telefono_particular'] != null)
                        {
                            echo $mostrar['telefono_particular'];
                        }
                        else
                        {
                            echo "N/A";
                        }
                    ?></td>
                    <td><?php echo $mostrar['telefono_celular'] ?></td>
                    <td><?php echo $mostrar['correo_electronico'] ?></td>
                    <td><?php echo $mostrar['estado_civil'] ?></td>
                    <td><?php echo $mostrar['codigo_postal_nacimiento'] ?></td>
                    <td><?php echo $mostrar['municipio_nacimiento'] ?></td>
                    <td><?php echo $mostrar['estado_nacimiento'] ?></td>
                    <td><?php echo $mostrar['pais_nacimiento'] ?></td>
                    <td><?php echo $mostrar['calle_domicilio'] ?></td>
                    <td><?php 
                        if($mostrar['numero_interior_domicilio'] != null)
                        {
                            echo $mostrar['numero_interior_domicilio']; 
                        }
                        else{
                            echo "N/A";
                        }
                    ?></td>
                    <td><?php echo $mostrar['numero_exterior_domicilio'] ?></td>
                    <td><?php echo $mostrar['colonia_domicilio'] ?></td>
                    <td><?php echo $mostrar['codigo_postal_domicilio'] ?></td>
                </tr>
        <?php
            }
        ?>
    </table>

    <script>
        $(document).ready(function() {
            var table = $('#TablaClientes').DataTable();
            var linkAdded = false;

            table.on('draw.dt', function() {
                var info = table.page.info();
                if (info.recordsDisplay === 0 && !linkAdded) {
                    // No se encontraron resultados y el enlace no se ha agregado previamente
                    var message = '<a href="agregar-cliente.html" id="btnAgregarCliente">¿Desea agregar al cliente?</a>';
                $('#TablaClientes').parent().append(message);
                linkAdded = true;
                } else if (info.recordsDisplay > 0 && linkAdded) {
                    // Se encontraron resultados y el enlace está presente, eliminarlo
                    $('#TablaClientes').parent().find('a').remove();
                    linkAdded = false;
                }
            });
        });
        // Obtiene todos los botones de borrar para identificarlos
        const arrBtnEliminarCliente = document.querySelectorAll('.btnBorrarCliente')
        
        arrBtnEliminarCliente.forEach(btn => {
            btn.addEventListener('click', (e) => {
                // Envia una alerta de confirmacion
                let confirmarEliminacion = confirm(`¿Realmente desea eliminar el cliente con el ID ${e.target.value}?`)
                if (confirmarEliminacion) {
                    alert(`Se eliminara el cliente con el ID ${e.target.value}`)
                    // Obtiene el formulario del cliente especificado para borrarlo
                    const formBorrarCliente = document.getElementById(`formBorrarCliente${e.target.value}`)
                    // Envia el formulario con los datos del cliente
                    formBorrarCliente.submit()
                }
                else {
                    alert('No se elimino ningun cliente.')
                }
            })
        });
        
    </script>
</body>
</html>