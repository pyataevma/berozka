CREATE TABLE tienda.productos (
  id_prod INT NOT NULL AUTO_INCREMENT , 
  nombre VARCHAR(50) NOT NULL , 
  precio DECIMAL NULL , 
  descripcion TINYTEXT NULL , 
  imagen VARCHAR(255) NULL , 
  PRIMARY KEY (id_prod)) ENGINE = InnoDB;

CREATE TABLE tienda.usuarios (
  id_usuario INT NOT NULL AUTO_INCREMENT, 
  NOMBRE VARCHAR(50) NOT NULL, 
  APELLIDO VARCHAR(50) NOT NULL, 
  EMAIL VARCHAR(50) NOT NULL, 
  CLAVE varchar(100) DEFAULT NULL,
  NIVEL enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  ESTADO enum('activo','banneado') NOT NULL DEFAULT 'activo',
  FECHA_ALTA datetime DEFAULT NULL,
  PRIMARY KEY (id_usuario)) ENGINE = InnoDB;

CREATE TABLE tienda.pedidos (
  id_pedido INT NOT NULL AUTO_INCREMENT, 
  id_usuario_fk INT NOT NULL, 
  id_producto_fk INT NOT NULL,
  cantidad INT NULL,
  PRIMARY KEY (id_pedido)) ENGINE = InnoDB;

CREATE TABLE tienda.compras (
  id_compra INT NOT NULL AUTO_INCREMENT, 
  id_usuario_fk INT NOT NULL, 
  nombre_producto varchar(50) NOT NULL,
  precio_compra INT NOT NULL,
  cantidad_compra INT NULL,
  fecha_compra datetime DEFAULT NULL,
  PRIMARY KEY (id_compra)) ENGINE = InnoDB;

INSERT INTO productos (nombre, precio, descripcion, imagen) 
VALUES ('Arenque salado', '8000', 'No es una trucha', 'arenque.jpg');

INSERT INTO productos (nombre, precio, descripcion, imagen) 
VALUES ("Pelmeni", 6000, "Un plato tradicional de la cocina rusa de bolas de carne picada rodeadas con masa", "pelmeni.jpg");
 
INSERT INTO productos (nombre, precio, descripcion, imagen) 
VALUES ('Arenque abrigado', '8000', 'Ensalada de arenque con huevos sebolla y remolacha', 'abrigado.jpg');

INSERT INTO productos (nombre, precio, descripcion, imagen) 
VALUES ('Trigo sarraceno', '5000', 'Trigo sarraceno con champiñones y zanahorias', 'trigo.jpg');

INSERT INTO productos (nombre, precio, descripcion, imagen) 
VALUES ('Panqueques', '5000', 'Panqueques con crema agria', 'panqueques.jpg');

INSERT INTO usuarios (NOMBRE, APELLIDO, EMAIL, CLAVE, NIVEL, ESTADO, FECHA_ALTA) 
VALUES ('Roberto', 'Sánchez', 'a@a', MD5('aa'), 'admin', 'activo', NOW()); 

INSERT INTO usuarios (NOMBRE, APELLIDO, EMAIL, CLAVE, NIVEL, ESTADO, FECHA_ALTA) 
VALUES ('Adriana', 'Ortiz', 'b@b', MD5('bb'), 'usuario', 'activo', NOW()); 
