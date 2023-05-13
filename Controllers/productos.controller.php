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
        $peso = $request->data->peso;
        $cantidad = $request->data->cantidad;
        $importe = $request->data->importe;
        $sql = "INSERT INTO productos (codigo, folio, peso, cantidad, importe)
        VALUES (?, (SELECT folio FROM compras ORDER BY folio DESC LIMIT 1), ?, ?, ?);
        ";
        $query = Flight::db()->prepare($sql);
        $query->bindParam(1,$codigo);
        $query->bindParam(2,$peso);
        $query->bindParam(3,$cantidad);
        $query->bindParam(4,$importe);
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