CREATE TABLE datosIdentificacion (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre_cliente VARCHAR(40),
	volumen VARCHAR(80),
	instrumento VARCHAR(80)
);

CREATE TABLE usuario (
	id int AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(35),
	contrasenia VARCHAR(10)
);

CREATE TABLE cliente (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nombre VARCHAR(35),
	apellido_paterno VARCHAR(35),
	apellido_materno VARCHAR(35),
	telefono_particular VARCHAR(15),
	telefono_celular VARCHAR(50),
	correo TINYTEXT,
	domicilio_calle VARCHAR(30),
	domicilio_colonia VARCHAR(30),
	num_interior TINYTEXT,
	num_exterior TINYTEXT,
	codigo_postal TINYTEXT,
	rfc VARCHAR(20)
);

CREATE TABLE persona (
	id INT AUTO_INCREMENT PRIMARY KEY,
	ine TEXT,
	curp TEXT,
	rfc TEXT,
	acta_nacimiento TEXT,
	acta_matrimonio TEXT,
	comprobante_domicilio TEXT,
	recibo_agua TEXT,
	hoja_generales TEXT
);

CREATE TABLE comparecientes (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_persona INT,
	FOREIGN KEY (id_persona) REFERENCES persona(id) ON DELETE CASCADE
);

CREATE TABLE testigos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_persona INT,
	FOREIGN KEY (id_persona) REFERENCES persona(id) ON DELETE CASCADE
);

CREATE TABLE conjuntoArchivos1 (
	id INT AUTO_INCREMENT PRIMARY KEY,
	escritura TEXT,
	certificado_reserva_prioridad TEXT,
	predial TEXT
);

CREATE TABLE ccvcrd (
    folio VARCHAR(35) PRIMARY KEY,
    id_conjuntoArchivos INT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE csp (
    folio VARCHAR(35) PRIMARY KEY,
    id_conjuntoArchivos INT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)  ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id)  ON DELETE CASCADE
);

CREATE TABLE craigh (
    folio VARCHAR(35) PRIMARY KEY,
    id_conjuntoArchivos INT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)  ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id)  ON DELETE CASCADE
);

