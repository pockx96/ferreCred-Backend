/// Estructura de la tabla

CREATE TABLE `productos` (
  `codigo` INT ,
  `folio` VARCHAR(50) NOT NULL,
  `peso` DECIMAL(10, 2),
  `cantidad` INT,
  `importe` DECIMAL(10, 2)
);

ALTER TABLE `productos`
CHANGE COLUMN `folio` `folio` VARCHAR(50) NOT NULL DEFAULT CONCAT('Fol.', LPAD(`codigo`, 3, '0'));

/// Query para consola

CREATE TABLE `productos` (`codigo` INT ,`folio` VARCHAR(50) NOT NULL,`peso` DECIMAL(10, 2),`cantidad` INT,`importe` DECIMAL(10, 2));


//funciones CRUD

SELECT * FROM `producto`; // solo pruebas

SELECT * FROM `producto` WHERE `folio` = 'f-001';
INSERT into producto VALUES(1,2,2,15.99);



// catalago pruebas
