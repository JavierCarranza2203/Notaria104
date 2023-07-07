<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaría 104 | Registrar Cliente</title>

    <link rel="stylesheet" href="../../css/style-reset.css">
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_formulario-cliente.css">
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_message-box.css">
    <link rel="stylesheet" href="../../css/style-error-page.css">

    <script src="https://kit.fontawesome.com/f8571caff0.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        session_start();
        $usuario = $_SESSION['usuario'];

        if($usuario = null || $usuario == '')
        {
    ?>
            <div class="error-container">
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
            <a class="header__link header__link--active"><i class="fa-solid fa-user-plus"></i> Registrar cliente</a>
            <a href="tabla-clientes.php" class="header__link"><i class="fa-solid fa-user-group"></i> Tabla de clientes</a>
        </nav>

        <a href="../../index.html" class="header__link header__link--close-sesion" id="btnCloseSession"><i class="fa-solid fa-user-lock"></i> Cerrar sesión</a>
    </header>

    <section class="section" id="contenedorMisDocumentos">
        <div class="section__header">
            <h2 class="section__h2">Ingrese los datos del cliente</h2>
            <h3 class="section__h3">Nota: Los campos marcados con * son obligatorios</h3>
        </div>

        <form action="../../php/php_pagina-principal/formCliente.php" class="section__form" id="frmNuevoCliente" method="POST">
            <p class="form__p"><span></span>Datos de identificación<span></span></p>

            <!--==== Campo para el nombre ====-->
            <div class="form__field">
                <label>
                    <span>Nombre de pila: *</span>
                    <input type="text" name="txtNombre" autocomplete="off" id="txtNombre" required maxlength="35">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para el apellido paterno ====-->
            <div class="form__field">
                <label>
                    <span>Apellido paterno: *</span>
                    <input type="text" name="txtApellidoPaterno" autocomplete="off" id="txtApellidoPaterno" required maxlength="35">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para el apellido materno ====-->
            <div class="form__field">
                <label>
                    <span>Apellido materno:</span>
                    <input type="text" name="txtApellidoMaterno" autocomplete="off" id="txtApellidoMaterno"maxlength="35">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>

            <p class="form__p"><span></span>Datos de contacto<span></span></p>

            <!--==== Campo para el telefono particular ====-->
            <div class="form__field">
                <label>
                    <span>Teléfono particular:</span>
                    <input type="text" name="txtTelefonoParticular" autocomplete="off" id="txtTelefonoParticular"maxlength="20">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para el telefono celular ====-->
            <div class="form__field">
                <label>
                    <span>Teléfono celular: *</span>
                    <input type="text" name="txtTelefonoCelular" autocomplete="off" id="txtTelefonoCelular"maxlength="20">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para el correo electronico ====-->
            <div class="form__field">
                <label>
                    <span>Correo electrónico:</span>
                    <input type="email" name="txtCorreoElectronico" autocomplete="off" id="txtCorreoElectronico">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>

            <p class="form__p"><span></span>Datos del domicilio<span></span></p>

            <!--==== Campo para la calle de domicilio ====-->
            <div class="form__field">
                <label>
                    <span>Calle: *</span>
                    <input type="text" name="txtCalle" autocomplete="off" id="txtCalle" required maxlength="30">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para el num interior ====-->
            <div class="form__field">
                <label>
                    <span>Número interior:</span>
                    <input type="text" name="txtNumInterior" autocomplete="off" id="txtNumInterior" maxlength="8">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para el num exterior ====-->
            <div class="form__field">
                <label>
                    <span>Número exterior: *</span>
                    <input type="text" name="txtNumExterior" autocomplete="off" id="txtNumExterior" maxlength="8">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para la colonia ====-->
            <div class="form__field">
                <label>
                    <span>Colonia: *</span>
                    <input type="text" name="txtColonia" autocomplete="off" id="txtColonia" required maxlength="80">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>
            <!--==== Campo para la colonia ====-->
            <div class="form__field">
                <label>
                    <span>Código postal: *</span>
                    <input type="text" name="txtCodigoPostal" autocomplete="off" id="txtCodigoPostal" required maxlength="6">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>

            <p class="form__p"><span></span>Datos fiscales<span></span></p>

            <!--==== Campo para el rfc ====-->
            <div class="form__field">
                <label>
                    <span>RFC: *</span>
                    <input type="text" name="txtRFC" autocomplete="off" id="txtRFC" required maxlength="20">
                    <i class="fa-regular form__icon"></i>
                </label>
            </div>

            <button class="form__button" id="btnGuardar">Guardar cliente</button>
        </form>
    </section>

    <div class="message-box" id="messageBox">
        <div class="message-box__container">
            <i class="fa-solid fa-circle-xmark message-box__i--close" id="messageBoxIconClose"></i>
            <i class="fa-solid message-box__i" id="messageBoxIcon"></i>
            <h2 class="message-box__h2" id="messageBoxMessage"></h2>
        </div>
    </div>

    <script src="../../js/js_login/login-main.js"></script>
    <script src="../../js/js_pagina-principal/validarCliente.js"></script>
    <script src="../../js/cerrar-sesion_v2.js"></script>
</body>
</html>