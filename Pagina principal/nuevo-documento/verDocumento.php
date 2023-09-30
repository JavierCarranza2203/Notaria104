<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visor de PDF</title>
    <!-- Incluir la biblioteca PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.333/pdf.min.js"></script>
</head>
<body>
    <?php
    if (isset($_GET['url'])) {
        $archivoCodificado = $_GET['url'];
        $archivoDecodificado = urldecode($archivoCodificado);

        if (file_exists($archivoDecodificado)) {
            // Establecer el tipo de contenido
            header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
            header('Cache-Control: post-check=0, pre-check=0', false);
            header('Pragma: no-cache');
            header('Content-Type: application/pdf');

            // Leer y enviar el archivo al navegador
            readfile($archivoDecodificado);
        } else {
            echo 'El archivo no existe.';
        }
    } else {
        echo 'La URL del archivo no se proporcionó correctamente.';
    }
    ?>

    <!-- Contenedor para el visor PDF -->
    <div id="pdf-container" style="width: 100%; height: 600px;"></div>

    <script>
        // Obtener el contenedor del visor PDF
        const pdfContainer = document.getElementById("pdf-container");

        // URL del archivo PDF que deseas mostrar
        const pdfUrl = "<?php echo $_GET['url']; ?>";

        // Agregar un parámetro único (marca de tiempo) a la URL
        const uniqueParam = "&timestamp=" + Date.now();

        // Configurar opciones de PDF.js con la URL modificada
        const options = {
            url: pdfUrl + uniqueParam,
        };

        // Crear el visor PDF
        const pdfViewer = pdfjsLib.getDocument(options);

        // Renderizar el PDF en el contenedor
        pdfViewer.promise.then(function(pdfDoc) {
            // Cargar la primera página del PDF
            return pdfDoc.getPage(1);
        }).then(function(page) {
            // Configurar el escalamiento
            const viewport = page.getViewport({ scale: 1.0 });
            pdfContainer.style.width = viewport.width + "px";
            pdfContainer.style.height = viewport.height + "px";

            // Renderizar la página en el contenedor
            const renderContext = {
                canvasContext: pdfContainer.getContext("2d"),
                viewport: viewport,
            };
            page.render(renderContext);
        });
    </script>
</body>
</html>


