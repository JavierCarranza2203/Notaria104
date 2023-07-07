<?php

$nombreCliente = $_POST['nombreCliente'];
$tipoDocumento = $_POST['tipoDocumento'];

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
        'carpeta' => 'actas_notariales',
        'documentos' => ['PoderArchivo', 'PersonalidadEmpresaArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'coa' => [
        'carpeta' => 'contratos_arrendamiento',
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 
        'actnacArchivo', 'ActaMatrimonioArchivo', 'comprobanteDomArchivo', 
        'reciboAguaArchivo', 'hojaGeneralesArchivo', 
        'identificacionInmuebleArchivo']
    ],
    //Listo
    'ccd' => [
        'carpeta' => 'contratos_comodato',
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 
        'actnacArchivo', 'ActaMatrimonioArchivo', 'comprobanteDomArchivo', 
        'reciboAguaArchivo', 'hojaGeneralesArchivo', 
        'identificacionInmuebleArchivo']
    ],
    //Listo
    'ccv' => [
        'carpeta' => 'contratos_compraventa',
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'ccvp' => [
        'carpeta' => 'contratos_compraventa_plazos',
        'documentos' => ['escrituraArchivo', 'predialArchivo'],
        'comparecientes' => $estructuraComparecientes,
        'testigos' => $estructuraTestigos
    ],
    //Listo
    'ccvrd' => [
        'carpeta' => 'contratos_compraventa_reserva_dominio',
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'craigh' => [
        'carpeta' => 'contratos_reconocimiento_adeudo_intereses_garantia_hipotecaria',
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'csp' => [
        'carpeta' => 'contratos_servidumbre_paso',
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'dgps' => [
        'carpeta' => 'donaciones_gratuita_pura_simple',
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'dgpsruv' => [
        'carpeta' => 'donaciones_gratuita_pura_simple_reserva_usufructo_vitalicio',
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'paa' => [
        'carpeta' => 'protocolizaciones_acta_asamblea',
        'documentos' => ['PoderArchivo', 'PersonalidadEmpresaArchivo', 'ActaEmpresaArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    //Listo
    'pjs' => [
        'carpeta' => 'protocolizaciones_juicio_sucesorio',
        'documentos' => ['certificadoArchivo', 'predialArchivo', 'ConstanciaJuzgadoArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    'psof' => [
        'carpeta' => 'protocolizaciones_subdivision_fusion',
        'documentos' => ['certificadoArchivo', 'predialArchivo', 'DictamenDeSubdivisionArchivo', 'PlanoArchivo'],
        'comparecientes' => $estructuraComparecientes
    ],
    'tpas' => [],
    'tpal' => [],
    'uv' => [],
    'ctpepf' => [],
    'dtsn' => [],
    'dtsec' => [],
    'crd' => [],
    'peyog' => [],
    'cd' => [],
    'eas' => [],
    'ean' => [],
    'eaec' => [],
    'caa' => [],
    'cr' => []
];
?>