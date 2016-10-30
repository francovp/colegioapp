--
-- File generated with SQLiteStudio v3.1.0 on lu. oct. 24 17:09:12 2016
--
-- Text encoding used: System
--
PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: Curso_Prueba
DROP TABLE IF EXISTS Curso_Prueba;
CREATE TABLE Curso_Prueba
(
  id INT NOT NULL,
  curso VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO Curso_Prueba (id, curso) VALUES (1, '2º Medio');
INSERT INTO Curso_Prueba (id, curso) VALUES (2, '8º Basico');
INSERT INTO Curso_Prueba (id, curso) VALUES (3, '4º Basico');

-- Table: Prueba_Simce
DROP TABLE IF EXISTS Prueba_Simce;
CREATE TABLE Prueba_Simce
(
  id INT NOT NULL,
  año INT NOT NULL,
  curso INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (curso) REFERENCES Curso_Prueba(id)
);
INSERT INTO Prueba_Simce (id, año, curso) VALUES (1, 2011, 1);
INSERT INTO Prueba_Simce (id, año, curso) VALUES (2, 2011, 2);
INSERT INTO Prueba_Simce (id, año, curso) VALUES (3, 2011, 3);

-- Table: Mensualidad
DROP TABLE IF EXISTS Mensualidad;
CREATE TABLE Mensualidad
(
  id INT NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO Mensualidad (id, descripcion) VALUES (1, 'Gratuito');
INSERT INTO Mensualidad (id, descripcion) VALUES (2, 'De $1.000 a $10.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (4, 'De $25.001 a $50.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (5, 'De $50.001 a $100.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (6, 'Mas de $100.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (3, 'De $10.001 a $25.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (7, 'Sin informacion');

-- Table: Colegio
DROP TABLE IF EXISTS Colegio;
CREATE TABLE Colegio
(
  id INT NOT NULL,
  nombreColegio VARCHAR(255) NOT NULL,
  nombreDirector VARCHAR(255) NOT NULL,
  nombreSostenedor VARCHAR(255) NOT NULL,
  idMensualidad INT NOT NULL,
  idDependencia INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (idMensualidad) REFERENCES Mensualidad(id),
  FOREIGN KEY (idDependencia) REFERENCES Dependencia(id)
);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (1, 'Colegio Bordemar', 'Veronica Grace', 'C.E.C.A.L. Ltda.', 1, 2);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (2, 'Colegio Particular Junior School 2', 'Patricio Alegria', 'Sociedad Educacion Junior School Ltda', 2, 2);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (3, 'Seminario San Rafael', 'Jose Latorre', 'Sin informacion', 6, 3);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (4, 'Centro Educativo Reino de Suecia', 'Rene Cardenas', 'Corp. Munic. de Valparaiso para el Des. Soc.', 1, 1);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (5, 'Escuela America', 'Miguel Ramirez', 'Corp. Munic. de Valparaiso para el Des. Soc.', 1, 1);

-- Table: AplicaciónPrueba
DROP TABLE IF EXISTS AplicaciónPrueba;
CREATE TABLE AplicaciónPrueba
(
  id INT NOT NULL,
  puntaje INT NOT NULL,
  idColegio INT NOT NULL,
  idPrueba INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (idColegio) REFERENCES Colegio(id),
  FOREIGN KEY (idPrueba) REFERENCES Prueba_Simce(id)
);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (1, 301, 1, 1);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (2, 250, 1, 2);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (3, 294, 1, 3);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (4, 200, 2, 1);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (5, 214, 2, 2);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (6, 310, 2, 3);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (7, 292, 3, 1);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (8, 309, 3, 2);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (9, 256, 3, 3);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (10, 159, 4, 1);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (11, 125, 4, 2);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (12, 300, 4, 3);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (13, 179, 5, 1);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (14, 100, 5, 2);
INSERT INTO AplicaciónPrueba (id, puntaje, idColegio, idPrueba) VALUES (15, 299, 5, 3);

-- Table: Dependencia
DROP TABLE IF EXISTS Dependencia;
CREATE TABLE Dependencia
(
  id INT NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
INSERT INTO Dependencia (id, descripcion) VALUES (1, 'Municipal');
INSERT INTO Dependencia (id, descripcion) VALUES (2, 'Particular Subvencionado');
INSERT INTO Dependencia (id, descripcion) VALUES (3, 'Particular Pagado');
INSERT INTO Dependencia (id, descripcion) VALUES (4, 'Otro');

-- Table: usuario
DROP TABLE IF EXISTS Usuario;
CREATE TABLE Usuario (
  id INT NOT NULL,
  username VARCHAR(25) NOT NULL,
  nombre VARCHAR(25) NOT NULL,
  apellido VARCHAR(25) NOT NULL,
  sexo VARCHAR(25) NOT NULL,
  email VARCHAR(50) NOT NULL,
  "contraseña" VARCHAR(10) NOT NULL,
  PRIMARY KEY (id)
);

-- Table: ListaColegios
DROP TABLE IF EXISTS ListaColegios;
CREATE TABLE ListaColegios
(
  id integer PRIMARY KEY,
  nombreColegio VARCHAR(255) NOT NULL,
  nombreSostenedor VARCHAR(255) NOT NULL,
  nombreDirector VARCHAR(255) NOT NULL,
  mensualidad VARCHAR(255) NOT NULL,
  dependencia VARCHAR(255) NOT NULL
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;
