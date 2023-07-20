<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_tabla-clientes.css">
    <link rel="stylesheet" href="../../css/estilos_pagina-principal/style_pagina-principal.css">
    <link rel="stylesheet" href="../../css/style-error-page.css">
    <link rel="stylesheet" href="../../css/style-reset.css">

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
            <a class="header__link header__link--active"><i class="fa-solid fa-box-archive"></i> Mis documentos</a>
            <a href="../pagina-principal.php" class="header__link"><i class="fa-solid fa-file-circle-plus"></i> Nuevo documento</a>
            <a href="../clientes/agregar-cliente.php" class="header__link"><i class="fa-solid fa-user-plus"></i> Registrar cliente</a>
            <a href="../clientes/tabla-clientes.php" class="header__link"><i class="fa-solid fa-user-group"></i> Tabla de clientes</a>
        </nav>

        <a href="../../index.html" class="header__link header__link--close-sesion" id="btnCloseSession"><i class="fa-solid fa-user-lock"></i> Cerrar sesión</a>
    </header>

    <section class="section new-document" id="contenedorMisDocumentos">
        <nav class="section__nav">
            <h2 class="section__h2">Ver documentos guardados</h2>

            <ul class="section__ul">
                <li class="section__li section__li--active" id="btnActas">Actas</li>
                <li class="section__li" id="btnEscritos">Escritos</li>
                <li class="section__li" id="btnContratos">Contratos</li>
                <li class="section__li" id="btnDonaciones">Donaciones</li>
                <li class="section__li" id="btnProtocolizaciones">Protocolizaciones</li>
                <li class="section__li" id="btnOtros">Otros</li>
            </ul>
        </nav>
        
        <article class="new-document__wrapper new-document__wrapper--hidden" id="contenedorContratos">
            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Contrato de compraventa</h3>
                <a id="CCV">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Contrato de compraventa con reserva de dominio</h3>
                <a id="CCVCRD">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Contrato de arrendamiento</h3>
                <a uid="CoA">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Contrato de comodato</h3>
                <a id="CCD">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Contrato de compra venta a plazos</h3>
                <a id="CCVP">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Contrato de servidumbre de paso</h3>
                <a id="CSP">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Contrato de reconocimiento de adeudo con intereses y garantía hipotecaria</h3>
                <a id="CRAIGH">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>
        </article>

        <article class="new-document__wrapper new-document__wrapper--hidden" id="contenedorEscritos">
            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Escrito aclaratorio (Superficie)</h3>
                <a id="EAS">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Escrito aclaratorio (Nombre)</h3>
                <a id="EAN">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Escrito aclaratorio (Estado civil)</h3>
                <a id="EAEC">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>
        </article>

        <article class="new-document__wrapper new-document__wrapper--hidden" id="contenedorProtocolizaciones">
            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Protocolización de acta de asamblea</h3>
                <a id="PAA">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Protocolización de juicio sucesorio</h3>
                <a id="PJS">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Protocolización de subdivisión o fusión</h3>
                <a id="PSoF">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>
        </article>

        <article class="new-document__wrapper" id="contenedorActas">
            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Acta constitutiva</h3>
                <a id="AC">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Acta notarial</h3>
                <a id="AN">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>
        </article>

        <article class="new-document__wrapper new-document__wrapper--hidden" id="contenedorDonaciones">
            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Donación gratuita pura y simple</h3>
                <a id="DGPS">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Donación gratuita pura y simple con reserva de usufructo vitalicio</h3>
                <a id="DGPSRUV">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>
        </article>

        <article class="new-document__wrapper new-document__wrapper--hidden" id="contenedorOtros">
            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Testamento público abierto sencillo</h3>
                <a id="TPAS">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Testamento público abierto con legados</h3>
                <a id="TPAL">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Usufructo vitalicio</h3>
                <a id="UV">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Convenio de transmisión de propiedad, en extinción parcial de fideicomiso</h3>
                <a id="CTPEPF">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Declaración testimonial sobre el nombre</h3>
                <a id="DTSN">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Declaración testimonial sobre el estado civil</h3>
                <a id="DTSEC">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Cancelación de reserva de dominio</h3>
                <a id="CRD">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Poder especial y/o general</h3>
                <a id="PEyoG">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Cesión de derechos</h3>
                <a id="CD">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>
            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Carta de autorización</h3>
                <a id="CaA">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>

            <div class="new-document__item">
                <i class="fa-solid fa-file-lines"></i>
                <h3>Carta responsiva</h3>
                <a id="CR">
                    <i class="fa-solid fa-file-circle-question"></i> Ver todos
                </a>
            </div>
        </article>
    </section>

    <section class="section section--hidden" id="contenedorTabla">
        <nav class="section__nav">
            <h2 class="section__h2">Tabla de <span id="tipoDocumento"></span></h2>
            <h3 class="section__h3"></h3>
        </nav>
        <button class="btnRegresar" id="btnRegresar"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</button>
        <div class="section__table-container">
            <table class="section__table" id="tablaArchivos">
                <thead class="section__table-header">
                    <th class="section__table-header-cell">Folio</th>
                    <th class="section__table-header-cell">Nombre del cliente</th>
                    <th class="section__table-header-cell">Volumen</th>
                    <th class="section__table-header-cell">Instrumento</th>
                    <th class="section__table-header-cell">Ver archivos</th>
                    <th class="section__table-header-cell">Descargar archivos</th>
                </thead>
                <tbody class="table__tbody" id="tableBody">

                </tbody>
            </table>
        </div>
    </section>

    <section class="popup-container">
        <article class="popup-container__modal" id="verArhivos">
            <div class="contenedor-requisito">
                <button></button>
            </div>
        </article>
    </section>

    <script src="../../js/js_pagina-principal/dataTable_buscarCliente.js"></script>
    <script src="../../js/js_pagina-principal/mostarTablaArchivos.js"></script>
    <script src="../../js/js_pagina-principal/app_pagina-principal.js"></script>
    <script src="../../js/cerrar-sesion_v2.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", ()=>{
            for(let i = 0; i < arrayBotones.length; i++){
                arrayBotones[i].addEventListener("click", ()=>{
                    let tipoDocumento = arrayBotones[i].id.toLowerCase();
            
                    let httpRequest = new XMLHttpRequest();
            
                    httpRequest.open("GET", "../../php/php_pagina-principal/buscarArchivos.php?tabla=" + tipoDocumento, true);
            
                    httpRequest.onreadystatechange = function() {
                        
                        if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                            let responeText = httpRequest.responseText;

                            if(responeText.trim() === "No se encontraron registros"){
                                alert("No hay datos");
                            }
                            else{
                                let consulta = JSON.parse(httpRequest.responseText);

                                // Destruir la instancia existente de DataTable
                                if ($.fn.DataTable.isDataTable('#tablaArchivos')) {
                                    $('#tablaArchivos').DataTable().destroy();
                                }
                                
                                mostrarDatos(consulta, tipoDocumento);

                                // Inicializar la tabla DataTable nuevamente
                                $('#tablaArchivos').DataTable({ ordering: false });
                            }
                        }
                    };
                    httpRequest.send();
                }); 
            }
    })
    </script>
</body>
</html>