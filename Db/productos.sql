/// Estructura de la tabla

CREATE TABLE `productos` (
  `codigo` INT PRIMARY KEY,
  `folio` VARCHAR(50) ,
  `unidad` VARCHAR(50),
  `cantidad` INT,
  `importe` DECIMAL(10, 2)
);

/// Query para consola

CREATE TABLE `productos` (`codigo` INT PRIMARY KEY,`folio` VARCHAR(50) ,`unidad` DECIMAL(10, 2),`cantidad` INT,`importe` DECIMAL(10, 2));



//funciones CRUD

SELECT * FROM `producto`; // solo pruebas

SELECT * FROM `producto` WHERE `folio` = 'f-001';
INSERT into producto VALUES(1,'f-001',2,2,15.99);



// catalago pruebas
