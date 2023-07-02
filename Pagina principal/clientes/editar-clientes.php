<?php
    include '../../php/conection.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar clientes</title>

    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_formulario-cliente.css">
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_error-page.css">

    <script src="https://kit.fontawesome.com/f8571caff0.js" crossorigin="anonymous"></script>
    <script src="../../js/js_pagina-principal/mostrarError.js"></script>
</head>
<body>
    <!--Mensaje de error-->
    <div class="error-container" id="error-container">
        <div class="error-container__icon-container">
            <h1>¡Ocurrió un error!</h1>
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <div class="error-container__info">
            <h3 id="solution">
                Ocurrió un error al momento de recabar la información del cliente para editarlo. <br>
                Por favor, regrese a la tabla y seleccione un cliente.
            </h3>
            <h3 class="error-container__info-error-code" id="CodigoError">Ocurrió un error desconocido</h3>
        </div>

    </div>

    <header class="header-container">
        <h2>Clientes</h2>

        <div class="back">
            <a href="../pagina-principal.php">Regresar</a>
        </div>
    </header>

    <?php
        if (isset($_POST["numero"])) {
            // Si existen las variables. Puede proceder.
            $NumeroCliente = $_POST["numero"];
            $IdCliente = $_POST["idCliente".$NumeroCliente];
            $query = "SELECT * FROM cliente WHERE id = '$IdCliente'";
            $result = mysqli_query($conection, $query);
            ?>
            <section class="client-form-container" id="client-form-container">
                <h1 class="client-form-container__title">
                    Editar cliente
                </h1>
            <?php

            while($mostrar = mysqli_fetch_assoc($result)) {
            ?>
            <form action="../../php/php_pagina-principal/guardarCambios.php" enctype="multipart/form-data" method="post" id="formCliente">
                    <!--ID, NOMBRE COMPLETO-->
                    <div class="client-form-container__row">
                        <div class="client-form-container__row__group short">
                            <div class="client-form-container__row__group__title">
                                ID del cliente:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="idCliente" id="idCliente" placeholder="Ej.: 1, 28..." maxlength="5" readonly value="<?php echo $IdCliente;?>">
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message">
                                        Campo no editable
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--NOMBRE COMPLETO-->
                        <div class="client-form-container__row__group long">
                            <div class="client-form-container__row__group__title">
                                Nombre completo:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="nombreDePila" id="nombreDePila" required placeholder="Ej.: Juan, Miguel Angel..." maxlength="40" value="<?php echo $mostrar["nombre_de_pila"]?>">
                                    <label for="nombreDePila">
                                        Nombre de pila
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-nombreDePila">
                                        Campo obligatorio
                                    </p>
                                </div>
            
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="apellidoPaterno" id="apellidoPaterno" required placeholder="Ej.: Perez, Lopez..." maxlength="25" value="<?php echo $mostrar["apellido_paterno"]?>">
                                    <label for="apellidoPaterno">
                                        Apellido paterno
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-apellidoPaterno">
                                        Campo obligatorio
                                    </p>
                                </div>
            
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="apellidoMaterno" id="apellidoMaterno" placeholder="Ej.: Garcia, Castro..." maxlength="25" value="<?php echo $mostrar["apellido_materno"]?>">
                                    <label for="apellidoMaterno">
                                        Apellido materno
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message optional message-apellidoMaterno">
                                        Campo opcional
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--FECHA DE NACIMIENTO, TELEFONO-->
                    <div class="client-form-container__row">
                        <!--FECHA DE NACIMIENTO-->
                        <div class="client-form-container__row__group short">
                            <div class="client-form-container__row__group__title">
                                Fecha de nacimiento:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" required min="1900-01-01" max="2100-01-01" placeholder="Seleccione una fecha" value="<?php echo $mostrar["fecha_de_nacimiento"]?>">
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-fechaNacimiento">
                                        Campo obligatorio
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--TELEFONO-->
                        <div class="client-form-container__row__group long">
                            <div class="client-form-container__row__group__title">
                                Telefono:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control number">
                                    <input type="text" name="telefonoParticular" id="telefonoParticular" placeholder="Ej.: 8677123456" maxlength="12" value="<?php echo $mostrar["telefono_particular"]?>">
                                    <label for="telefonoParticular">
                                        Particular
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message optional message-telefonoParticular">
                                        Campo opcional
                                    </p>
                                </div>
            
                                <div class="client-form-container__row__group__controls__control number">
                                    <input type="text" name="telefonoCelular" id="telefonoCelular" required placeholder="Ej.: 8673769156" maxlength="12" value="<?php echo $mostrar["telefono_celular"]?>">
                                    <label for="telefonoCelular">
                                        Celular
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-telefonoCelular">
                                        Campo obligatorio
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CORREO ELECTRONICO, ESTADO CIVIL-->
                    <div class="client-form-container__row">
                        <!--CORREO ELECTRONICO-->
                        <div class="client-form-container__row__group long">
                            <div class="client-form-container__row__group__title">
                                Correo electronico:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="email" name="correoElectronico" id="correoElectronico" required placeholder="Ej.: user@mail.com..." maxlength="60" value="<?php echo $mostrar["correo_electronico"]?>">
                                    <label for="correoElectronico">
                                        Correo
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-correoElectronico">
                                        Campo obligatorio
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--ESTADO CIVIL-->
                        <div class="client-form-container__row__group">
                            <div class="client-form-container__row__group__title">
                                Estado civil:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control">
                                    <div class="client-form-container__row__group__controls__control__dropdown">
                                        
                                        <?php  $opciones = array("Soltero", "Casado", "Divorciado", "Separación en proceso", "Viudo", "Concubinato"); ?>

                                        <select name="estadoCivil" id="estadoCivil">
                                            <?php
                                                foreach ($opciones as $opcion) {
                                                    if ($opcion == $mostrar["estado_civil"]) {
                                                        // Si la opción coincide con el rol del usuario, se selecciona
                                                        echo "<option value=\"$opcion\" selected>$opcion</option>";
                                                    } else {
                                                        echo "<option value=\"$opcion\">$opcion</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <p class="client-form-container__row__group__controls__control__message message-estadoCivil">
                                            Campo obligatorio
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--LUGAR DE NACIMIENTO-->
                    <div class="client-form-container__row">
                        <div class="client-form-container__row__group">
                            <div class="client-form-container__row__group__title">
                                Lugar de nacimiento:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="codigoPostalNacimiento" id="codigoPostalNacimiento" required placeholder="Ej.: 88210" maxlength="5" value="<?php echo $mostrar["codigo_postal_nacimiento"]?>">
                                    <label for="codigoPostalNacimiento">
                                        Codigo postal
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-codigoPostalNacimiento">
                                        Campo obligatorio
                                    </p>
                                </div>
                                
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="municipioNacimiento" id="municipioNacimiento" required placeholder="Ej.: Nuevo Laredo" maxlength="40" value="<?php echo $mostrar["municipio_nacimiento"]?>">
                                    <label for="municipioNacimiento">
                                        Municipio
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-municipioNacimiento">
                                        Campo obligatorio
                                    </p>
                                </div>
                                
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="estadoNacimiento" id="estadoNacimiento" required placeholder="Ej.: Tamaulipas" maxlength="40" value="<?php echo $mostrar["estado_nacimiento"]?>">
                                    <label for="estadoNacimiento">
                                        Estado
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-estadoNacimiento">
                                        Campo obligatorio
                                    </p>
                                </div>
                                
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="paisNacimiento" id="paisNacimiento" required placeholder="Ej.: Mexico" maxlength="40" value="<?php echo $mostrar["pais_nacimiento"]?>">
                                    <label for="paisNacimiento">
                                        Pais
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-paisNacimiento">
                                        Campo obligatorio
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--DOMICILIO-->
                    <div class="client-form-container__row">
                        <div class="client-form-container__row__group">
                            <div class="client-form-container__row__group__title">
                                Domicilio:
                            </div>

                            <div class="client-form-container__row__group__controls">
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="calleDomicilio" id="calleDomicilio" required placeholder="Ej.: Av. Reforma" maxlength="40" value="<?php echo $mostrar["calle_domicilio"]?>">
                                    <label for="calleDomicilio">
                                        Calle:
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-calleDomicilio">
                                        Campo obligatorio
                                    </p>
                                </div>
                                
                                <div class="client-form-container__row__group__controls__control number">
                                    <input type="text" name="numeroInteriorDomicilio" id="numeroInteriorDomicilio" placeholder="Ej.: 25-A" maxlength="4" value="<?php echo $mostrar["numero_interior_domicilio"]?>">
                                    <label for="numeroInteriorDomicilio">
                                        Num. int.
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message optional message-numeroInteriorDomicilio">
                                        Campo opcional
                                    </p>
                                </div>
                                
                                <div class="client-form-container__row__group__controls__control number">
                                    <input type="text" name="numeroExteriorDomicilio" id="numeroExteriorDomicilio" required placeholder="Ej.: Tamaulipas" maxlength="4" value="<?php echo $mostrar["numero_exterior_domicilio"]?>">
                                    <label for="numeroExteriorDomicilio">
                                        Num. ext.
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-numeroExteriorDomicilio">
                                        Campo obligatorio
                                    </p>
                                </div>
                                
                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="coloniaDomicilio" id="coloniaDomicilio" required placeholder="Ej.: Mexico" maxlength="40" value="<?php echo $mostrar["colonia_domicilio"]?>">
                                    <label for="coloniaDomicilio">
                                        Colonia
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-coloniaDomicilio">
                                        Campo obligatorio
                                    </p>
                                </div>

                                <div class="client-form-container__row__group__controls__control">
                                    <input type="text" name="codigoPostalDomicilio" id="codigoPostalDomicilio" required placeholder="Ej.: 88210" maxlength="5" value="<?php echo $mostrar["codigo_postal_domicilio"]?>">
                                    <label for="codigoPostalDomicilio">
                                        Codigo postal
                                    </label>
                                    <div class="client-form-container__row__group__controls__control__underline"></div>
                                    <p class="client-form-container__row__group__controls__control__message message-codigoPostalDomicilio">
                                        Campo obligatorio
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--MENSAJE DE ENVIO DE FORM-->
                    <div class="client-form-container__form-message">
                        <p>
                            Los datos se registraron exitosamente.
                        </p>
                    </div>

                    <!--BOTONES DEL FORMULARIO-->
                    <div class="client-form-container__cta">
                        <input type="submit" value="Guardar" name="guardarCambios" id="guardarCambios">
                        <label for="guardarCambios">
                            <i class="fas fa-bookmark"></i> Guardar cambios
                        </label>
                        <input type="button" value="Cancelar" name="CancelarClienteEditar" id="CancelarClienteEditar">
                        <label for="CancelarClienteEditar">
                            <i class="fas fa-times"></i> Cancelar
                        </label>
                    </div>
            </form>
            <?php
            }
        }
        else {
            // No existen las variables. Se muestra el mensaje de error.
            echo '
            <script>
                MostrarError("003")
            </script>';
        }
    ?>
</section>
    <script src="../../js/js_pagina-principal/main.js"></script>
    <script src="../../js/js_pagina-principal/validarCliente.js"></script>

    <script>
        document.getElementById('CancelarClienteEditar').addEventListener('click', () => {
            window.history.back()
        })
    </script>
</body>
</html>