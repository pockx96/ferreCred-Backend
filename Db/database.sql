CREATE TABLE bitacora (
     Usuario VARCHAR(50), 
     Proceso VARCHAR(50),
     Estatus BOOLEAN,
     Fecha_Hora VARCHAR(50)  
    );

CREATE TABLE `catalogo_producto` (
  `codigo` INT PRIMARY KEY,
  `descripcion` VARCHAR(255),
  `precio_compra` DECIMAL(10, 2),
  `precio_venta` DECIMAL(10, 2),
  `tipo` VARCHAR(50)
);

CREATE TABLE `clientes` (
    `nombreCliente` varchar(50) PRIMARY KEY NOT NULL,
    `direccion` varchar(100) NOT NULL,
    `telefono` varchar(20) NOT NULL,
    `limiteCredito` decimal(10,2) NOT NULL,
    `saldoActual` decimal(10,2) NOT NULL,
    `correoCliente` varchar(50) NOT NULL
);

CREATE TABLE `compras` (
  `folio` VARCHAR(50) PRIMARY KEY,
  `fecha` VARCHAR(10),
  `cliente` VARCHAR(50),
  `tipo_nota` VARCHAR(50),
  `total` DECIMAL(10, 2)
);

CREATE TABLE `Deuda` ( 
    `folio` INT PRIMARY KEY NOT NULL,
    `fecha` VARCHAR(10),
    `cliente` VARCHAR(50),
    `total` DECIMAL(10, 2),
    `adeudo` DECIMAL(10, 2)
);

CREATE TABLE entradas (
  `codigo_producto` VARCHAR(50) NOT NULL,
  `cantidad` INT NOT NULL,
  `fecha_entrada` VARCHAR(50) NOT NULL,
  `proveedor` VARCHAR(50) NOT NULL
);

CREATE TABLE inventario (
codigo_producto INT NOT NULL,
cantidad INT NOT NULL,
FOREIGN KEY (codigo_producto) REFERENCES catalogo_producto(codigo)
);

CREATE TABLE `productos` (
  `codigo` INT PRIMARY KEY,
  `folio` VARCHAR(50) ,
  `unidad` VARCHAR(50),
  `cantidad` INT,
  `importe` DECIMAL(10, 2)
);

CREATE TABLE `proveedores` (
  `id` INT PRIMARY KEY ,
  `nombre_empresa` VARCHAR(255),
  `nombre_contacto` VARCHAR(255),
  `direccion` VARCHAR(255),
  `telefono` VARCHAR(20),
  `correo_electronico` VARCHAR(255),
  `RFC` VARCHAR(255),
  `deuda` DECIMAL(10, 2)
);

CREATE TABLE `usuarios` (
  `correoUsuario` varchar(50) PRIMARY KEY,
  `nombreUsuario` varchar(50) NOT NULL,
  `contraseñaUsuario` varchar(50) NOT NULL
);