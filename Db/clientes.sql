/// Estructura de la tabla

CREATE TABLE `clientes` (
    `nombreCliente` varchar(50) PRIMARY KEY NOT NULL,
    `direccion` varchar(100) NOT NULL,
    `telefono` varchar(20) NOT NULL,
    `limiteCredito` decimal(10,2) NOT NULL,
    `saldoActual` decimal(10,2) NOT NULL,
    `correoCliente` varchar(50) NOT NULL
);


/// Query para consola

CREATE TABLE `clientes` ( `nombreCliente` varchar(50) PRIMARY KEY NOT NULL,`direccion` varchar(100) NOT NULL,`telefono` varchar(20) NOT NULL, `limiteCredito` decimal(10,2) NOT NULL,`saldoActual` decimal(10,2) NOT NULL,`correoCliente` varchar(50) NOT NULL);

// Funciones CRUD

select * from clientes;
select * from clientes where nombreCliente =  'Juan Perez';
UPDATE clientes SET limiteCredito = 15000.00 WHERE nombreCliente = 'Juan Perez';
UPDATE cliente SET saldoActual = ? WHERE nombreCliente = ?;
DELETE FROM clientes WHERE nombreCliente = 'Juan Perez';



// Catalogo de pruebas

INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Juan Pérez', 'Calle 1 #123', '555-1234', 1000.00, 500.00, 'juanperez@gmail.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('María González', 'Av. 2 #456', '555-5678', 2000.00, 1500.00, 'mariagonzalez@hotmail.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Pedro Ramírez', 'Calle 3 #789', '555-9012', 5000.00, 3500.00, 'pedroramirez@yahoo.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Ana López', 'Av. 4 #1011', '555-1314', 3000.00, 1000.00, 'anlopez@gmail.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Luis García', 'Calle 5 #1213', '555-1516', 2500.00, 2000.00, 'luisgarcia@hotmail.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Carmen Torres', 'Av. 6 #1719', '555-1920', 4000.00, 3000.00, 'carmen_torres@yahoo.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Jorge Vargas', 'Calle 7 #2123', '555-2324', 1500.00, 500.00, 'jvargas@gmail.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Isabel Ortiz', 'Av. 8 #2527', '555-2728', 6000.00, 4500.00, 'isabelortiz@hotmail.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Ricardo González', 'Calle 9 #2931', '555-3132', 8000.00, 7000.00, 'rigonzalez@yahoo.com');
INSERT INTO clientes (nombreCliente, direccion, telefono, limiteCredito, saldoActual, correoCliente) VALUES ('Laura Pérez', 'Av. 10 #3335', '555-3536', 10000.00, 9000.00, 'lauraperez@gmail.com');
