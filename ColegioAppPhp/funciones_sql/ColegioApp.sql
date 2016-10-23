-- Table: Curso_Prueba

CREATE SEQUENCE curso_prueba_id_seq;

CREATE TABLE Curso_Prueba (
    id  integer DEFAULT nextval('curso_prueba_id_seq') NOT NULL,
    curso VARCHAR (255) NOT NULL,
    CONSTRAINT pk_curso_prueba PRIMARY KEY (
        id
    )
);

INSERT INTO Curso_Prueba (id, curso) VALUES (nextval('curso_prueba_id_seq'), '2º Medio');
INSERT INTO Curso_Prueba (id, curso) VALUES (nextval('curso_prueba_id_seq'), '8º Basico');
INSERT INTO Curso_Prueba (id, curso) VALUES (nextval('curso_prueba_id_seq'), '4º Basico');

-- Table: Prueba_Simce

CREATE SEQUENCE prueba_simce_id_seq;

CREATE TABLE Prueba_Simce (
	id integer DEFAULT nextval('prueba_simce_id_seq') NOT NULL,
    "año"   INT NOT NULL,
    curso INT NOT NULL,
    CONSTRAINT pk_prueba_simce PRIMARY KEY (id),
    CONSTRAINT fk_curso_prueba FOREIGN KEY (curso)
		REFERENCES Curso_Prueba (id) 
);

INSERT INTO Prueba_Simce (id,"año", curso) VALUES (nextval('prueba_simce_id_seq'),2011, 1);
INSERT INTO Prueba_Simce (id,"año", curso) VALUES (nextval('prueba_simce_id_seq'),2011, 2);
INSERT INTO Prueba_Simce (id,"año", curso) VALUES (nextval('prueba_simce_id_seq'),2011, 3);

-- Table: Dependencia

CREATE SEQUENCE dependencia_id_seq;

CREATE TABLE Dependencia (
    id  integer DEFAULT nextval('dependencia_id_seq') NOT NULL,
    descripcion VARCHAR (255) NOT NULL,
    CONSTRAINT pk_dependencia PRIMARY KEY (
        id
    )
);

INSERT INTO Dependencia (id, descripcion) VALUES (nextval('dependencia_id_seq'), 'Municipal');
INSERT INTO Dependencia (id, descripcion) VALUES (nextval('dependencia_id_seq'), 'Particular Subvencionado');
INSERT INTO Dependencia (id, descripcion) VALUES (nextval('dependencia_id_seq'), 'Particular Pagado');
INSERT INTO Dependencia (id, descripcion) VALUES (nextval('dependencia_id_seq'), 'Otro');

-- Table: Mensualidad

CREATE SEQUENCE mensualidad_id_seq;

CREATE TABLE Mensualidad (
    id integer DEFAULT nextval('mensualidad_id_seq') NOT NULL,
    descripcion VARCHAR (255) NOT NULL,
    CONSTRAINT pk_mensualidad PRIMARY KEY (
        id
    )
);

