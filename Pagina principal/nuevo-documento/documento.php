<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaría 104 | Nuevo documento</title>

    <link rel="stylesheet" href="../../css/style-reset.css">
    <link rel="stylesheet" href="../../css/style-error-page.css">
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_nuevo-documento.css">

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
    <!-- RECIBE EL TIPO DE TRAMITE QUE SE ESTA REALIZANDO -->
    <?php
        $tipoTramite = strtolower($_GET['documento']);
    ?>

    <header class="header">
        <h1 class="header__h1"><i class="fa-solid fa-folder-open"></i> H.A.N.</h1>
        <nav class="header__navbar" id="menu-container">
            <a href="../pagina-principal.php" class="header__link"><i class="fa-solid fa-house-chimney"></i> Página principal</a>
            <a class="header__link header__link--active"><i class="fa-solid fa-file-circle-plus"></i> Nuevo documento</a>
            <a href="../clientes/agregar-cliente.php" class="header__link"><i class="fa-solid fa-user-plus"></i> Registrar cliente</a>
            <a href="../clientes/tabla-clientes.php" class="header__link"><i class="fa-solid fa-user-group"></i> Tabla de clientes</a>
        </nav>

        <a href="../../index.html" class="header__link header__link--close-sesion" id="btnCloseSession"><i class="fa-solid fa-user-lock"></i> Cerrar sesión</a>
    </header>
    
    <section class="section">
        <div class="section__header">
            <h2 class="section__h2" id="NombreDocumento">Ingrese los datos del cliente</h2>
            <h3 class="section__h3">Nota: Los campos marcados con * son obligatorios</h3>
        </div>

        <form action="../../php/php_pagina-principal/guardar-archivos.php" class="tramites-container__item-form-container-form" method="post" enctype="multipart/form-data">
            <input type="hidden" name="txtDocumento" id="txtDocumento" value="<?php echo $tipoTramite ?>">
            <input type="hidden" name="txtId" id="txtId" value="0">
            <div class="form__data">
                <p class="field">
                    <label for="txtNombre">Cliente *:</label>
                    <input type="text" name="txtNombre" id="txtNombre" required placeholder="Nombre del cliente" autocomplete="off">
                </p>
                <ul class="lista" id="lista"></ul>
                <p class="field">
                    <label for="txtVolumen">Volumen *:</label>
                    <input type="text" name="txtVolumen" id="txtVolumen" required placeholder="Volumen" autocomplete="off">
                </p>

                <p class="field">
                    <label for="txtInstrumento">Instrumento *:</label>
                    <input type="text" name="txtInstrumento" id="txtInstrumento" required placeholder="Instrumento" autocomplete="off">
                </p>

                <p class="field">
                    <label for="txtFolio">Folio *:</label>
                    <input type="text" name="txtFolio" id="txtFolio" required placeholder="Num. folio" autocomplete="off">
                </p>
            </div>
            <!--Escritura o antecedente-->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="Escritura">
                <div class="check">
                    <input type="checkbox" name="escritura" id="escritura" >
                    <label for="escritura">
                        Escritura o antecedente
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file">
                    <span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="escrituraArchivo" id="escrituraArchivo"  class="fileUpload" >
                    <label for="escrituraArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>Subir archivo
                    </label>
                </div>
            </div>
            <!--Certificado con reserva de prioridad-->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="CertificadoConReservaDePrioridad">
                <div class="check">
                    <input type="checkbox" name="certificado" id="certificado" >
                    <label for="certificado">
                        Certificado con reserva de prioridad
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file">
                    <span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="certificadoArchivo" id="certificadoArchivo" class="fileUpload" >
                    <label for="certificadoArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!--Predial-->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="Predial">
                    <div class="check">
                        <input type="checkbox" name="predial" id="predial" >
                        <label for="predial">
                            Predial
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="predialArchivo" id="predialArchivo" class="fileUpload" >
                        <label for="predialArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
            <!--INE-->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="INE">
                <div class="check">
                    <input type="checkbox" name="ine" id="ine" >
                    <label for="ine">
                        INE
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file">
                    <span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ineArchivo" id="ineArchivo" class="fileUpload" >
                    <label for="ineArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!--CURP-->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="CURP">
                <div class="check">
                    <input type="checkbox" name="curp" id="curp" >
                    <label for="curp">
                        CURP
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file">
                    <span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="curpArchivo" id="curpArchivo" class="fileUpload" >
                    <label for="curpArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!--RFC-->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="RFC">
                <div class="check">
                    <input type="checkbox" name="rfc" id="rfc" >
                    <label for="rfc">
                        RFC
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file">
                    <span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="rfcArchivo" id="rfcArchivo" class="fileUpload" >
                    <label for="rfcArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Acta de nacimiento -->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="actanac">
                <div class="check">
                    <input type="checkbox" name="actanac" id="actanac" >
                    <label for="actanac">
                        Acta de nacimiento
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file">
                    <span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="actanacArchivo" id="actanacArchivo" class="fileUpload" >
                    <label for="actanacArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Acta de matrimonio (No siempre es opcional)-->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="ActaMatrimonio">
                <div class="check">
                    <input type="checkbox" name="ActaMatrimonio" id="ActaMatrimonio">
                    <label for="ActaMatrimonio">
                        Acta de matrimonio
                        <span class="asterisk" id="spanActaMat">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ActaMatrimonioArchivo" id="ActaMatrimonioArchivo" class="fileUpload">
                    <label for="ActaMatrimonioArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Comprobante de domicilio -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="comprobanteDom">
                <div class="check">
                    <input type="checkbox" name="comprobanteDom" id="comprobanteDom">
                    <label for="comprobanteDom">
                        Comprobante de domicilio
                        <span class="asterisk" id="spanActaMat">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="comprobanteDomArchivo" id="comprobanteDomArchivo" class="fileUpload">
                    <label for="comprobanteDomArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Recibo de agua -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="reciboAgua">
                <div class="check">
                    <input type="checkbox" name="reciboAgua" id="reciboAgua">
                    <label for="reciboAgua">
                        Recibo de agua
                        <span class="asterisk" id="spanActaMat">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="reciboAguaArchivo" id="reciboAguaArchivo" class="fileUpload">
                    <label for="reciboAguaArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Hoja de generales -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="hojaGenerales">
                <div class="check">
                    <input type="checkbox" name="hojaGenerales" id="hojaGenerales">
                    <label for="hojaGenerales">
                        Hoja de generales
                        <span class="asterisk" id="spanActaMat">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="hojaGeneralesArchivo" id="hojaGeneralesArchivo" class="fileUpload">
                    <label for="hojaGeneralesArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Identificación de inmueble -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="IdentificacionInmueble">
                <div class="check">
                    <input type="checkbox" name="identificacionInmueble" id="identificacionInmueble" >
                    <label for="identificacionInmueble">
                        Identificación de inmueble
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="identificacionInmuebleArchivo" id="identificacionInmuebleArchivo" class="fileUpload" >
                    <label for="identificacionInmuebleArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Poder (Opcional) -->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="Poder">
                <div class="check">
                    <input type="checkbox" name="Poder" id="Poder">
                    <label for="Poder">
                        Poder
                    </label>
                </div>
                <div class="file">
                    <span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="PoderArchivo" id="PoderArchivo" class="fileUpload">
                    <label for="PoderArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Personalidad de la empresa -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="PersonalidadEmpresa">
                <div class="check">
                    <input type="checkbox" name="PersonalidadEmpresa" id="PersonalidadEmpresa">
                    <label for="PersonalidadEmpresa">
                        Personalidad de la empresa
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="PersonalidadEmpresaArchivo" id="PersonalidadEmpresaArchivo" class="fileUpload" >
                    <label for="PersonalidadEmpresaArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Acta elaborada por la empresa (Asamblea)-->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="ActaElaboradaPorLaEmpresa">
                <div class="check">
                    <input type="checkbox" name="ActaEmpresa" id="ActaEmpresa">
                    <label for="ActaEmpresa">
                        Acta elaborada por la empresa
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ActaEmpresaArchivo" id="ActaEmpresaArchivo" class="fileUpload" >
                    <label for="ActaEmpresaArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Constancia expedida por el juzgado -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="ConstanciaJuzgado">
                <div class="check">
                    <input type="checkbox" name="ConstanciaJuzgado" id="ConstanciaJuzgado">
                    <label for="ConstanciaJuzgado">
                        Constancia expedida por el juzgado
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ConstanciaJuzgadoArchivo" id="ConstanciaJuzgadoArchivo" class="fileUpload" >
                    <label for="ConstanciaJuzgadoArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Dictamen de subdivision -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="DictamenDeSubdivision">
                <div class="check">
                    <input type="checkbox" name="DictamenDeSubdivision" id="DictamenDeSubdivision">
                    <label for="DictamenDeSubdivision">
                        Dictamen de subdivisión
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="DictamenDeSubdivisionArchivo" id="DictamenDeSubdivisionArchivo" class="fileUpload" >
                    <label for="DictamenDeSubdivisionArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Plano -->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="Plano">
                <div class="check">
                    <input type="checkbox" name="Plano" id="Plano">
                    <label for="Plano">
                        Plano
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="PlanoArchivo" id="PlanoArchivo" class="fileUpload" >
                    <label for="PlanoArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Nombres de los hijos (Opcional) -->
            <div class="simple-check-field tramites-container__item-form-container-form-document" id="NombresHijos">
                <div class="check">
                    <input type="checkbox" name="NombresHijos" id="NombresHijos">
                    <label for="NombresHijos">
                        Nombres de los hijos
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="NombresHijosArchivo" id="NombresHijosArchivo" class="fileUpload">
                    <label for="NombresHijosArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Personalidad o poder (No siempre es opcional)-->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="PersonalidadOPoder">
                <div class="check">
                    <input type="checkbox" name="PersonalidadOPoder" id="PersonalidadOPoder">
                    <label for="PersonalidadOPoder">
                        Personalidad o poder
                        <span class="asterisk" id="spanPoder">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="PersonalidadOPoderArchivo" id="PersonalidadOPoderArchivo" class="fileUpload">
                    <label for="PersonalidadOPoderArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Titulo del vehiculo -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="TituloVehiculo">
                <div class="check">
                    <input type="checkbox" name="TituloVehiculo" id="TituloVehiculo">
                    <label for="TituloVehiculo">
                        Titulo del vehículo
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="TituloVehiculoArchivo" id="TituloVehiculoArchivo" class="fileUpload" >
                    <label for="TituloVehiculoArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Tarjeta de circulación -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="TarjetaCirculacion">
                <div class="check">
                    <input type="checkbox" name="TarjetaCirculacion" id="TarjetaCirculacion" class="fileUpload" >
                    <label for="TarjetaCirculacion">
                        Tarjeta de circulación
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="TarjetaCirculacionArchivo" id="TarjetaCirculacionArchivo" class="fileUpload">
                    <label for="TarjetaCirculacionArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Acta de defunción (Opcional)-->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="ActaDefuncion">
                <div class="check">
                    <input type="checkbox" name="ActaDefuncion" id="ActaDefuncion">
                    <label for="ActaDefuncion">
                        Acta de defunción
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ActaDefuncionArchivo" id="ActaDefuncionArchivo" class="fileUpload" >
                    <label for="PersonalidadOPoderArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Antecedentes de propiedades -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="AntecedentesPropiedades">
                <div class="check">
                    <input type="checkbox" name="AntecedentesPropiedades" id="AntecedentesPropiedades">
                    <label for="AntecedentesPropiedades">
                        Antecedentes de propiedades
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="AntecedentesPropiedadesArchivo" id="AntecedentesPropiedadesArchivo" class="fileUpload" >
                    <label for="AntecedentesPropiedadesArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Poderante -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="Poderante">
                <div class="check">
                    <input type="checkbox" name="Poderante" id="Poderante">
                    <label for="Poderante">
                        Poderante
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="PoderanteArchivo" id="PoderanteArchivo" class="fileUpload" >
                    <label for="PoderanteArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Apoderado -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="Apoderado">
                <div class="check">
                    <input type="checkbox" name="Apoderado" id="Apoderado">
                    <label for="Apoderado">
                        Apoderado
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ApoderadoArchivo" id="ApoderadoArchivo" class="fileUpload" >
                    <label for="ApoderadoArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Datos de la empresa -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="DatosEmpresa">
                <div class="check">
                    <input type="checkbox" name="DatosEmpresa" id="DatosEmpresa">
                    <label for="DatosEmpresa">
                        Datos de la empresa
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="DatosEmpresaArchivo" id="DatosEmpresaArchivo" class="fileUpload" >
                    <label for="DatosEmpresaArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Acta constitutiva de la empresa -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="ActaConstitutivaEmpresa">
                <div class="check">
                    <input type="checkbox" name="ActaConstitutivaEmpresa" id="ActaConstitutivaEmpresa">
                    <label for="ActaConstitutivaEmpresa">
                        Acta constitutiva de la empresa
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ActaConstitutivaEmpresaArchivo" id="ActaConstitutivaEmpresaArchivo" class="fileUpload" >
                    <label for="ActaConstitutivaEmpresaArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Poder del representante -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="PoderRepresentante">
                <div class="check">
                    <input type="checkbox" name="PoderRepresentante" id="PoderRepresentante">
                    <label for="PoderRepresentante">
                        Poder del representante
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="PoderRepresentanteArchivo" id="PoderRepresentanteArchivo" class="fileUpload" >
                    <label for="PoderRepresentanteArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Acta de nacimiento del menor -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="ActaNacimientoMenor">
                <div class="check">
                    <input type="checkbox" name="ActaNacimientoMenor" id="ActaNacimientoMenor">
                    <label for="ActaNacimientoMenor">
                        Acta de nacimiento del menor
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="ActaNacimientoMenorArchivo" id="ActaNacimientoMenorArchivo" class="fileUpload" >
                    <label for="ActaNacimientoMenorArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Datos generales -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="DatosGeneralesPadres">
                <div class="check">
                    <input type="checkbox" name="DatosGeneralesPadres" id="DatosGeneralesPadres">
                    <label for="DatosGeneralesPadres">
                        Datos generales de los padres (mínimo un padre)
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="DatosGeneralesPadresArchivo" id="DatosGeneralesPadresArchivo" class="fileUpload" >
                    <label for="DatosGeneralesPadresArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Domicilio donde van a vivir -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="DomicilioVivienda">
                <div class="check">
                    <input type="checkbox" name="DomicilioVivienda" id="DomicilioVivienda">
                    <label for="DomicilioVivienda">
                        Comprobante de domicilio donde van a vivir
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="DomicilioViviendaArchivo" id="DomicilioViviendaArchivo" class="fileUpload" >
                    <label for="DomicilioViviendaArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Persona a cargo -->
            <div class="simple-check-field tramites-container__item-form-container-form-document"
                id="NombrePersonaACargo">
                <div class="check">
                    <input type="checkbox" name="NombrePersonaACargo" id="NombrePersonaACargo">
                    <label for="NombrePersonaACargo">
                        Nombre de la persona a cargo
                        <span class="asterisk">*</span>
                    </label>
                </div>
                <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                    <input type="file" name="NombrePersonaACargoArchivo" id="NombrePersonaACargoArchivo" class="fileUpload" >
                    <label for="NombrePersonaACargoArchivo" class="archivo">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                    </label>
                </div>
            </div>
            <!-- Identificacion -->
            <div class="compound-check-field tramites-container__item-form-container-form-document"
                id="Identificacion">
                <div class="title">
                    <label for="Identificacion">
                        Identificación<span class="asterisk">*</span>:
                    </label>
                </div>
                <!-- Documento de identificacion #1 -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="documentoIdentificacion1" id="documentoIdentificacion1">
                        <label for="documentoIdentificacion1">
                            Documento de identificación número 1
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="documentoIdentificacion1Archivo" id="documentoIdentificacion1Archivo" class="fileUpload" >
                        <label for="documentoIdentificacion1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Documento de identificacion #2 -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="documentoIdentificacion2" id="documentoIdentificacion2" >
                        <label for="documentoIdentificacion2">
                            Documento de identificación número 2
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="documentoIdentificacion2Archivo" id="documentoIdentificacion2Archivo" class="fileUpload" >
                        <label for="documentoIdentificacion2Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Documento de identificacion #3 -->
            <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="documentoIdentificacion3" id="documentoIdentificacion3">
                        <label for="documentoIdentificacion3">
                            Documento de identificación número 3
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="documentoIdentificacion3Archivo" id="documentoIdentificacion3Archivo" class="fileUpload" >
                        <label for="documentoIdentificacion3Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
            </div>
            <!--Comparecientes-->
            <div class="compound-check-field tramites-container__item-form-container-form-document"
                id="Comparecientes">
                <div class="title">
                    <label for="comparecientes">
                        Comparecientes:
                    </label>
                </div>
                <!-- INE -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="ineComparecientes" id="ineComparecientes" >
                        <label for="ineComparecientes">
                            INE
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="ineComparecientesArchivo" id="ineComparecientesArchivo" class="fileUpload" >
                        <label for="ineComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- CURP -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="curpComparecientes" id="curpComparecientes" >
                        <label for="curpComparecientes">
                            CURP
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="curpComparecientesArchivo" id="curpComparecientesArchivo" class="fileUpload" >
                        <label for="curpComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- RFC -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="rfcComparecientes" id="rfcComparecientes" >
                        <label for="rfcComparecientes">
                            RFC (Constancia de situación fiscal)
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="rfcComparecientesArchivo" id="rfcComparecientesArchivo" class="fileUpload" >
                        <label for="rfcComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Acta de nacimiento -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="actanacComparecientes" id="actanacComparecientes" >
                        <label for="actanacComparecientes">
                            Acta de nacimiento
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="actanacComparecientesArchivo" id="actanacComparecientesArchivo" class="fileUpload" >
                        <label for="actanacComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Acta de matrimonio (opcional) -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="actamatComparecientes" id="actamatComparecientes">
                        <label for="actamatComparecientes">
                            Acta de matrimonio
                        </label>
                    </div>
                    <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="actamatComparecientesArchivo" id="actamatComparecientesArchivo" class="fileUpload">
                        <label for="actamatComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Comprobante de domicilio -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="compdomicilioComparecientes" id="compdomicilioComparecientes" >
                        <label for="compdomicilioComparecientes">
                            Comprobante de domicilio
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="compdomicilioComparecientesArchivo"
                            id="compdomicilioComparecientesArchivo" class="fileUpload" >
                        <label for="compdomicilioComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Recibo de agua -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="reciboaguaComparecientes" id="reciboaguaComparecientes" >
                        <label for="reciboaguaComparecientes">
                            Recibo de agua
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="reciboaguaComparecientesArchivo"
                            id="reciboaguaComparecientesArchivo" class="fileUpload" >
                        <label for="reciboaguaComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Formato de hoja de generales -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="hojageneralesComparecientes" id="hojageneralesComparecientes" >
                        <label for="hojageneralesComparecientes">
                            Formato de hoja de generales
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="hojageneralesComparecientesArchivo" id="hojageneralesComparecientesArchivo" class="fileUpload" >
                        <label for="hojageneralesComparecientesArchivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
            </div>
            <!-- Testigos-->
            <div class="compound-check-field tramites-container__item-form-container-form-document" id="Testigo1">
                <div class="title">
                    <label for="Testigo1">
                        Testigos:
                    </label>
                </div>
                <!-- INE -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="ineTestigo1" id="ineTestigo1" >
                        <label for="ineTestigo1">
                            INE
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="ineTestigo1Archivo" id="ineTestigo1Archivo" class="fileUpload" >
                        <label for="ineTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- CURP -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="curpTestigo1" id="curpTestigo1" >
                        <label for="curpTestigo1">
                            CURP
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="curpTestigo1Archivo" id="curpTestigo1Archivo" class="fileUpload" >
                        <label for="curpTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- RFC -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="rfcTestigo1" id="rfcTestigo1" >
                        <label for="rfcTestigo1">
                            RFC (Constancia de situación fiscal)
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="rfcTestigo1Archivo" id="rfcTestigo1Archivo" class="fileUpload" >
                        <label for="rfcTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Acta de nacimiento -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="actanacTestigo1" id="actanacTestigo1" >
                        <label for="actanacTestigo1">
                            Acta de nacimiento
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file">
                        <span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="actanacTestigo1Archivo" id="actanacTestigo1Archivo" class="fileUpload" >
                        <label for="actanacTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Acta de matrimonio (opcional) -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="actamatTestigo1" id="actamatTestigo1">
                        <label for="actamaTestigo1">
                            Acta de matrimonio
                        </label>
                    </div>
                    <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="actamatTestigo1Archivo" id="actamatTestigo1Archivo" class="fileUpload">
                        <label for="actamatTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Comprobante de domicilio -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="compdomicilioTestigo1" id="compdomicilioTestigo1" >
                        <label for="compdomicilioTestigo1">
                            Comprobante de domicilio
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="compdomicilioTestigo1Archivo" id="compdomicilioTestigo1Archivo" class="fileUpload" >
                        <label for="compdomicilioTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Recibo de agua -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="reciboaguaTestigo1" id="reciboaguaTestigo1" >
                        <label for="reciboaguaTestigo1">
                            Recibo de agua
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="reciboaguaTestigo1Archivo" id="reciboaguaTestigo1Archivo" class="fileUpload" >
                        <label for="reciboaguaTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
                <!-- Formato de hoja de generales -->
                <div class="simple-check-field">
                    <div class="check">
                        <input type="checkbox" name="hojageneralesTestigo1" id="hojageneralesTestigo1" >
                        <label for="hojageneralesTestigo1">
                            Formato de hoja de generales
                            <span class="asterisk">*</span>
                        </label>
                    </div>
                    <div class="file"><span class="file-name">No se ha seleccionado ningún archivo</span>
                        <input type="file" name="hojageneralesTestigo1Archivo" id="hojageneralesTestigo1Archivo" class="fileUpload" >
                        <label for="hojageneralesTestigo1Archivo" class="archivo">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i> Subir archivo
                        </label>
                    </div>
                </div>
            </div>
            
            <button class="section__button section__button--cancel">Cancelar</button>
            <button class="section__button">Guardar documento</button>
        </form>
    </secton>

    <script src="../../js/js_pagina-principal/mostrarControles.js"></script>
    <script src="../../js/js_pagina-principal/filtarClientes.js"></script>
</body>
</html>