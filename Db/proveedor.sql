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

// Consola
CREATE TABLE `proveedores` (`id` INT PRIMARY KEY ,`nombre_empresa` VARCHAR(255),`nombre_contacto` VARCHAR(255),`direccion` VARCHAR(255),`telefono` VARCHAR(20),`correo_electronico` VARCHAR(255),`RFC` VARCHAR(255),`deuda` DECIMAL(10, 2));

// funciones CRUD

SELECT * FROM proveedores where nombre_contacto LIKE '%?%' ;
SELECT * FROM proveedores WHERE nombre_contacto = ? ;
UPDATE proveedores SET correo_electronico = 'nuevo_correo@example.com' WHERE id = 1;
DELETE FROM proveedores WHERE id = 1;



// pruebas

INSERT INTO proveedores VALUES (1, 'ABC S.A.', 'Juan Perez', 'Av. Principal #123', '555-1234', 'jperez@abc.com', 'ABCD123456', 10000.00);
INSERT INTO proveedores VALUES (2, 'XYZ S.A.', 'Ana Garcia', 'Calle Secundaria #456', '555-5678', 'agarcia@xyz.com', 'XYZA987654', 5000.00);
INSERT INTO proveedores VALUES (3, 'DEF S.A.', 'Pedro Martinez', 'Av. Terciaria #789', '555-9012', 'pmartinez@def.com', 'DEFE123456', 7500.00);
INSERT INTO proveedores VALUES (4, 'GHI S.A.', 'Maria Lopez', 'Calle Cuarta #234', '555-3456', 'mlopez@ghi.com', 'GHIJ987654', 12000.00);
INSERT INTO proveedores VALUES (5, 'JKL S.A.', 'Ricardo Perez', 'Av. Quinta #567', '555-7890', 'rperez@jkl.com', 'JKLM123456', 8000.00);
INSERT INTO proveedores VALUES (6, 'MNO S.A.', 'Laura Ramirez', 'Calle Sexta #890', '555-1234', 'lramirez@mno.com', 'MNOA987654', 6000.00);
INSERT INTO proveedores VALUES (7, 'PQR S.A.', 'Roberto Martinez', 'Av. Septima #1234', '555-5678', 'rmartinez@pqr.com', 'PQRD123456', 9500.00);
INSERT INTO proveedores VALUES (8, 'STU S.A.', 'Claudia Garcia', 'Calle Octava #5678', '555-9012', 'cgarcia@stu.com', 'STUE987654', 3000.00);
INSERT INTO proveedores VALUES (9, 'VWX S.A.', 'Andres Lopez', 'Av. Novena #9012', '555-3456', 'alopez@vwx.com', 'VWXJ123456', 11000.00);
INSERT INTO proveedores VALUES (10, 'YZA S.A.', 'Sofia Perez', 'Calle Decima #3456', '555-7890', 'sperez@yza.com', 'YZAB987654', 4000.00);

