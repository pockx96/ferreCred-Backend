<?php

class InventarioController
{

    public static function getAll()
    {
        $sqlString = "SELECT p.codigo, p.descripcion, p.precio_compra, p.precio_venta, i.cantidad FROM catalogo_producto p JOIN inventario i ON p.codigo = i.codigo_producto;";
        $query = Flight::db()->prepare($sqlString);
        $query->execute();
        $entradas = $query->fetchAll();
        Flight::json($entradas);
    }

    public static function editarCantidad() {
        $request = Flight::request();
        $codigo = $request->data->codigo;
        $cantidad = $request->data->cantidad;

        // Verificar si el producto ya existe en la tabla
        $sql_select = "SELECT codigo_producto FROM inventario WHERE codigo_producto = ?";
        $query_select = Flight::db()->prepare($sql_select);
        $query_select->bindParam(1, $codigo);
        $query_select->execute();
        $row = $query_select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // El producto existe, actualizar su cantidad
            $sql_update = "UPDATE inventario SET cantidad = ? WHERE codigo_producto = ?";
            $query_update = Flight::db()->prepare($sql_update);
            $query_update->bindParam(1, $cantidad);
            $query_update->bindParam(2, $codigo);
            $query_update->execute();
            Flight::json(["mensaje" => "Cantidad actualizada exitosamente"]);
        } else {
            Flight::json(["mensaje" => "Producto no encontrado en el inventario"], 404);
        }
    }

    public static function getByCode($codigo){
        $sqlString = "SELECT cantidad FROM inventario WHERE codigo_producto = ?";
        $query = Flight::db()->prepare($sqlString);
        $query->execute([$codigo]);
        $inventario = $query->fetch();
        Flight::json($inventario);
    }

}
?>
