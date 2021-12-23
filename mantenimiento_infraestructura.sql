DROP DATABASE IF EXISTS mantenimiento_infraestructura;

CREATE DATABASE IF NOT EXISTS mantenimiento_infraestructura;

USE mantenimiento_infraestructura;

CREATE TABLE tipodocumento(
    id_tipodocumento INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
    tipodocumento VARCHAR(100) NOT NULL
);
/*'Tarjeta de identidad','Cédula de ciudadanía','Cédula de extranjería','Contraseña registraduría','Pasaporte Colombiano','Pasaporte extranjero'*/

CREATE TABLE cargo(
    id_cargo INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
    tipocargo VARCHAR(100) NOT NULL
);

/*'Instructor','Administrativo','Guarda de seguridad','Servicio general','Aprendiz','Trabajador oficial'*/

CREATE TABLE imagen(
  id_imagen INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  imagen_inicio MEDIUMBLOB NOT NULL,
  imagen_final MEDIUMBLOB NOT NULL,
  tipo VARCHAR(100) NOT NULL
);

CREATE TABLE permisos(
  id_permiso INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  permisos VARCHAR(100) NOT NULL
);

CREATE TABLE plano (
  id_plano INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  lugar VARCHAR(100) NOT NULL,
  bloque ENUM('1','2','3','4','5','6','7') NOT NULL,
  id_evento INTEGER(20) NOT NULL
);

CREATE TABLE tiponovedad(
  tiponovedad_id INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  tiponovedad VARCHAR(100) NOT NULL
);

CREATE TABLE usuarios(
  usuarios_id  INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  numerodocumento INTEGER(20) UNIQUE NOT NULL,
  id_tipodocumento INTEGER(20) NOT NULL,
  nombres VARCHAR(100) NOT NULL,
  apellidos VARCHAR(100) NOT NULL,
  correo VARCHAR(100) UNIQUE NOT NULL,
  celular INTEGER(20) NOT NULL,
  usuario ENUM('Admin','User','Manteimiento','Sena') NOT NULL,
  id_cargo INTEGER(20) NOT NULL,
  id_permiso INTEGER(20) NOT NULL,
  FOREIGN KEY (id_tipodocumento) REFERENCES tipodocumento (id_tipodocumento)
        ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (id_cargo) REFERENCES cargo (id_cargo)
        ON DELETE RESTRICT ON UPDATE CASCADE           
);

CREATE TABLE eventos(
  id_evento INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  tiponovedad_id INTEGER(20) NOT NULL,
  usuarios_id INTEGER(20) NOT NULL, 
  id_plano INTEGER(20) NOT NULL,
  novedad_especifica VARCHAR(100) NOT NULL,
  fecha_novedad DATETIME NOT NULL,
  id_imagen INTEGER(20) NOT NULL
);

ALTER TABLE eventos ADD FOREIGN KEY (usuarios_id) REFERENCES usuarios(usuarios_id) ON DELETE RESTRICT ON UPDATE CASCADE,
ADD FOREIGN KEY (id_imagen) REFERENCES imagen(id_imagen) ON DELETE RESTRICT ON UPDATE CASCADE,
ADD FOREIGN KEY (id_plano) REFERENCES plano(id_plano) ON DELETE RESTRICT ON UPDATE CASCADE,
ADD FOREIGN KEY (tiponovedad_id) REFERENCES tiponovedad(tiponovedad_id) ON DELETE RESTRICT ON UPDATE CASCADE;



