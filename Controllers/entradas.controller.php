<?php
class EntradasController {
    public static function getAll() {
        $sqlString = "SELECT * FROM entradas";
        $query = Flight::db()->prepare($sqlString);
        $query->execute();
        $entradas = $query->fetchAll();
        Flight::json($entradas);
    }
    
    public static function post() {
        $request = Flight::request();
        $codigoProducto = $request->data->codigoProducto;
        $cantidad = $request->data->cantidad;
        $fechaEntrada = $request->data->fechaEntrada;
        $proveedor = $request->data->proveedor;

        $sql = "INSERT INTO entradas (codigo_producto, cantidad, fecha_entrada, proveedor) VALUES (?,?,?,?)";
        $query = Flight::db()->prepare($sql);
        $query->bindParam(1, $codigoProducto);
        $query->bindParam(2, $cantidad);
        $query->bindParam(3, $fechaEntrada);
        $query->bindParam(4, $proveedor);
        $query->execute();
        Flight::json(["entrada creada exitosamente"]);
    }
    
    public static function getByProveedor($proveedor) {
        $sqlString = "SELECT * FROM entradas WHERE proveedor = ?";
        $query = Flight::db()->prepare($sqlString);
        $query->bindParam(1, $proveedor);
        $query->execute();
        $entradas = $query->fetchAll();
        Flight::json($entradas);
    }
}
 