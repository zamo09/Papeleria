CREATE DATABASE Papeleria; 

USE Papeleria;

CREATE TABLE Papeleria ( 
	id_Papeleria INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria', 
	nombre VARCHAR(50) NOT NULL COMMENT 'Nombre de la Papeleria', 
	activo BIT NOT NULL COMMENT 'Para saber si esta activo o no', 
	PRIMARY KEY (id_papeleria) 
);


CREATE TABLE Empresa(
	id_empresa INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
    nombre VARCHAR(10) NOT NULL COMMENT 'Nombre de la empresa', 
  	direccion VARCHAR(500) NOT NULL COMMENT 'Direccion de Facturacion',
  	activo BIT NOT NULL COMMENT 'Para saber si esta activo o no',
  	PRIMARY KEY (id_empresa)  
);

CREATE TABLE Departamentos(
	id_departamento INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
    nombre VARCHAR(50)NOT NULL COMMENT 'Nombre del departamento',
    activo BIT NOT NULL COMMENT 'Para saber si esta activo o no',
    id_empresa INT NOT NULL COMMENT 'id de la empresa a la que pertence',
    PRIMARY KEY (id_departamento),
    FOREIGN KEY (id_empresa) REFERENCES empresa (id_empresa)
);

CREATE TABLE Pedido(
	id_pedido INT NOT NULL COMMENT 'Clave Primaria',
    id_departamento INT NOT NULL COMMENT 'Es el id del departamento',
    fecha DATE NOT NULL COMMENT 'Fecha del pedido',
    id_empresa INT NOT NULL COMMENT 'Es el id de la Direccion a facturar',
    abierto BIT NOT NULL COMMENT 'Para saber si el pedido esta abierto o cerrado',
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_departamento) REFERENCES departamentos (id_departamento),
    FOREIGN KEY (id_empresa) REFERENCES empresa (id_empresa)
);

CREATE TABLE Productos(
    id_producto INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
    nombre VARCHAR(200) NOT NULL COMMENT 'Nombre de los productos',
    marca VARCHAR(50) NOT NULL COMMENT 'Marca de los productos',
    unidad VARCHAR(3) NOT NULL COMMENT 'Puede ser PZA/CAJ/UNI',
    id_papeleria INT NOT NULL COMMENT 'Llave foranea a papeleria',
    activo BIT NOT NULL COMMENT 'Para saber si esta activo',
    PRIMARY KEY (id_producto),
    FOREIGN KEY (id_papeleria) REFERENCES papeleria(id_papeleria)
);

CREATE TABLE Listado(
	id_listado INT NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
    id_producto INT NOT NULL COMMENT 'Es la referencia con el producto',
    id_pedido INT NOT NULL COMMENT 'Es la referencia con el pedido', 
    cantidad INT NOT NULL COMMENT 'Cantidad de productos a pedir',
    PRIMARY KEY (id_listado),
    FOREIGN KEY (id_producto) REFERENCES productos (id_producto),
    FOREIGN KEY (id_pedido) REFERENCES pedido (id_pedido)
);

-- Inserts para agregar una empresa
INSERT INTO empresa (nombre, direccion, activo) VALUES ('CBA', 'Av. 1 #617 Col. Centro',1);
INSERT INTO empresa (nombre, direccion, activo) VALUES ('CBC', 'Av. 4 #3 y 5 Col Centro',1);
INSERT INTO empresa (nombre, direccion, activo) VALUES ('CBC/P', 'Parque industrial atoyaquillo lote 1 Paraje nuevo Amatlan de los reyes',1);

-- Inserts para agregar un departamentoy
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Sistemas',1, 1);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Ventas',1, 1);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Autoservicios',1, 1);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Direccion',1, 1);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Planta',1, 3);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Contabilidad',1, 2);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Expendio',1, 2);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Puebla',1, 1);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Promotoria',1, 2);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Mantenimiento',1, 2);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Compras',1, 1);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Omar',1, 2);
INSERT INTO departamentos (nombre, activo, id_empresa) VALUES ('Tesoreria',1, 2);

select * from departamentos;
-- Inserts para agregar una papeleria
INSERT INTO Papeleria (nombre,activo) VALUES ('OFIX',1); 

