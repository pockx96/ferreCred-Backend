CREATE TABLE `usuarios` (
  `correoUsuario` varchar(50) PRIMARY KEY,
  `nombreUsuario` varchar(50) NOT NULL,
  `contraseñaUsuario` varchar(50) NOT NULL,
);

CREATE TABLE `usuarios` (`nombreUsuario` varchar(50) NOT NULL,`contraseñaUsuario` varchar(50) NOT NULL,`correoUsuario` varchar(50) PRIMARY KEY);


select * from usuarios where correo_electronico = '?';
DELETE from usuarios where correo_electronico = '?'
INSERT into usuarios VALUES('','','');

INSERT INTO usuarios (correoUsuario, nombreUsuario, contraseñaUsuario) VALUES ('juan@example.com', 'Juan', 'contraseña123'),('maria@example.com', 'María', 'contraseña456'),('pedro@example.com', 'Pedro', 'contraseña789'),('ana@example.com', 'Ana', 'contraseña012');
