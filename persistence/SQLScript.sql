CREATE TABLE Administrator (
	idAdministrator int(11) NOT NULL AUTO_INCREMENT,
	name varchar(45) NOT NULL,
	lastName varchar(45) NOT NULL,
	email varchar(45) NOT NULL,
	password varchar(45) NOT NULL,
	picture varchar(45) DEFAULT NULL,
	phone varchar(45) DEFAULT NULL,
	mobile varchar(45) DEFAULT NULL,
	state tinyint DEFAULT NULL,
	PRIMARY KEY (idAdministrator)
);

INSERT INTO Administrator (idAdministrator, name, lastName, email, password, phone, mobile, state) VALUES 
	('1', 'administrator', 'administrator', 'admin@udistrital.edu.co', md5('123'), '123', '123', '1'); 

CREATE TABLE LogAdministrator (
	idLogAdministrator int(11) NOT NULL AUTO_INCREMENT,
	action varchar(45) NOT NULL,
	information text NOT NULL,
	date date NOT NULL,
	time time NOT NULL,
	ip varchar(45) NOT NULL,
	os varchar(45) NOT NULL,
	browser varchar(45) NOT NULL,
	administrator_idAdministrator int(11) NOT NULL,
	PRIMARY KEY (idLogAdministrator)
);

CREATE TABLE Profesor (
	idProfesor int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	correo varchar(45) DEFAULT NULL,
	huella varchar(45) DEFAULT NULL,
	PRIMARY KEY (idProfesor)
);

CREATE TABLE Area (
	idArea int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idArea)
);

CREATE TABLE Tipo (
	idTipo int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	PRIMARY KEY (idTipo)
);

CREATE TABLE Inscripcion (
	idInscripcion int(11) NOT NULL AUTO_INCREMENT,
	periodo varchar(45) NOT NULL,
	profesor_idProfesor int(11) NOT NULL,
	PRIMARY KEY (idInscripcion)
);

CREATE TABLE Horario (
	idHorario int(11) NOT NULL AUTO_INCREMENT,
	dia varchar(45) NOT NULL,
	hora varchar(45) NOT NULL,
	inscripcion_idInscripcion int(11) NOT NULL,
	PRIMARY KEY (idHorario)
);

CREATE TABLE Asignatura (
	idAsignatura int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	area_idArea int(11) NOT NULL,
	PRIMARY KEY (idAsignatura)
);

CREATE TABLE Grupo (
	idGrupo int(11) NOT NULL AUTO_INCREMENT,
	asignatura_idAsignatura int(11) NOT NULL,
	inscripcion_idInscripcion int(11) NOT NULL,
	PRIMARY KEY (idGrupo)
);

CREATE TABLE Asistencia (
	idAsistencia int(11) NOT NULL AUTO_INCREMENT,
	fecha date NOT NULL,
	profesor_idProfesor int(11) NOT NULL,
	PRIMARY KEY (idAsistencia)
);

CREATE TABLE ExcepcionPersonal (
	idExcepcionPersonal int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	profesor_idProfesor int(11) NOT NULL,
	tipo_idTipo int(11) NOT NULL,
	PRIMARY KEY (idExcepcionPersonal)
);

CREATE TABLE Excepcion (
	idExcepcion int(11) NOT NULL AUTO_INCREMENT,
	descripcion varchar(45) NOT NULL,
	tipo_idTipo int(11) NOT NULL,
	PRIMARY KEY (idExcepcion)
);

CREATE TABLE LogCoordinador (
	idLogCoordinador int(11) NOT NULL AUTO_INCREMENT,
	action varchar(45) NOT NULL,
	information text NOT NULL,
	date date NOT NULL,
	time time NOT NULL,
	ip varchar(45) NOT NULL,
	os varchar(45) NOT NULL,
	browser varchar(45) NOT NULL,
	coordinador_idCoordinador int(11) NOT NULL,
	PRIMARY KEY (idLogCoordinador)
);

CREATE TABLE Coordinador (
	idCoordinador int(11) NOT NULL AUTO_INCREMENT,
	nombre varchar(45) NOT NULL,
	apellido varchar(45) NOT NULL,
	correo varchar(45) NOT NULL,
	clave varchar(45) NOT NULL,
	state tinyint NOT NULL,
	PRIMARY KEY (idCoordinador)
);

ALTER TABLE LogAdministrator
 	ADD FOREIGN KEY (administrator_idAdministrator) REFERENCES Administrator (idAdministrator); 

ALTER TABLE Inscripcion
 	ADD FOREIGN KEY (profesor_idProfesor) REFERENCES Profesor (idProfesor); 

ALTER TABLE Horario
 	ADD FOREIGN KEY (inscripcion_idInscripcion) REFERENCES Inscripcion (idInscripcion); 

ALTER TABLE Asignatura
 	ADD FOREIGN KEY (area_idArea) REFERENCES Area (idArea); 

ALTER TABLE Grupo
 	ADD FOREIGN KEY (asignatura_idAsignatura) REFERENCES Asignatura (idAsignatura); 

ALTER TABLE Grupo
 	ADD FOREIGN KEY (inscripcion_idInscripcion) REFERENCES Inscripcion (idInscripcion); 

ALTER TABLE Asistencia
 	ADD FOREIGN KEY (profesor_idProfesor) REFERENCES Profesor (idProfesor); 

ALTER TABLE ExcepcionPersonal
 	ADD FOREIGN KEY (profesor_idProfesor) REFERENCES Profesor (idProfesor); 

ALTER TABLE ExcepcionPersonal
 	ADD FOREIGN KEY (tipo_idTipo) REFERENCES Tipo (idTipo); 

ALTER TABLE Excepcion
 	ADD FOREIGN KEY (tipo_idTipo) REFERENCES Tipo (idTipo); 


ALTER TABLE LogCoordinador
 	ADD FOREIGN KEY (coordinador_idCoordinador) REFERENCES Coordinador (idCoordinador); 

