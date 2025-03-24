CREATE TABLE entradas (
  `codigo_producto` VARCHAR(50) NOT NULL,
  `cantidad` INT NOT NULL,
  `fecha_entrada` VARCHAR(50) NOT NULL,
  `proveedor` VARCHAR(50) NOT NULL
);

//consola 
CREATE TABLE entradas ( `codigo_producto` VARCHAR(50) NOT NULL,`cantidad` INT NOT NULL,`fecha_entrada` VARCHAR(50) NOT NULL,`proveedor` VARCHAR(50) NOT NULL);


// funciones CRUD

SELECT * FROM entradas; // solo pruebas

INSERT INTO entradas VALUES('1',3,'13/04/2023','YZA S.A.');
select * from entradas where proveedor = ?;

