<?php
include '../conection.php';

$tipoDocumento = $_POST['txtDocumento'] ?? 'Desconocido';
$folioDocumento = $_POST['txtFolio'] ?? 'Desconocido';
$nombreCliente = $_POST['txtNombre'] ?? 'Desconocido';
$volumenDocumento = $_POST['txtVolumen'] ?? 'Desconocido';
$instrumentoDocumento = $_POST['txtInstrumento'] ?? 'Desconocido';


$idClienteRegistrado= 0;
$clienteRegistrado = true;
$arrayRutas = [];

for ($i = 0; $i < 10; $i++) {
    $arrayRutas[$i] = 'Desconocida';
}

$estructuraComparecientes = ['ineComparecientesArchivo', 
'curpComparecientesArchivo', 'rfcComparecientesArchivo', 
'actanacComparecientesArchivo', 'actamatComparecientesArchivo', 
'compdomicilioComparecientesArchivo', 'reciboaguaComparecientesArchivo', 
'hojageneralesComparecientesArchivo'];

$estructuraTestigos = ['ineTestigo1Archivo', 'curpTestigo1Archivo', 
'rfcTestigo1Archivo', 'actanacTestigo1Archivo', 'actamatTestigo1Archivo',
'compdomicilioTestigo1Archivo', 'reciboaguaTestigo1Archivo', 'hojageneralesTestigo1Archivo'];