INSERT INTO Mensualidad (id, descripcion) VALUES (nextval('mensualidad_id_seq'), 'Gratuito');
INSERT INTO Mensualidad (id, descripcion) VALUES (nextval('mensualidad_id_seq'), 'De $1.000 a $10.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (nextval('mensualidad_id_seq'), 'De $25.001 a $50.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (nextval('mensualidad_id_seq'), 'De $50.001 a $100.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (nextval('mensualidad_id_seq'), 'Mas de $100.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (nextval('mensualidad_id_seq'), 'De $10.001 a $25.000');
INSERT INTO Mensualidad (id, descripcion) VALUES (nextval('mensualidad_id_seq'), 'Sin informacion');

-- Table: Colegio

CREATE SEQUENCE colegio_id_seq;

CREATE TABLE Colegio (
    id integer DEFAULT nextval('colegio_id_seq') NOT NULL,
    nombreColegio    VARCHAR (255) NOT NULL,
    nombreDirector   VARCHAR (255) NOT NULL,
    nombreSostenedor VARCHAR (255) NOT NULL,
    idMensualidad    INT           NOT NULL,
    idDependencia    INT           NOT NULL,
    CONSTRAINT pk_colegio PRIMARY KEY (
        id
    ),
    CONSTRAINT fk_mensualidad FOREIGN KEY (
        idMensualidad
    )
    REFERENCES Mensualidad (id),
    CONSTRAINT fk_dependencia FOREIGN KEY (
        idDependencia
    )
    REFERENCES Dependencia (id) 
);

INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (nextval('colegio_id_seq'), 'Colegio Bordemar', 'Veronica Grace', 'C.E.C.A.L. Ltda.', 1, 2);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (nextval('colegio_id_seq'), 'Colegio Particular Junior School 2', 'Patricio Alegria', 'Sociedad Educacion Junior School Ltda', 2, 2);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (nextval('colegio_id_seq'), 'Seminario San Rafael', 'Jose Latorre', 'Sin informacion', 6, 3);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (nextval('colegio_id_seq'), 'Centro Educativo Reino de Suecia', 'Rene Cardenas', 'Corp. Munic. de Valparaiso para el Des. Soc.', 1, 1);
INSERT INTO Colegio (id, nombreColegio, nombreDirector, nombreSostenedor, idMensualidad, idDependencia) VALUES (nextval('colegio_id_seq'), 'Escuela America', 'Miguel Ramirez', 'Corp. Munic. de Valparaiso para el Des. Soc.', 1, 1);

-- Table: AplicacionPrueba

CREATE SEQUENCE aplicacionprueba_id_seq;

CREATE TABLE AplicacionPrueba (
    id integer DEFAULT nextval('aplicacionprueba_id_seq') NOT NULL,
    puntaje   INT NOT NULL,
    idColegio INT NOT NULL,
    idPrueba      INT NOT NULL,
    CONSTRAINT pk_aplicacionprueba PRIMARY KEY (
        id
    ),
    CONSTRAINT fk_colegio FOREIGN KEY (
        idColegio
    )
    REFERENCES Colegio (id),
    CONSTRAINT fk_prueba_simce FOREIGN KEY (
        idPrueba
    )
    REFERENCES Prueba_Simce (id) 
);

INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 301, 1, 1);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 250, 1, 2);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 294, 1, 3);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 200, 2, 1);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 214, 2, 2);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 310, 2, 3);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 292, 3, 1);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 309, 3, 2);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 256, 3, 3);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 159, 4, 1);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 125, 4, 2);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 300, 4, 3);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 179, 5, 1);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 100, 5, 2);
INSERT INTO AplicacionPrueba (id, puntaje, idColegio, idPrueba) VALUES (nextval('aplicacionprueba_id_seq'), 299, 5, 3);

-- Table: AplicacionPrueba

CREATE SEQUENCE usuario_idusuario_seq;

CREATE TABLE usuario (
  idusuario integer NOT NULL DEFAULT nextval('usuario_idusuario_seq'::regclass),
  username character varying(25) NOT NULL,
  nombre character varying(25) NOT NULL,
  apellido character varying(25) NOT NULL,
  sexo character varying(25) NOT NULL,
  email character varying(50) NOT NULL,
  "contraseña" character varying(10) NOT NULL,
  CONSTRAINT pk_usuario PRIMARY KEY (idusuario),
  CONSTRAINT u_email UNIQUE (email),
  CONSTRAINT u_username UNIQUE (username)
);

---------------------FUNCIONES PARA EL INGRESO -----------------
--Verifica que corresponda el password y el mail
CREATE OR REPLACE FUNCTION verificar_usuario(id text, pass text) RETURNS BOOLEAN AS $$
DECLARE
BEGIN
		IF (select contraseña FROM usuario WHERE username=$1)=$2 THEN
			RETURN TRUE;
		ELSE
			RETURN FALSE;
		END IF;
END;
$$ LANGUAGE plpgsql;

--Verifica que el mail ingresado no exista, para poder hacer el cambio de email o crear el usuario nuevo
CREATE OR REPLACE FUNCTION verificar_email(mail text) RETURNS BOOLEAN AS $$
	BEGIN
		IF(select email FROM usuario WHERE email=$1)=$1 THEN
			RETURN TRUE;
		ELSE
			RETURN FALSE;
		END IF;
	END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION verificar_pass(id text, pass text) RETURNS BOOLEAN AS $$
	BEGIN
		IF(select contraseña FROM usuario WHERE username=$1)=$2 THEN
			RETURN TRUE;
		ELSE
			RETURN FALSE;
		END IF;
	END;
$$ LANGUAGE plpgsql;

------------------------------FUNCIONES PARA USUARIO-----------------------

CREATE OR REPLACE FUNCTION crear_usuario(username text, nombre text, apellido text, sexo text, mail text, pass text) RETURNS BOOLEAN AS $$
BEGIN
	INSERT INTO usuario (idusuario,username,nombre,apellido,sexo,email,contraseña) VALUES (nextval('usuario_idusuario_seq'),$1,$2,$3,$4,$5,$6);
	IF(select email FROM usuario WHERE email=$5)=$5 THEN
			RETURN TRUE;
	ELSE
		RETURN FALSE;
	END IF;
END;
$$ LANGUAGE plpgsql;
