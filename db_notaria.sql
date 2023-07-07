/* fileValue.addEventListener("click", ()=>{
        let pdfFile = fileUpload.files[0]
        let pdfURL = URL.createObjectURL(pdfFile)
        
        pdfViewer.setAttribute("src", pdfURL)
        setTimeout(()=>{
            popupContainer.classList.remove("hide-popup")
        }, 500)
}) */

CREATE TABLE usuario (
	id INT AUTO_INCREMENT PRIMARY KEY,
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
	rfc VARCHAR(20),
	folio VARCHAR(10)
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
	FOREIGN KEY (id_persona) REFERENCES persona(id)
);

CREATE TABLE testigos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_persona INT,
	FOREIGN KEY (id_persona) REFERENCES persona(id)
);

CREATE TABLE conjuntoArchivos1 (
	id INT AUTO_INCREMENT PRIMARY KEY,
	escritura TEXT,
	certificado_reserva_prioridad TEXT,
	predial TEXT
);

CREATE TABLE ccvcrd (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)
);

CREATE TABLE csp (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)
);

CREATE TABLE craigh (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)
);

CREATE TABLE dgps (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)
);

CREATE TABLE dgpsruv (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)
);

CREATE TABLE ctpepf (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)
);

CREATE TABLE ccv (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_conjuntoArchivos INT,
	id_cliente INT,
	id_comparecientes INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_conjuntoArchivos) REFERENCES conjuntoArchivos1(id)
);

CREATE TABLE ccd (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_cliente INT,
	id_persona INT,
	identificacion_inmueble TEXT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_persona) REFERENCES persona(id)
);

CREATE TABLE coa (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_cliente INT,
	id_persona INT,
	identificacion_inmueble TEXT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_persona) REFERENCES persona(id)
);

CREATE TABLE uv (
	id INT AUTO_INCREMENT PRIMARY KEY,
	escritura TEXT,
	id_comparecientes INT,
	id_cliente INT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id)
);

CREATE TABLE cr (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_comparecientes INT,
	id_cliente INT,
	tarjeta_circulacion TEXT,
	titulo_vehiculo TEXT,
	id_usuario INT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id)
);

CREATE TABLE paa (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_comparecientes INT,
	id_cliente INT,
	id_usuario INT,
	acta_empresa TEXT,
	poder TEXT,
	personalidad_empresa TEXT,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id),
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id)
);

CREATE TABLE pjs (
	id INT AUTO_INCREMENT PRIMARY KEY,
	constancia_expedida_juzgado TEXT,
	certificado_reserva_prioridad TEXT,
	predial INT,
	id_cliente INT,
	id_comparecientes INT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id)
);

CREATE TABLE psof (
	id INT AUTO_INCREMENT PRIMARY KEY,
	plano TEXT,
	dictamen_subdivision TEXT,
	predial TEXT,
	certificado_reserva_prioridad TEXT,
	id_cliente INT,
	id_comparecientes INT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id)
);

CREATE TABLE an (
	id INT AUTO_INCREMENT PRIMARY KEY,
	poder TEXT,
	personalidad_empresa TEXT,
	id_cliente INT,
	id_comparecientes INT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_comparecientes) REFERENCES comparecientes(id)
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
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_cliente INT,
	id_archivos INT,
	poderante TEXT,
	apoderado TEXT,
	datos_empresa TEXT,
	acta_constitutiva TEXT,
	poder_representante TEXT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_archivos) REFERENCES conjunto_archivos2(id)
);

CREATE TABLE cd (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_cliente INT,
	id_archivos INT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_archivos) REFERENCES conjunto_archivos2(id)
);

CREATE TABLE crd (
	id INT AUTO_INCREMENT PRIMARY KEY,
	id_cliente INT,
	id_archivos INT,
	certificado_reserva_prioridad TEXT,
	FOREIGN KEY (id_cliente) REFERENCES cliente(id),
	FOREIGN KEY (id_archivos) REFERENCES conjunto_archivos2(id)
);

