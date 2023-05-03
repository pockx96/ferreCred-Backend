<?php
class ProductosController {
    
    public static function getAll() {
        $sqlString = "SELECT * FROM productos";
        $query = flight::db()->prepare($sqlString);
        $query->execute();
        $productos = $query->fetchAll();
        Flight::json($productos);
    }

    public static function getByFolio($folio) {
        $sqlString = "SELECT * FROM productos WHERE folio = ?";
        $query = flight::db()->prepare($sqlString);
        $query->bindParam(1, $folio);
        $query->execute();
        $producto = $query->fetch();
        Flight::json($producto);
    }
    
    public static function post(){
        $request = Flight::request();
        $codigo = $request->data->codigo;
        $folio = $request->data->folio;
        $unidad = $request->data->unidad;
        $cantidad = $request->data->cantidad;
        $importe = $request->data->importe;
        $sql = "INSERT INTO `productos`VALUES (?,?,?,?,?)";
        $query = Flight::db()->prepare($sql);
        $query->bindParam(1,$codigo);
        $query->bindParam(2,$folio);
        $query->bindParam(3,$unidad);
        $query->bindParam(4,$cantidad);
        $query->bindParam(5,$importe);
        $query->execute();
        Flight::json(["registro creado exitosamente"]);
    }
    
    public static function delete(){
        $nombreUsuario = (Flight::request()->data->nombreUsuario);
        $sql ="DELETE FROM `productos` WHERE `folio`=?";
        
        $query = Flight::db()->prepare($sql);
        $query->bindParam(1,$nombreUsuario);
        $query->execute();
        Flight::json(["Producto eliminado exitosamente"]);
    }
}