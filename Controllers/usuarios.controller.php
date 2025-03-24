<?php

    class usuarioController{
        
        /// Metodo para obtener todos los usuarios
        public static function getAll(){
            $sqlString = "SELECT * FROM usuarios"; /// Consulta sql
            $query = flight::db()->prepare($sqlString);// Objeto flight que ejecuta las consultas
            $query->execute(); // ejecucion de la consulta
            $ListaUsuarios = $query ->fetchAll(); // enlistado de la peticion 
            Flight::json($ListaUsuarios); // devolucion json
        }

        public static function get($correoUsuario){
            $sqlString = "SELECT * FROM usuarios WHERE correoUsuario = ?";
            $query = Flight::db()->prepare($sqlString);
            $query->bindParam(1,$correoUsuario);
            $query->execute();
            $usuario = $query ->fetchAll(); 
        
            Flight::json($usuario);
        }
        

        public static function post(){
            $request = Flight::request();
            $nombreUsuario = $request->data->nombreUsuario;
            $contraseñaUsuario = $request->data->contraseñaUsuario;
            $correoUsuario = $request->data->correoUsuario;
            $sql = "INSERT INTO `usuarios`(`nombreUsuario`, `contraseñaUsuario`, `correoUsuario`) VALUES (?,?,?)";
            $query = Flight::db()->prepare($sql);
        
            $query->bindParam(1,$nombreUsuario);
            $query->bindParam(2,$contraseñaUsuario);
            $query->bindParam(3,$correoUsuario);
            $query->execute();
            Flight::json(["Usuario creado exitosamente"]);
        }

        public static function delete(){
            $nombreUsuario = (Flight::request()->data->nombreUsuario);
            $sql ="DELETE FROM `usuarios` WHERE `nombreUsuario`=?";
            
            $query = Flight::db()->prepare($sql);
            $query->bindParam(1,$nombreUsuario);
            $query->execute();
            Flight::json(["Usuario eliminado exitosamente"]);
        }

        public static function put(){
            $request = Flight::request();
            $nombreUsuario = $request->data->nombreUsuario;
            $contraseñaUsuario = $request->data->contraseñaUsuario;
            $correoUsuario = $request->data->correoUsuario;
        
            $sql = "UPDATE usuarios SET nombreUsuario=?,contraseñaUsuario=? WHERE correoUsuario=?";
            $query = Flight::db()->prepare($sql);
            $query->bindParam(1,$contraseñaUsuario);
            $query->bindParam(2, $correoUsuario);
            $query->bindParam(3, $nombreUsuario);
            $query->execute();
            header("Access-Control-Allow-Origin: *");
            Flight::json(["message" => "Usuario actualizado exitosamente"]);
        }
    }