CREATE TABLE dgps (
    folio VARCHAR(35) PRIMARY KEY,
    id_conjuntoArchivos INT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE dgpsruv (
    folio VARCHAR(35) PRIMARY KEY,
    id_conjuntoArchivos INT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

/* Lista */
CREATE TABLE ctpepf (
	folio VARCHAR(35) PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id) ON DELETE CASCADE,
	FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE ccv (
    folio VARCHAR(35) PRIMARY KEY,
    id_conjuntoArchivos INT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE ccd (
    folio VARCHAR(35) PRIMARY KEY,
    id_cliente INT,
    ine TEXT,
    curp TEXT,
    rfc TEXT,
    acta_nacimiento TEXT,
    acta_matrimonio TEXT,
    comprobante_domicilio TEXT,
    recibo_agua TEXT,
    hoja_generales TEXT,
    identificacion_inmueble TEXT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);


CREATE TABLE coa (
    folio VARCHAR(35) PRIMARY KEY,
    id_cliente INT,
    ine TEXT,
    curp TEXT,
    rfc TEXT,
    acta_nacimiento TEXT,
    acta_matrimonio TEXT,
    comprobante_domicilio TEXT,
    recibo_agua TEXT,
    hoja_generales TEXT,
    identificacion_inmueble TEXT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);


CREATE TABLE uv (
    folio VARCHAR(35) PRIMARY KEY,
    escritura TEXT,
    id_comparecientes INT,
    id_cliente INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE cr (
    folio VARCHAR(35) PRIMARY KEY,
    id_comparecientes INT,
    id_cliente INT,
    tarjeta_circulacion TEXT,
    titulo_vehiculo TEXT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE paa (
    folio VARCHAR(35) PRIMARY KEY,
    id_comparecientes INT,
    id_cliente INT,
    id_datosIdentificacion INT,
    acta_empresa TEXT,
    poder TEXT,
    personalidad_empresa TEXT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE pjs (
    folio VARCHAR(35) PRIMARY KEY,
    constancia_expedida_juzgado TEXT,
    certificado_reserva_prioridad TEXT,
    predial INT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE psof (
    folio VARCHAR(35) PRIMARY KEY,
    plano TEXT,
    dictamen_subdivision TEXT,
    predial TEXT,
    certificado_reserva_prioridad TEXT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE an (
    folio VARCHAR(35) PRIMARY KEY,
    poder TEXT,
    personalidad_empresa TEXT,
    id_cliente INT,
    id_comparecientes INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE conjunto_archivos2 (
	id INT AUTO_INCREMENT PRIMARY KEY,
	escritura TEXT,
	ine TEXT,
	rfc TEXT,
	curp TEXT,
	hoja_generales TEXT
);

CREATE TABLE peyog (
    folio VARCHAR(35) PRIMARY KEY,
    id_cliente INT,
    id_archivos INT,
    id_datosIdentificacion INT,
    poderante TEXT,
    apoderado TEXT,
    datos_empresa TEXT,
    acta_constitutiva TEXT,
    poder_representante TEXT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_archivos) REFERENCES conjunto_archivos2(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE cd (
    folio VARCHAR(35) PRIMARY KEY,
    id_cliente INT,
    id_archivos INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_archivos) REFERENCES conjunto_archivos2(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE crd (
    folio VARCHAR(35) PRIMARY KEY,
    id_cliente INT,
    id_archivos INT,
    certificado_reserva_prioridad TEXT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_archivos) REFERENCES conjunto_archivos2(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE ccvp (
	folio VARCHAR(35) PRIMARY KEY,
    id_cliente INT,
	id_comparecientes INT,
	id_testigos INT,
	id_datosIdentificacion INT,
	escritura TEXT,
	predial TEXT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE,
	FOREIGN KEY (id_testigos) REFERENCES testigos(id) ON DELETE CASCADE
);

CREATE TABLE tpas (
    folio VARCHAR(35) PRIMARY KEY,
    ine TEXT,
    curp TEXT,
    rfc TEXT,
    acta_nacimiento TEXT,
    acta_matrimonio TEXT,
    hoja_generales TEXT,
    nombres_hijos TEXT,
    id_cliente INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE eas (
	folio VARCHAR(35) PRIMARY KEY,
	escritura TEXT,
	predial TEXT,
	id_cliente INT, 
    id_datosIdentificacion INT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
	FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE caa (
    folio VARCHAR(35) PRIMARY KEY,
    acta_menor TEXT,
    hoja_generales TEXT,
    acta_defuncion TEXT,
    domiclio_nuevo TEXT,
    persona_a_cargo TEXT,
    id_cliente INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE tpal (
    folio VARCHAR(35) PRIMARY KEY,
    ine TEXT,
    curp TEXT,
    rfc TEXT,
    acta_nacimiento TEXT,
    acta_matrimonio TEXT,
    hoja_generales TEXT,
    nombres_hijos TEXT,
    escritura TEXT,
    id_cliente INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE identificacion_persona (
	id INT AUTO_INCREMENT PRIMARY KEY,
	primer_documento TEXT,
	segundo_documento TEXT,
	tercer_documento TEXT
);

CREATE TABLE ean (
    folio VARCHAR(35) PRIMARY KEY,
    id_identificacionPersona INT,
    hoja_generales TEXT,
    id_cliente INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_identificacionPersona) REFERENCES identificacion_persona(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE eaec (
    folio VARCHAR(35) PRIMARY KEY,
    id_identificacionPersona INT,
    hoja_generales TEXT,
    escritura TEXT,
    id_cliente INT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_identificacionPersona) REFERENCES identificacion_persona(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE dtsn (
    folio VARCHAR(35) PRIMARY KEY,
    id_identificacionPersona INT,
    id_cliente INT,
    id_testigos INT,
    hoja_generales TEXT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_identificacionPersona) REFERENCES identificacion_persona(id) ON DELETE CASCADE,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_testigos) REFERENCES testigos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);

CREATE TABLE dtsec (
    folio VARCHAR(35) PRIMARY KEY,
    acta_matrimonio TEXT,
    id_cliente INT,
    id_testigos INT,
    hoja_generales TEXT,
    id_datosIdentificacion INT,
    FOREIGN KEY (id_cliente) REFERENCES cliente(id) ON DELETE NO ACTION,
    FOREIGN KEY (id_testigos) REFERENCES testigos(id) ON DELETE CASCADE,
    FOREIGN KEY (id_datosIdentificacion) REFERENCES datosIdentificacion(id) ON DELETE CASCADE
);