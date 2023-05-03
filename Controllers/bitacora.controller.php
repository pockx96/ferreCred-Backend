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
        $fecha= $request->data->Fecha_Hora;

        $sqlString = "INSERT INTO bitacora VALUES(?,?,?,?)";
        
        $query = flight::db()->prepare($sqlString);
        $query->bindParam(1, $usuario);
        $query->bindParam(2, $proceso);
        $query->bindParam(3, $estatus);
        $query->bindParam(4, $fecha);
        $query->execute();
        Flight::json("proceso a bitacora agregada correctamente");
    }
}

?>