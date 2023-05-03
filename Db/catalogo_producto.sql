CREATE TABLE `catalogo_producto` (
  `codigo` INT PRIMARY KEY,
  `descripcion` VARCHAR(255),
  `precio_compra` DECIMAL(10, 2),
  `precio_venta` DECIMAL(10, 2),
  `tipo` VARCHAR(50)
);


//Consola
CREATE TABLE `catalogo_producto` (`codigo` INT PRIMARY KEY,`descripcion` VARCHAR(50),`precio_compra` DECIMAL(10, 2),`precio_venta` DECIMAL(10, 2),`tipo` VARCHAR(50));

//funciones CRUD
select * from catalogo_producto;
select * from catalogo_producto where codigo = 1;
SELECT * FROM catalogo_producto WHERE descripcion LIKE '%tornillos%';
INSERT into catalogo_producto VALUES(1,'martillo',15,16,'unitario');
DELETE * from catalogo_producto where codigo = 1;


INSERT INTO catalogo_producto (codigo, descripcion, precio_compra, precio_venta, tipo) VALUES (1, 'Martillo', 10.00, 20.00, 'Herramientas'),(2, 'Destornillador', 5.00, 12.00, 'Herramientas'),(3, 'Taladro', 50.00, 100.00, 'Herramientas'),(4, 'Sierra eléctrica', 75.00, 150.00, 'Herramientas'),(5, 'Pintura blanca', 20.00, 35.00, 'Pinturas'),(6, 'Pintura verde', 25.00, 40.00, 'Pinturas'),(7, 'Cemento', 8.00, 12.00, 'Materiales de construcción'),(8, 'Ladrillos', 1.50, 3.00, 'Materiales de construcción'),(9, 'Pala', 12.00, 25.00, 'Herramientas'),(10, 'Carretilla', 25.00, 50.00, 'Herramientas');