CREATE TABLE tiposuceso(
  tiposuceso_id INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  tiposuceso VARCHAR(100) NOT NULL,
  tiponovedad_id INTEGER(20) NOT NULL,
  FOREIGN KEY (tiponovedad_id) REFERENCES tiponovedad(tiponovedad_id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE suceso(
  suceso_id INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  suceso VARCHAR(100) NOT NULL,
  tiposuceso_id INTEGER(20) NOT NULL,
  FOREIGN KEY (tiposuceso_id) REFERENCES tiposuceso(tiposuceso_id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE agenda (
  id_agenda INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  fecha_inicio DATETIME NOT NULL,
  fecha_fin DATETIME NOT NULL,
  id_evento INTEGER(20) NOT NULL,
  FOREIGN KEY (id_evento) REFERENCES eventos(id_evento) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE ordentrabajo (
  id_orden INTEGER(20) PRIMARY KEY AUTO_INCREMENT,
  observacion VARCHAR(100) NOT NULL,
  id_evento INTEGER(20) NOT NULL,
  estado ENUM('Terminado','Incompleto') NOT NULL,
  calificacion ENUM('Mala','Buena','Excelente') NOT NULL,
  id_imagen INTEGER(20) NOT NULL,
  id_agenda INTEGER(20) NOT NULL   
);

ALTER TABLE ordentrabajo ADD FOREIGN KEY (id_evento) REFERENCES eventos(id_evento) ON DELETE RESTRICT ON UPDATE CASCADE,
ADD FOREIGN KEY (id_imagen) REFERENCES imagen(id_imagen) ON DELETE RESTRICT ON UPDATE CASCADE,
ADD FOREIGN KEY (id_agenda) REFERENCES agenda(id_agenda) ON DELETE RESTRICT ON UPDATE CASCADE;


INSERT INTO tipodocumento (id_tipodocumento, tipodocumento) VALUES
      (1, 'Tarjeta de identidad'),
      (2, 'Cédula de ciudadanía'),
      (3, 'Cédula de extranjería'),
      (4, 'Contraseña registraduría'),
      (5, 'Pasaporte Colombiano'),
      (6, 'Pasaporte extranjero');

INSERT INTO cargo (id_cargo, tipocargo) VALUES
      (1, 'Instructor'),
      (2, 'Administrativo'),
      (3, 'Guarda de seguridad'),
      (4, 'Servicio general'),
      (5, 'Aprendiz'),
      (6, 'Trabajador oficial');

INSERT INTO usuarios (usuarios_id, numerodocumento, id_tipodocumento, nombres, apellidos, 
                        correo, celular, usuario, id_cargo) VALUES
      (1, 1005188311, 2, 'Victor Manuel', 'Coley Gomez', 'vmcoleygomez@gmail.com', 3209258117, 'Admin', 2);

INSERT INTO usuarios (usuarios_id, numerodocumento, id_tipodocumento, nombres, apellidos, 
                        correo, celular, usuario, id_cargo) VALUES
      (2, 1005180617, 2, 'Nani', 'Pereira Gomez', 'hola@gmail.com', 3002930874, 'User', 1);

INSERT INTO plano (id_plano, lugar, bloque, id_evento) VALUES
      (1, 'biblioteca', 2, 1);


INSERT INTO tiponovedad (tiponovedad_id, tiponovedad ) VALUES
      (1, 'Electrico'),
      (2, 'Locativo');

INSERT INTO tiposuceso (tiposuceso_id, tiposuceso, tiponovedad_id) VALUES
      (1, 'Iluminacion',1),
      (2, 'Daños',1),
      (3, 'Red regulada',1),
      (4, 'Ubicacion de elementos',2),
      (5, 'Daños/Averias',2),
      (6, 'Orden y limpieza',2);

INSERT INTO suceso (suceso_id, suceso, tiposuceso_id) VALUES
      (1, 'Deficiente', 1),
      (2, 'No enciende', 1),
      (3, 'Exceso', 1),
      (4, 'Instalaciones y cables', 2),
      (5, 'Tomacorriente', 2),
      (6, 'Tablero de distribución', 2),
      (7, 'Instalaciones y cables de red regulada', 3),
      (8, 'Tomacorriente de red regulada', 3),
      (9, 'Tablero de distribución de red regulada', 3),
      (10, 'Mobiliario en malas condiciones', 4),
      (11, 'Estanteria o repisa mal anclada', 4),
      (12, 'Techos', 5),
      (13, 'Pisos', 5),
      (14, 'Pared', 5),
      (15, 'Puertas y ventanas', 5),
      (16, 'Unidades sanitarias', 5),
      (17, 'Barandas y pasamanos', 5),
      (18, 'Arrume de objetos', 6),
      (19, 'Falta de limpieza en materiales', 6),
      (20, 'Otros', 6);


/* INSERT INTO eventos (id_evento, novedad_id, numerodocumento, id_plano, novedad_especifica, fecha_novedad, id_imagen) VALUES
      (1, 1, 1005188311, 1, 'Toma corriente dañado', '2021-11-08 14:24:10', 1 );*/
      

/* SELECT tp.tiponovedad FROM tiponovedad AS tp INNER JOIN tiposuceso AS ts ON ts.tiponovedad_id = tp.tiponovedad_id INNER JOIN suceso AS su ON su.tiposuceso_id = ts.tiposuceso_id WHERE su.suceso = 'Deficiente';


