// Estructura

CREATE TABLE `compras` (
  `folio` VARCHAR(50) PRIMARY KEY,
  `fecha` VARCHAR(10),
  `cliente` VARCHAR(50),
  `tipo_nota` VARCHAR(50),
  `deuda` DECIMAL(10, 2),
  `total` DECIMAL(10, 2)
);

// Consola

CREATE TABLE `compras` (`folio` VARCHAR(50) PRIMARY KEY,`fecha` VARCHAR(50),`cliente` VARCHAR(50),`tipo_nota` VARCHAR(50),`total` DECIMAL(10, 2));

// funciones CRUD

SELECT * FROM Compras; // solo pruebas

SELECT * FROM Compras WHERE cliente = 'Juan Perez';
SELECT * FROM Compras WHERE fecha = ?;



// pruebas
set @Contador = (SELECT COUNT(*) FROM compras);
INSERT INTO compras 
VALUES (CONCAT('Fol.', LPAD( (@Contador+1), 3, '0')),NOW(),"OTRO JUAN",'credito',420.00);
