CREATE TABLE bitacora (
     Usuario VARCHAR(50), 
     Proceso VARCHAR(50),
     Estatus BOOLEAN,
     Fecha_Hora VARCHAR(50)  
    );

CREATE TABLE bitacora (Usuario VARCHAR(50),Proceso VARCHAR(50),Estatus BOOLEAN,Fecha_Hora VARCHAR(50) ,FOREIGN KEY (Usuario) REFERENCES usuarios(correoUsuario));

INSERT INTO bitacora (Usuario, Proceso, Estatus, Fecha_Hora) VALUES ('juan@example.com', 'Inicio de sesión', true, '2023-04-24 09:00:00'),('maria@example.com', 'Búsqueda de producto', true, '2023-04-24 10:15:00'),('pedro@example.com', 'Agregar producto al carrito', true, '2023-04-24 11:30:00'),('ana@example.com', 'Realizar compra', true, '2023-04-24 12:45:00'),('juan@example.com', 'Cerrar sesión', true, '2023-04-24 14:00:00'),('maria@example.com', 'Editar perfil', true, '2023-04-25 10:00:00'),('pedro@example.com', 'Agregar producto al inventario', true, '2023-04-25 11:30:00'),('ana@example.com', 'Eliminar producto del carrito', true, '2023-04-25 13:45:00'),('juan@example.com', 'Realizar búsqueda avanzada', true, '2023-04-26 09:30:00'),('maria@example.com', 'Agregar comentario en el blog', true, '2023-04-26 11:00:00');
