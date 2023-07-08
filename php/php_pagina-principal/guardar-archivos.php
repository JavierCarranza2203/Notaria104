<?php

//$nombreCliente = $_POST['nombreCliente'];
$tipoDocumento = $_POST['txtDocumento'];

$estructuraComparecientes = ['ineComparecientesArchivo', 
'curpComparecientesArchivo', 'rfcComparecientesArchivo', 
'actanacComparecientesArchivo', 'actmatComparecientesArchivo', 
'compdomicilioComparecientesArchivo', 'reciboaguaComparecientesArchivo', 
'hojageneralesComparecientesArchivo'];

$estructuraTestigos = ['ineTestigo1Archivo', 'curpTestigo1Archivo', 
'rfcTestigo1Archivo', 'actanacTestigo1Archivo', 'actamatTestigo1Archivo',
'compdomicilioTestigo1Archivo', 'reciboAguaTestigo1Archivo', 'hojageneralesTestigo1Archivo'];

$estructuraDocumentos = [
    'ac' => [

    ],
    //Listo
    'an' => [
        'documentos' => ['PoderArchivo', 'PersonalidadEmpresaArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'coa' => [
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 
        'actnacArchivo', 'ActaMatrimonioArchivo', 'comprobanteDomArchivo', 
        'reciboAguaArchivo', 'hojaGeneralesArchivo', 
        'identificacionInmuebleArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    //Listo
    'ccd' => [
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 
        'actnacArchivo', 'ActaMatrimonioArchivo', 'comprobanteDomArchivo', 
        'reciboAguaArchivo', 'hojaGeneralesArchivo', 
        'identificacionInmuebleArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    //Listo
    'ccv' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo', 'hojaGeneralesArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'ccvp' => [
        'documentos' => ['escrituraArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => true
    ],
    //Listo
    'ccvrd' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'craigh' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'csp' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'dgps' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'dgpsruv' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'paa' => [
        'documentos' => ['PoderArchivo', 'PersonalidadEmpresaArchivo', 'ActaEmpresaArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'pjs' => [
        'documentos' => ['certificadoArchivo', 'predialArchivo', 'ConstanciaJuzgadoArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'psof' => [
        'documentos' => ['certificadoArchivo', 'predialArchivo', 'DictamenDeSubdivisionArchivo', 'PlanoArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'tpas' => [
        'documentos' => ['actnacArchivo', 'curpArchivo', 'rfcArchivo', 'ineArchivo', 'ActaMatrimonioArchivo', 'nombresHijosArchivo']
    ],
    //Listo
    'tpal' => [
        'documentos' => ['actnacArchivo', 'curpArchivo', 'rfcArchivo', 'ineArchivo', 'ActaMatrimonioArchivo', 'nombresHijosArchivo', 'escrituraArchivo']
    ],
    //Listo
    'uv' => [
        'documentos' => 'escrituraArchivo',
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'ctpepf' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo', 'poderArchivo', 'PersonalidadEmpresaArchivo', 'PersonalidadOPoderArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ],
    //Listo
    'dtsn' => [
        'documentos' => ['documentoIdentificacion1', 'documentoIdentificacion2', 'documentoIdentificacion3', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => true
    ],
    //Listo
    'dtsec' => [
        'documentos' => ['ActaMatrimonioArchivo', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => true
    ],
    //Listo
    'crd' => [
        'documentos' => ['escrituraArchivo', 'ineArchivo', 'rfcArchivo', 'curpArchivo', 'hojaGeneralesArchivo', 'certificadoArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    'peyog' => [ 
        'documentos' => ['escrituraArchivo', 'ineArchivo', 'rfcArchivo', 'curpArchivo', 'hojaGeneralesArchivo', 'PoderanteArchivo', 'ApoderadoArchivo', 'DatosEmpresaArchivo', 'ActaConstitutivaEmpresaArchivo', 'PoderRepresentanteArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    'cd' => [
        'documentos' => ['escrituraArchivo', 'ineArchivo', 'rfcArchivo', 'curpArchivo', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    'eas' => [
        'documentos' => ['escrituraArchivo', 'predialArchivo']
        //'comparecientes' => false,
        //'testigos' => false
    ],
    'ean' => [
        'documentos' => ['escrituraArchivo', 'documentoIdentificacion1', 'documentoIdentificacion2', 'documentoIdentificacion3', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    'eaec' => [
        'documentos' => ['escrituraArchivo', 'documentoIdentificacion1', 'documentoIdentificacion2', 'documentoIdentificacion3', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    'caa' => [
        'documentos' => ['ActaNacimientoMenorArchivo', 'DatosGeneralesPadresArchivo', 'ActaDefuncionArchivo', 'DomicilioViviendaArchivo', 'NombrePersonaACargoArchivo'],
        'comparecientes' => false,
        'testigos' => false
    ],
    'cr' => [
        'documentos' => ['TituloVehiculoArchivo', 'TarjetaCirculacionArchivo'],
        'comparecientes' => true,
        'testigos' => false
    ]
];

if (isset($estructuraDocumentos[$tipoDocumento])) {
    $carpetaDestino = 'documentos/' . $tipoDocumento;

    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0755, true);
    }

    foreach ($estructuraDocumentos[$tipoDocumento]['documentos'] as $documentos){
        if ($_FILES[$documentos]['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = $_FILES[$documentos]['name'];
            $rutaArchivo = $carpetaDestino . '/' . $nombreArchivo;
            // Verificar si el archivo ya existe
            if (file_exists($rutaArchivo)) {
                $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                $nombreArchivo = basename($nombreArchivo, '.' . $extension) . '_' . uniqid() . '.' . $extension;
                $rutaArchivo = $carpetaDestino . '/' . $nombreArchivo;
            }
            
            move_uploaded_file($_FILES[$documentos]['tmp_name'], $rutaArchivo);
        }
    }
}
?>