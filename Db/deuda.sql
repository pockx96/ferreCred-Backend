/// Estructura de la tabla

CREATE TABLE `deuda` ( 
    `cliente` VARCHAR(50) PRIMARY KEY NOT NULL,
    `total` DECIMAL(10, 2),
    `adeudo` DECIMAL(10, 2)
);


/// Query para consola

CREATE TABLE `deuda` ( `cliente` VARCHAR(50) PRIMARY KEY NOT NULL,`total` DECIMAL(10, 2),`adeudo` DECIMAL(10, 2));


/// Funciones CRUD

SELECT * FROM deuda; 
SELECT * FROM deuda WHERE folio = 1;
select * from deuda where cliente =?;
UPDATE deuda SET adeudo = 250.00 WHERE folio = 1;
DELETE FROM deuda WHERE folio = 1;
INSERT into deuda VALUES("f-001","17-04-2023","juan perez",100,100);


/// pruebas