-- Inserts para agregar un producto
INSERT INTO productos (nombre,marca,unidad,id_papeleria,activo) VALUES ('Crayolas Rojas', 'Crayola', 'PZA', 1,1);
INSERT INTO productos (nombre,marca,unidad,id_papeleria,activo) VALUES ('Marcador Grueso Bic Permanente', 'Bic', 'PZA', 1,1);
INSERT INTO productos (nombre,marca,unidad,id_papeleria,activo) VALUES ('Marcador Delgado Bic Permanente', 'Bic', 'PZA', 1,1);
INSERT INTO productos (nombre,marca,unidad,id_papeleria,activo) VALUES ('Cinta para empaque', 'Patito', 'CAJ', 1,1);
INSERT INTO productos (nombre,marca,unidad,id_papeleria,activo) VALUES ('Hojas Blancas', 'Scribe', 'PAQ', 1,1);
INSERT INTO productos (nombre,marca,unidad,id_papeleria,activo) VALUES ('Plumon para pizarron', 'Azor', 'PZA', 1,1);

-- Selects para productos
SELECT * FROM productos;
SELECT id_producto, nombre, unidad FROM productos WHERE activo = 1;

-- Select para lista de productos
SELECT Pr.nombre AS Concepto, L.cantidad AS Cantidad, Pr.unidad AS Unidad FROM productos Pr, listado L, pedido P WHERE L.id_pedido = 1 And P.id_pedido = 1 AND L.id_producto = Pr.id_producto;
Select * from listado;

Delete from listado where id_pedido = 2;
-- Insert a pedido
INSERT INTO pedido(id_pedido,id_departamento, fecha, id_empresa) VALUES (1,1, '2018/02/09', 1);

-- Insert a lista de productos
INSERT INTO listado (id_pedido,id_producto, cantidad) VALUES (1,1,5); 
INSERT INTO listado (id_pedido,id_producto, cantidad) VALUES (1,2,2); 
INSERT INTO listado (id_pedido,id_producto, cantidad) VALUES (1,4,1); 

-- Select para seleccionar el maximo folio de los pedidos
SELECT MAX(id_pedido) from pedido WHERE abierto = 1;
SELECT * FROM pedido;
DELETE from pedido;
SELECT MAX(id_pedido) from pedido WHERE abierto = 1 and id_departamento = 7; 

-- Insert para agregar un pedido
INSERT INTO pedido (id_pedido,id_departamento, fecha, id_empresa,abierto) VALUES (2,13,'18.02.12',2,0); 

-- Update para cerrar el pedido
UPDATE pedido SET abierto = 0 WHERE id_pedido = 2;

-- Delete para borrar un pedido
Delete from pedido where id_pedido = 2;

-- Select para seleccionar el nombre del departamento a trabajar
SELECT nombre FROM departamentos WHERE id_departamento =1;

-- Para seleccionar el folio activo 
SELECT MAX(id_pedido) from pedido WHERE abierto = 1 and id_departamento = 1;

UPDATE departamentos SET activo = 1 WHERE id_departamento = 1;

UPDATE pedido SET abierto = 1 WHERE id_pedido = 4;
SELECT id_empresa FROM departamentos WHERE id_departamento =3;
SELECT MAX(id_pedido) from pedido WHERE abierto = 1 and id_departamento = 3;
SELECT MAX(id_pedido) from pedido WHERE abierto = 1 and id_departamento = 12;
SELECT id_departamento FROM departamentos WHERE nombre = 'Omar';

-- Selects para Reportes --
-- Por tienda --
SELECT id_papeleria, nombre FROM papeleria WHERE activo = 1;
-- Por empresa --
SELECT id_empresa, nombre FROM empresa WHERE activo = 1;
-- Por Departamento --
SELECT id_departamento, nombre FROM departamentos WHERE activo = 1;

-- Para Hacer eñ re´prte general de por departamentos -- 
SELECT D.nombre, P.nombre, L.cantidad, P.unidad FROM departamentos D, productos P, listado L, pedido PE 
WHERE PE.id_pedido = L.id_pedido AND P.id_producto = L.id_producto AND  PE.id_departamento = D.id_departamento  AND PE.id_departamento = 2 AND PE.abierto = 0; 

-- Para hacer el reporte de todos los departamentos --
SELECT D.nombre, P.nombre, L.cantidad, P.unidad FROM departamentos D, productos P, listado L, pedido PE 
WHERE PE.id_pedido = L.id_pedido AND P.id_producto = L.id_producto AND  PE.id_departamento = D.id_departamento AND PE.abierto = 0; 

select PO.nombre,PO.marca,PO.unidad,PA.nombre FROM productos PO, papeleria PA WHERE PO.id_papeleria = PA.id_papeleria and PO.activo = 1;
