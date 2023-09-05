<?php
include '../conection.php';

// Verificar la conexión
if (!$conection) {
    die("Error de conexión a la base de datos");
}

$folioDocumento = $_GET['folio'];

$estructuraQuerys = [
    'an' => "SELECT an.folio, an.poder, an.personalidad_empresa, comparecientes.id_persona, persona.ine, persona.curp, persona.rfc, persona.acta_nacimiento, persona.acta_matrimonio, persona.comprobante_domicilio, persona.recibo_agua, persona.hoja_generales FROM an INNER JOIN comparecientes ON an.id_comparecientes = comparecientes.id INNER JOIN persona ON comparecientes.id_persona = persona.id WHERE an.folio = '$folioDocumento'",
    'coa' => "SELECT ine, curp, rfc, acta_nacimiento, acta_matrimonio, comprobante_domicilio, recibo_agua, hoja_generales, identificacion_inmueble FROM coa WHERE folio = '$folioDocumento'",
    'ccd' => "SELECT ine, curp, rfc, acta_nacimiento, acta_matrimonio, comprobante_domicilio, recibo_agua, hoja_generales, identificacion_inmueble FROM ccd WHERE folio = '$folioDocumento'",
    'ccv' => "SELECT conjuntoarchivos1.escritura, conjuntoarchivos1.certificado_reserva_prioridad, conjuntoarchivos1.predial, comparecientes.id_persona, persona.ine, persona.curp, persona.rfc, persona.acta_nacimiento, persona.acta_matrimonio, persona.comprobante_domicilio, persona.recibo_agua, persona.hoja_generales FROM ccv INNER JOIN comparecientes ON ccv.id_comparecientes = comparecientes.id INNER JOIN persona ON comparecientes.id_persona = persona.id INNER JOIN conjuntoarchivos1 ON ccv.id_conjuntoArchivos = conjuntoarchivos1.id WHERE folio = '$folioDocumento'",
    'ccvp' => "SELECT id_comparecientes, id_testigos, id_datosIdentificacion, escritura, predial FROM ccvp WHERE folio = '$folioDocumento'",
    'ccvcrd' => "SELECT id_conjuntoArchivos, id_comparecientes, id_datosIdentificacion FROM ccvcrd WHERE folio = '$folioDocumento'",
    'craigh' => "SELECT id_conjuntoArchivos, id_comparecientes, id_datosIdentificacion FROM craigh WHERE folio = '$folioDocumento'",
    'csp' => "SELECT id_conjuntoArchivos, id_comparecientes, id_datosIdentificacion FROM csp WHERE folio = '$folioDocumento'",
    'dgps' => "SELECT id_conjuntoArchivos, id_comparecientes, id_datosIdentificacion FROM dgps WHERE folio = '$folioDocumento'",
    'dgpsruv' => "SELECT id_conjuntoArchivos, id_comparecientes, id_datosIdentificacion FROM dgpsruv WHERE folio = '$folioDocumento'",
    'paa' => "SELECT id_comparecientes, id_datosIdentificacion, acta_empresa, poder, personalidad_empresa FROM paa WHERE folio = '$folioDocumento'",
    'pjs' => "SELECT constancia_expedida_juzgado, certificado_reserva_prioridad, predial, id_comparecientes, id_datosIdentificacion FROM pjs WHERE folio = '$folioDocumento'",
    'psof' => "SELECT plano, dictamen_subdivision, predial, certificado_reserva_prioridad, id_comparecientes, id_datosIdentificacion FROM psof WHERE folio = '$folioDocumento'",
    'tpas' => "SELECT ine, curp, rfc, acta_nacimiento, acta_matrimonio, hoja_generales, nombres_hijos, id_datosIdentificacion FROM tpas WHERE folio = '$folioDocumento'",
    'tpal' => "SELECT ine, curp, rfc, acta_nacimiento, acta_matrimonio, hoja_generales, nombres_hijos, escritura, id_datosIdentificacion FROM tpal WHERE folio = '$folioDocumento'",
    'uv' => "SELECT escritura, id_comparecientes, id_datosIdentificacion FROM uv WHERE folio = '$folioDocumento'",
    'ctpepf' => "SELECT id_conjuntoArchivos, id_comparecientes, id_datosIdentificacion FROM ctpepf WHERE folio = '$folioDocumento'",
    'dtsn' => "SELECT id_identificacionPersona, id_testigos, hoja_generales, id_datosIdentificacion FROM dtsn WHERE folio = '$folioDocumento'",
    'dtsec' => "SELECT acta_matrimonio, id_testigos, hoja_generales, id_datosIdentificacion FROM dtsec WHERE folio = '$folioDocumento'",
    'crd' => "SELECT id_archivos, certificdo_reserva_prioridad, id_datosIdentificacion FROM crd WHERE folio = '$folioDocumento'",
    'peyog' => "SELECT id_archivos, id_datosIdentificacion, poderante, apoderado, datos_empresa, acta_constitutiva, poder_representante FROM peyog WHERE folio = '$folioDocumento'",
    'cd' => "SELECT id_archivos, id_datosIdentificacion FROM cd WHERE folio = '$folioDocumento'",
    'eas' => "SELECT escritura, predial FROM eas WHERE folio = '$folioDocumento'",
    'ean' => "SELECT id_IdentificacionPersona, hoja_generales, id_datosIdentificacion FROM ean WHERE folio = '$folioDocumento'",
    'eaec' => "SELECT id_IdentificacionPersona, hoja_generales, escritura, id_datosIdentificacion FROM eaec WHERE folio = '$folioDocumento'",
    'caa' => "SELECT acta_menor, hoja_generales, acta_defuncion, domicilio_nuevo, persona_a_cargo, id_datosIdentificacion FROM caa WHERE folio = '$folioDocumento'",
    'cr' => "SELECT id_comparecientes, tarjeta_circulacion, titulo_vehiculo, id_datosIdentificacion FROM cr WHERE folio = '$folioDocumento'"
];

$tabla = $_GET["tabla"];

$sql = "SELECT ".$tabla.".folio, datosidentificacion.nombre_cliente, datosidentificacion.volumen, datosidentificacion.instrumento FROM ".$tabla." INNER JOIN datosidentificacion ON ".$tabla.".id_datosIdentificacion = datosidentificacion.id";

$result = $conection->query($sql);

if ($result->num_rows > 0) {
    $registros = array();

    while ($registro = $result->fetch_assoc()) {
        $registros[] = $registro;
    }

    $jsonRegistros = json_encode($registros);

    header("Content-Type: application/json");

    echo $jsonRegistros;
} else {
    echo "No se encontraron registros";
}

$conection->close();
?>