$estructuraDocumentos = [
    'ac' => [

    ],
    //Listo
    'an' => [
        'documentos' => ['PoderArchivo', 'PersonalidadEmpresaArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'coa' => [
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 
        'actanacArchivo', 'ActaMatrimonioArchivo', 'comprobanteDomArchivo', 
        'reciboAguaArchivo', 'hojaGeneralesArchivo', 
        'identificacionInmuebleArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'ccd' => [
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 
        'actanacArchivo', 'ActaMatrimonioArchivo', 'comprobanteDomArchivo', 
        'reciboAguaArchivo', 'hojaGeneralesArchivo', 
        'identificacionInmuebleArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'ccv' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => true,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'ccvp' => [
        'documentos' => ['escrituraArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => true,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'ccvcrd' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => true,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'craigh' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => true,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'csp' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => true,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'dgps' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => true,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'dgpsruv' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => true,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'paa' => [
        'documentos' => ['ActaEmpresaArchivo', 'PoderArchivo', 'PersonalidadEmpresaArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'pjs' => [
        'documentos' => [ 'ConstanciaJuzgadoArchivo', 'certificadoArchivo', 'predialArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'psof' => [
        'documentos' => ['PlanoArchivo', 'DictamenDeSubdivisionArchivo', 'predialArchivo', 'certificadoArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'tpas' => [
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 'actanacArchivo', 'ActaMatrimonioArchivo', 'hojaGeneralesArchivo', 'NombresHijosArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'tpal' => [
        'documentos' => ['ineArchivo', 'curpArchivo', 'rfcArchivo', 'actanacArchivo', 'ActaMatrimonioArchivo', 'hojaGeneralesArchivo', 'NombresHijosArchivo', 'AntecedentesPropiedadesArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'uv' => [
        'documentos' => 'escrituraArchivo',
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'ctpepf' => [
        'documentos' => ['escrituraArchivo', 'certificadoArchivo', 'predialArchivo', 'poderArchivo', 'PersonalidadEmpresaArchivo', 'PersonalidadOPoderArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => true,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
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
        'testigos' => true,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    //Listo
    'crd' => [
        'documentos' => ['escrituraArchivo', 'ineArchivo', 'rfcArchivo', 'curpArchivo', 'hojaGeneralesArchivo', 'certificadoArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => true,
        'identificacionPersona' => false
    ],
    'peyog' => [ 
        'documentos' => ['escrituraArchivo', 'ineArchivo', 'rfcArchivo', 'curpArchivo', 'hojaGeneralesArchivo', 'PoderanteArchivo', 'ApoderadoArchivo', 'DatosEmpresaArchivo', 'ActaConstitutivaEmpresaArchivo', 'PoderRepresentanteArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => true,
        'identificacionPersona' => false
    ],
    'cd' => [
        'documentos' => ['escrituraArchivo', 'ineArchivo', 'rfcArchivo', 'curpArchivo', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => true,
        'identificacionPersona' => false
    ],
    'eas' => [
        'documentos' => ['escrituraArchivo', 'predialArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    'ean' => [
        'documentos' => ['escrituraArchivo', 'documentoIdentificacion1Archivo', 'documentoIdentificacion2Archivo', 'documentoIdentificacion3Archivo', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => true
    ],
    'eaec' => [
        'documentos' => ['escrituraArchivo', 'documentoIdentificacion1Archivo', 'documentoIdentificacion2Archivo', 'documentoIdentificacion3Archivo', 'hojaGeneralesArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => true
    ],
    'caa' => [
        'documentos' => ['ActaNacimientoMenorArchivo', 'DatosGeneralesPadresArchivo', 'ActaDefuncionArchivo', 'DomicilioViviendaArchivo', 'NombrePersonaACargoArchivo'],
        'comparecientes' => false,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ],
    'cr' => [
        'documentos' => ['TituloVehiculoArchivo', 'TarjetaCirculacionArchivo'],
        'comparecientes' => true,
        'testigos' => false,
        'conjuntoArchivos1' => false,
        'conjuntoArchivos2' => false,
        'identificacionPersona' => false
    ]
];

$sql = "SELECT * FROM ".$tipoDocumento." WHERE folio = '$folioDocumento'";
$result = $conection->query($sql);

if ($result->num_rows == 0) {

    $insertarDatosIdentificacion = "INSERT INTO datosIdentificacion (nombre_cliente, volumen, instrumento) VALUES ('$nombreCliente', '$volumenDocumento', '$instrumentoDocumento')";

    mysqli_query($conection, $insertarDatosIdentificacion);

    $idDatosArchivo = mysqli_insert_id($conection);
    $contadorRutas = 0;
    if (isset($estructuraDocumentos[$tipoDocumento])) {
        $carpetaDestino = 'C:/xampp/htdocs/Ti/Notaria 104/php/php_pagina-principal/documentos/' . $tipoDocumento . "_" . $nombreCliente . "_" . $folioDocumento;

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
                
                $arrayRutas[$contadorRutas] = $rutaArchivo;
                move_uploaded_file($_FILES[$documentos]['tmp_name'], $rutaArchivo);
                $contadorRutas++;
            }
        }

        $idConjuntoArchivos1 = 0;
        if($estructuraDocumentos[$tipoDocumento]['conjuntoArchivos1'] === true){
            $query = "INSERT INTO conjuntoarchivos1 (escritura, certificado_reserva_prioridad, predial) VALUES ('$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]')";

            mysqli_query($conection, $query);
            $idConjuntoArchivos1 = mysqli_insert_id($conection);
        }

        $idConjuntoArchivos2 = 0;
        if($estructuraDocumentos[$tipoDocumento]['conjuntoArchivos2'] === true){
            $query = "INSERT INTO conjunto_archivos2 (escritura, ine, rfc, curp, hoja_generales) VALUES ('$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]', '$arrayRutas[3]', '$arrayRutas[4]')";

            mysqli_query($conection, $query);
            $idConjuntoArchivos2 = mysqli_insert_id($conection);
        }

        $idIdentificacionPersona = 0;
        if($estructuraDocumentos[$tipoDocumento]['identificacionPersona'] === true){
            $query = "INSERT INTO identificacion_persona (primer_documento, segundo_documento, tercer_documento) VALUES ('$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]')";

            $idIdentificacionPersona = mysqli_query($conection, $query);
        }

        $arrayRutasComparecientes = [];
        $idComparecientes = 0;

        for ($i = 0; $i < 10; $i++) {
            $arrayRutasComparecientes[$i] = 'Desconocida';
        }

        $contadorRutas = 0;
        if($estructuraDocumentos[$tipoDocumento]['comparecientes'] === true){
            $rutaComparecientes = $carpetaDestino . '/' .'comparecientes';

            if (!is_dir($rutaComparecientes)) {
                mkdir($rutaComparecientes, 0755, true);
            }

            foreach ($estructuraComparecientes as $documentos){
                if ($_FILES[$documentos]['error'] === UPLOAD_ERR_OK) {
                    $nombreArchivo = $_FILES[$documentos]['name'];
                    $rutaArchivo = $rutaComparecientes. '/' . $nombreArchivo;
                    // Verificar si el archivo ya existe
                    if (file_exists($rutaArchivo)) {
                        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                        $nombreArchivo = basename($nombreArchivo, '.' . $extension) . '_' . uniqid() . '.' . $extension;
                        $rutaArchivo = $rutaComparecientes. '/' . $nombreArchivo;
                    }
                    
                    $arrayRutasComparecientes[$contadorRutas] = $rutaArchivo;
                    move_uploaded_file($_FILES[$documentos]['tmp_name'], $rutaArchivo);
                    $contadorRutas++;
                }
            }

            $instertarPersona = "INSERT INTO persona (ine, curp, rfc, acta_nacimiento, acta_matrimonio, comprobante_domicilio, recibo_agua, hoja_generales, id_documento) VALUES ('$arrayRutasComparecientes[0]', '$arrayRutasComparecientes[1]', '$arrayRutasComparecientes[2]', '$arrayRutasComparecientes[3]', '$arrayRutasComparecientes[4]', '$arrayRutasComparecientes[5]', '$arrayRutasComparecientes[6]', '$arrayRutasComparecientes[7]', '$idDatosArchivo')";
        
            if (mysqli_query($conection, $instertarPersona)) {

                $idComparecientes = mysqli_insert_id($conection);
                $insertarComparecientes = "INSERT INTO comparecientes (id_persona) VALUES ('$idComparecientes')";
                mysqli_query($conection, $insertarComparecientes);
                $idComparecientes = mysqli_insert_id($conection);

            }
        }

        $arrayRutasTestigos = [];
        $idTestigos = 0;
        for ($i = 0; $i < 10; $i++) {
            $arrayRutasTestigos[$i] = 'Desconocida';
        }
        $contadorRutas = 0;
        if($estructuraDocumentos[$tipoDocumento]['testigos'] === true){
            $rutaTestigos = $carpetaDestino . '/' .'testigos';

            if (!is_dir($rutaTestigos)) {
                mkdir($rutaTestigos, 0755, true);
            }

            foreach ($estructuraTestigos as $documentos){
                if ($_FILES[$documentos]['error'] === UPLOAD_ERR_OK) {
                    $nombreArchivo = $_FILES[$documentos]['name'];
                    $rutaArchivo = $rutaTestigos. '/' . $nombreArchivo;
                    // Verificar si el archivo ya existe
                    if (file_exists($rutaArchivo)) {
                        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                        $nombreArchivo = basename($nombreArchivo, '.' . $extension) . '_' . uniqid() . '.' . $extension;
                        $rutaArchivo = $rutaTestigos. '/' . $nombreArchivo;
                    }
                    
                    $arrayRutasTestigos[$contadorRutas] = $rutaArchivo;
                    move_uploaded_file($_FILES[$documentos]['tmp_name'], $rutaArchivo);
                    $contadorRutas++;
                }
            }

            $instertarPersona = "INSERT INTO persona (ine, curp, rfc, acta_nacimiento, acta_matrimonio, comprobante_domicilio, recibo_agua, hoja_generales) VALUES ('$arrayRutasTestigos[0]', '$arrayRutasTestigos[1]', '$arrayRutasTestigos[2]', '$arrayRutasTestigos[3]', '$arrayRutasTestigos[4]', '$arrayRutasTestigos[5]', '$arrayRutasTestigos[6]', '$arrayRutasTestigos[7]')";
        
            if (mysqli_query($conection, $instertarPersona)) {
                $idTestigos = mysqli_insert_id($conection);
                $insertarTestigos = "INSERT INTO testigos (id_persona) VALUES ('$idTestigos')";
                mysqli_query($conection, $insertarTestigos);
                $idTestigos = mysqli_insert_id($conection);
            }
        }

        $estructuraQuerys = [
            'an' => "INSERT INTO an (folio, poder, personalidad_empresa, id_Cliente, id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$arrayRutas[1]', '$idComparecientes', '$idDatosArchivo' )",
            'coa' => "INSERT INTO coa (folio,  ine, curp, rfc, acta_nacimiento, acta_matrimonio, comprobante_domicilio, recibo_agua, hoja_generales, identificacion_inmueble, id_datosIdentificacion) VALUES ('$folioDocumento',  '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]', '$arrayRutas[3]', '$arrayRutas[4]', '$arrayRutas[5]', '$arrayRutas[6]', '$arrayRutas[7]', '$arrayRutas[8]', '$idDatosArchivo')",
            'ccd' => "INSERT INTO ccd (folio,  ine, curp, rfc, acta_nacimiento, acta_matrimonio, comprobante_domicilio, recibo_agua, hoja_generales, identificacion_inmueble, id_datosIdentificacion) VALUES ('$folioDocumento',  '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]', '$arrayRutas[3]', '$arrayRutas[4]', '$arrayRutas[5]', '$arrayRutas[6]', '$arrayRutas[7]', '$arrayRutas[8]', '$idDatosArchivo')",
            'ccv' => "INSERT INTO ccv (folio, id_conjuntoArchivos,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$idConjuntoArchivos1', '$idComparecientes', '$idDatosArchivo')",
            'ccvp' => "INSERT INTO ccvp (folio,  id_comparecientes, id_testigos, id_datosIdentificacion, escritura, predial) VALUES ('$folioDocumento',  '$idComparecientes', '$idTestigos', '$idDatosArchivo', '$arrayRutas[0]', '$arrayRutas[1]')",
            'ccvcrd' => "INSERT INTO ccvcrd (folio, id_conjuntoArchivos,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$idConjuntoArchivos1', '$idComparecientes', '$idDatosArchivo')",
            'craigh' => "INSERT INTO craigh (folio, id_conjuntoArchivos,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$idConjuntoArchivos1', '$idComparecientes', '$idDatosArchivo')",
            'csp' => "INSERT INTO csp (folio, id_conjuntoArchivos,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$idConjuntoArchivos1', '$idComparecientes', '$idDatosArchivo')",
            'dgps' => "INSERT INTO dgps (folio, id_conjuntoArchivos,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$idConjuntoArchivos1', '$idComparecientes', '$idDatosArchivo')",
            'dgpsruv' => "INSERT INTO dgpsruv (folio, id_conjuntoArchivos,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$idConjuntoArchivos1', '$idComparecientes', '$idDatosArchivo')",
            'paa' => "INSERT INTO paa (folio, id_comparecientes,  id_datosIdentificacion, acta_empresa, poder, personalidad_empresa) VALUES ('$folioDocumento', '$idComparecientes', '$idDatosArchivo' , '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]',  '$idComparecientes', '$idDatosArchivo')",
            'pjs' => "INSERT INTO pjs (folio, constancia_expedida_juzgado, certificado_reserva_prioridad, predial,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]')",
            'psof' => "INSERT INTO psof (folio, plano, dictamen_subdivision, predial, certificado_reserva_prioridad,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]', '$arrayRutas[3]',  '$idComparecientes', '$idDatosArchivo')",
            'tpas' => "INSERT INTO tpas (folio, ine, curp, rfc, acta_nacimiento, acta_matrimonio, hoja_generales, nombres_hijos,  id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]', '$arrayRutas[3]', '$arrayRutas[4]', '$arrayRutas[5]', '$arrayRutas[6]',  '$idDatosArchivo')",
            'tpal' => "INSERT INTO tpal (folio, ine, curp, rfc, acta_nacimiento, acta_matrimonio, hoja_generales, nombres_hijos, escritura,  id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]', '$arrayRutas[3]', '$arrayRutas[4]', '$arrayRutas[5]', '$arrayRutas[6]', '$arrayRutas[7]',  '$idDatosArchivo')",
            'uv' => "INSERT INTO uv (folio, escritura, id_comparecientes,  id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$idComparecientes',  '$idDatosArchivo')",
            'ctpepf' => "INSERT INTO ctpepf (folio, id_conjuntoArchivos,  id_comparecientes, id_datosIdentificacion) VALUES ('$folioDocumento', '$idConjuntoArchivos1',  '$idComparecientes', '$idDatosArchivo')",
            'dtsn' => "INSERT INTO dtsn (folio, id_identificacionPersona,  id_testigos, hoja_generales, id_datosIdentificacion) VALUES ('$folioDocumento', '$idIdentificacionPersona',  '$idTestigos', '$arrayRutas[3]')",
            'dtsec' => "INSERT INTO dtsec (folio, acta_matrimonio,  id_testigos, hoja_generales, id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]',  '$idTestigos', '$arrayRutas[1]', '$idDatosArchivo')",
            'crd' => "INSERT INTO crd (folio,  id_archivos, certificdo_reserva_prioridad, id_datosIdentificacion) VALUES ('$folioDocumento',  '$idConjuntoArchivos2', '$arrayRutas[5]', '$idDatosArchivo')",
            'peyog' => "INSERT INTO peyog (folio,  id_archivos, id_datosIdentificacion, poderante, apoderado, datos_empresa, acta_constitutiva, poder_representante) VALUES ('$folioDocumento',  '$idConjuntoArchivos2', '$idDatosArchivo', '$arrayRutas[5]', '$arrayRutas[6]', '$arrayRutas[7]', '$arrayRutas[8]', '$arrayRutas[9]')",
            'cd' => "INSERT INTO cd (folio,  id_archivos, id_datosIdentificacion) VALUES ('$folioDocumento',  '$idConjuntoArchivos2', '$idDatosArchivo')",
            'eas' => "INSERT INTO eas (folio, escritura, predial,  id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$arrayRutas[1]',  '$idDatosArchivo')",
            'ean' => "INSERT INTO ean (folio, id_IdentificacionPersona, hoja_generales,  id_datosIdentificacion) VALUES ('$folioDocumento', '$idIdentificacionPersona', '$arrayRutas[3]',  '$idDatosArchivo')",
            'eaec' => "INSERT INTO eaec (folio, id_IdentificacionPersona, hoja_generales, escritura,  id_datosIdentificacion) VALUES ('$folioDocumento', '$idIdentificacionPersona', '$arrayRutas[3]', '$arrayRutas[4]',  '$idDatosArchivo')",
            'caa' => "INSERT INTO caa (folio, acta_menor, hoja_generales, acta_defuncion, domicilio_nuevo, persona_a_cargo,  id_datosIdentificacion) VALUES ('$folioDocumento', '$arrayRutas[0]', '$arrayRutas[1]', '$arrayRutas[2]', '$arrayRutas[3]', '$arrayRutas[4]',  '$idDatosArchivo')",
            'cr' => "INSERT INTO cr (folio, id_comparecientes,  tarjeta_circulacion, titulo_vehiculo, id_datosIdentificacion) VALUES ('$folioDocumento', '$idComparecientes',  '$arrayRutas[0]', '$arrayRutas[1]', '$idDatosArchivo')"
        ];

        $result = mysqli_query($conection, $estructuraQuerys[$tipoDocumento]);

        if($result){
            echo true;
        }
        else{
            echo false;
        }
    }
    else {
    }
}
else{
    echo "El folio ya existe";
}
?>