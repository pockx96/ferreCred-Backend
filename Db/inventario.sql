CREATE TABLE inventario (
codigo_producto INT NOT NULL,
cantidad INT NOT NULL,
PRIMARY KEY (codigo_producto) REFERENCES catalogo_producto(codigo)
);

CREATE TABLE inventario (codigo_producto INT NOT NULL,cantidad INT NOT NULL,FOREIGN KEY (codigo_producto) REFERENCES catalogo_producto(codigo));



select * from inventario where codigo_producto = ?;
INSERT INTO inventario VALUES(1,3);
UPDATE inventario set cantidad = 2 where codigo_producto = 1;

/* query de seleccion del inventario*/
SELECT p.codigo, p.descripcion, p.precio_compra, p.precio_venta, i.cantidad
FROM catalogo_producto p
JOIN inventario i ON p.codigo = i.codigo_producto;

SELECT p.codigo, p.descripcion, p.precio_compra, p.precio_venta, i.cantidad FROM catalogo_producto p JOIN inventario i ON p.codigo = i.codigo_producto;


INSERT INTO inventario VALUES (1,20),(2,15),(3,50),(4,30),(5,10),(6,25),(7,18),(8,12),(9,40),(10,5);

