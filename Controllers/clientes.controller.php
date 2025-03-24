<?php

    class clienteController{
        
        /// Metodo para obtener todos los usuarios
        public static function getAll(){
            $sqlString = "SELECT * FROM clientes"; /// Consulta sql
            $query = flight::db()->prepare($sqlString);// Objeto flight que ejecuta las consultas
            $query->execute(); // ejecucion de la consulta
            $Listaclientes = $query ->fetchAll(); // enlistado de la peticion 
            Flight::json($Listaclientes); // devolucion json
        }

        public static function get($correoCliente){
            $sqlString = "SELECT * FROM clientes WHERE correoCliente = ?";
            $query = Flight::db()->prepare($sqlString);
            $query->bindParam(1,$correoCliente);
            $query->execute();
            $cliente = $query ->fetchAll(); 
        
            Flight::json($cliente);
        }
        

        public static function post(){
            $request = Flight::request();
            $nombreCliente = $request->data->nombreCliente;
            $direccion = $request->data->direccion;
            $telefono = $request->data->telefono;
            $limiteCredito = $request->data->limiteCredito;
            $saldoActual = $request->data->saldoActual;
            $correoCliente = $request->data->correoCliente;

            $sql = "INSERT INTO `clientes`VALUES (?,?,?,?,?,?)";
            $query = Flight::db()->prepare($sql);
        
            $query->bindParam(1,$nombreCliente);
            $query->bindParam(2,$direccion);
            $query->bindParam(3,$telefono);
            $query->bindParam(4,$limiteCredito);
            $query->bindParam(5,$saldoActual);
            $query->bindParam(6,$correoCliente);
            $query->execute();
            Flight::json(["cliente creado exitosamente"]);
        }

        public static function delete($correoCliente){
            $sql ="DELETE FROM `clientes` WHERE `correoCliente`=?";
            $query = Flight::db()->prepare($sql);
            $query->bindParam(1,$correoCliente);
            $query->execute();
            Flight::json(["cliente eliminado exitosamente"]);
        }

        public static function put(){
            $request = Flight::request();
            $nombreCliente = $request->data->nombreCliente;
            $direccion = $request->data->direccion;
            $telefono = $request->data->telefono;
            $limiteCredito = $request->data->limiteCredito;
            $saldoActual = $request->data->saldoActual;
            $correoCliente = $request->data->correoCliente;
        
            $sql = "UPDATE clientes SET nombreCliente=?,direccion=?,telefono=?,limiteCredito=?,saldoActual=? WHERE correoCliente=?";
            $query = Flight::db()->prepare($sql);
            $query->bindParam(1,$nombreCliente);
            $query->bindParam(2,$direccion);
            $query->bindParam(3,$telefono);
            $query->bindParam(4,$limiteCredito);
            $query->bindParam(5,$saldoActual);
            $query->bindParam(6,$correoCliente);
            $query->execute();
            Flight::json(["message" => "cliente actualizado exitosamente"]);
        }
    }

