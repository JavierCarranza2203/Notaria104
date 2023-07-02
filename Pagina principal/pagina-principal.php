<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notaría 104 | Página principal</title>

    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/estilos_pagina-principal/style_pagina-principal.css">
    <link rel="stylesheet" href="../css/style-error-page.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f8571caff0.js" crossorigin="anonymous"></script>
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
                <a href="../index.html" class="error-container__back"><i class="fa-solid fa-rotate-left"></i> Iniciar sesión</a>
                </div>
            </div>
    <?php  
            die();
        }
    ?>

    <header class="header-container">
        <h2>Registro de documentos</h2>
    </header>
    
    <nav class="menu-container" id="menu-container">
        <button class="menu-container__button" id="my-documents">Mis documentos</button>
        <button class="menu-container__button active" id="new-document">Nuevo documento</button>
        <a href="clientes/agregar-cliente.html" class="menu-container__button">Registrar cliente</a>
        <a href="clientes/tabla-clientes.php" class="menu-container__button">Tabla de clientes</a>
    </nav>

    <section class="my-documents-container" id="my-documents-container">
        <div class="my-documents-container__filter">
            <h2>Documentos guardados</h2>

            <ul class="my-documents-container__filter-list">
                <li class="my-documents-container__filter-list-item">
                    <a href="#inicio" class="header__menu-container-list-item-section">Todos</a>
                </li>
                <li class="my-documents-container__filter-list-item">
                    <a href="#actas" class="header__menu-container-list-item-section">Actas</a>
                </li>
                <li class="my-documents-container__filter-list-item">
                    <a href="#cartas" class="header__menu-container-list-item-section">Cartas</a>
                </li>
                <li class="my-documents-container__filter-list-item">
                    <a href="#contratos" class="header__menu-container-list-item-section">Contratos</a>
                </li>
                <li class="my-documents-container__filter-list-item">
                    <a href="#donaciones" class="header__menu-container-list-item-section">Donaciones</a>
                </li>
                <li class="my-documents-container__filter-list-item">
                    <a href="#protocolizaciones" class="header__menu-container-list-item-section">Protocolizaciones</a>
                </li>
                <li class="my-documents-container__filter-list-item">
                    <a href="#otros" class="header__menu-container-list-item-section">Otros</a>
                </li>
            </ul>
        </div>
    </section>

    <section class="new-document-container" id="new-document-container">
        <div class="new-document-container__filter">
            <h2>Nuevo documento</h2>

            <ul class="new-document-container__filter-list">
                <li class="new-document-container__filter-list-item " id="Actas">
                    Actas
                </li>
                <li class="new-document-container__filter-list-item" id="Cartas">
                    Cartas
                </li>
                <li class="new-document-container__filter-list-item" id="Contratos">
                    Contratos
                </li>
                <li class="new-document-container__filter-list-item" id="Donaciones">
                    Donaciones
                </li>
                <li class="new-document-container__filter-list-item" id="Protocolizaciones">
                    Protocolizaciones
                </li>
                <li class="new-document-container__filter-list-item" id="Otros">
                    Otros
                </li>
            </ul>
        </div>

        <section class="tramites-container hide-container" id="Contenedor-Contratos">
            <div class="tramites-container__item">
                <div class="tramites-container__item-form">
                    <h3>Contrato de compraventa</h3>
                    <a href="nuevo-documento/documento.php?documento=CCV">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Contrato de compraventa con reserva de dominio</h3>
                    <a href="nuevo-documento/documento.php?documento=CCVCRD">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Contrato de arrendamiento</h3>
                    <a href="nuevo-documento/documento.php?documento=CoA">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Contrato de comodato</h3>
                    <a href="nuevo-documento/documento.php?documento=CCD">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Contrato de compra venta a plazos</h3>
                    <a href="nuevo-documento/documento.php?documento=CCVP">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Contrato de servidumbre de paso</h3>
                    <a href="nuevo-documento/documento.php?documento=CSP">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Contrato de reconocimiento de adeudo con intereses y garantía hipotecaria</h3>
                    <a href="nuevo-documento/documento.php?documento=CRAIGH">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
            </div>
        </section>

        <section class="tramites-container hide-container" id="Contenedor-Cartas">
            <div class="tramites-container__item">
                <div class="tramites-container__item-form">
                    <h3>Carta de autorización</h3>
                    <a href="nuevo-documento/documento.php?documento=CaA">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Carta responsiva</h3>
                    <a href="nuevo-documento/documento.php?documento=CR">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
            </div>
        </section>

        <section class="tramites-container hide-container" id="Contenedor-Protocolizaciones">
            <div class="tramites-container__item">
                <div class="tramites-container__item-form">
                    <h3>Protocolización de acta de asamblea</h3>
                    <a href="nuevo-documento/documento.php?documento=PAA">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Protocolización de juicio sucesorio</h3>
                    <a href="nuevo-documento/documento.php?documento=PJS">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Protocolización de subdivisión o fusión</h3>
                    <a href="nuevo-documento/documento.php?documento=PSoF">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
            </div>
        </section>

        <section class="tramites-container " id="Contenedor-Actas">
            <div class="tramites-container__item">
                <div class="tramites-container__item-form">
                    <h3>Acta constitutiva</h3>
                    <a href="nuevo-documento/documento.php?documento=AC">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Acta notarial</h3>
                    <a href="nuevo-documento/documento.php?documento=AN">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
            </div>
        </section>

        <section class="tramites-container hide-container" id="Contenedor-Donaciones">
            <div class="tramites-container__item">
                <div class="tramites-container__item-form">
                    <h3>Donación gratuita pura y simple</h3>
                    <a href="nuevo-documento/documento.php?documento=DGPS">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Donación gratuita pura y simple con reserva de usufructo vitalicio</h3>
                    <a href="nuevo-documento/documento.php?documento=DGPSRUV">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
            </div>
        </section>

        <section class="tramites-container hide-container" id="Contenedor-Otros">
            <div class="tramites-container__item">
                <div class="tramites-container__item-form">
                    <h3>Testamento público abierto sencillo</h3>
                    <a href="nuevo-documento/documento.php?documento=TPAS">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Testamento público abierto con legados</h3>
                    <a href="nuevo-documento/documento.php?documento=TPAL">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Usufructo vitalicio</h3>
                    <a href="nuevo-documento/documento.php?documento=UV">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Convenio de transmisión de propiedad, en extinción parcial de fideicomiso</h3>
                    <a href="nuevo-documento/documento.php?documento=CTPEPF">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Declaración testimonial sobre el nombre</h3>
                    <a href="nuevo-documento/documento.php?documento=DTSN">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Declaración testimonial sobre el estado civil</h3>
                    <a href="nuevo-documento/documento.php?documento=DTSEC">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
    
                <div class="tramites-container__item-form">
                    <h3>Cancelación de reserva de dominio</h3>
                    <a href="nuevo-documento/documento.php?documento=CRD">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
    
                <div class="tramites-container__item-form">
                    <h3>Poder especial y/o general</h3>
                    <a href="nuevo-documento/documento.php?documento=PEyoG">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Cesión de derechos</h3>
                    <a href="nuevo-documento/documento.php?documento=CD">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Escrito aclaratorio (Superficie)</h3>
                    <a href="nuevo-documento/documento.php?documento=EAS">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Escrito aclaratorio (Nombre)</h3>
                    <a href="nuevo-documento/documento.php?documento=EAN">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>

                <div class="tramites-container__item-form">
                    <h3>Escrito aclaratorio (Estado civil)</h3>
                    <a href="nuevo-documento/documento.php?documento=EAEC">
                        <i class="fa-regular fa-pen-to-square"></i> Llenar
                    </a>
                </div>
            </div>
        </section>
    </section>

    <script src="../js/js_pagina-principal/main.js"></script>
</body>
</html>