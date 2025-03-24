<?php
class BitacoraController{
    public static function getAll() {
        $sqlString = "SELECT * FROM bitacora";
        $query = flight::db()->prepare($sqlString);
        $query->execute();
        $productos = $query->fetchAll();
        Flight::json($productos);
    }

    public static function post() {
        $request = Flight::request();
        $usuario = $request->data->Usuario; 
        $proceso = $request->data->Proceso;
        $estatus = $request->data->Estatus;
        $sqlString = "INSERT INTO bitacora VALUES(?,?,?,NOW())";
        
        $query = flight::db()->prepare($sqlString);
        $query->bindParam(1, $usuario);
        $query->bindParam(2, $proceso);
        $query->bindParam(3, $estatus);
        $query->execute();
        Flight::json("proceso a bitacora agregada correctamente");
    }
}

?>