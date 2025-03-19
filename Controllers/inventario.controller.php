<?php

class InventarioController
{

    public static function getAll()
    {
        $sqlString = "SELECT * FROM catalogo_producto";
        $query = Flight::db()->prepare($sqlString);
        $query->execute();
        $entradas = $query->fetchAll();
        Flight::json($entradas);
    }

    public static function sumarCantidad()
    {
        $request = Flight::request();
        $codigo = $request->data->codigo;
        $cantidad = $request->data->cantidad;

        // Buscar si el producto ya existe en la tabla
        $sql_select = "SELECT codigo_producto, cantidad FROM inventario WHERE codigo_producto = ?";
        $query_select = Flight::db()->prepare($sql_select);
        $query_select->bindParam(1, $codigo);
        $query_select->execute();
        $row = $query_select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // El producto ya existe, actualizar su cantidad
            $sql_update = "UPDATE inventario SET cantidad = cantidad + ? WHERE codigo_producto = ?";
            $query_update = Flight::db()->prepare($sql_update);
            $query_update->bindParam(1, $cantidad);
            $query_update->bindParam(2, $codigo);
            $query_update->execute();
        } else {
            // El producto no existe, insertar un nuevo registro
            $sql_insert = "INSERT INTO inventario (codigo_producto, cantidad) VALUES (?, ?)";
            $query_insert = Flight::db()->prepare($sql_insert);
            $query_insert->bindParam(1, $codigo);
            $query_insert->bindParam(2, $cantidad);
            $query_insert->execute();
        }

        Flight::json(["mensaje" => "Cantidad actualizada exitosamente"]);
    }


    public static function restarCantidad()
    {
        $request = Flight::request();
        $codigo = $request->data->codigo;
        $cantidad_solicitada = $request->data->cantidad;

        // Buscar la cantidad actual del producto
        $sql_select = "SELECT cantidad FROM inventario WHERE codigo_producto = ?";
        $query_select = Flight::db()->prepare($sql_select);
        $query_select->bindParam(1, $codigo);
        $query_select->execute();
        $cantidad_actual = $query_select->fetchColumn();

        // Verificar si hay suficientes existencias del producto
        if ($cantidad_actual >= $cantidad_solicitada) {
            // Actualizar la cantidad en inventario
            $sql_update = "UPDATE inventario SET cantidad = cantidad - ? WHERE codigo_producto = ?";
            $query_update = Flight::db()->prepare($sql_update);
            $query_update->bindParam(1, $cantidad_solicitada);
            $query_update->bindParam(2, $codigo);
            $query_update->execute();

            Flight::json(["mensaje" => "Cantidad actualizada exitosamente"]);
        } else {
            Flight::json(["mensaje" => "No hay suficientes existencias del producto"]);
        }
    }

    public static function editarCantidad()
    {
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

    public static function getByCode($codigo)
    {
        $sqlString = "SELECT cantidad FROM inventario WHERE codigo_producto = ?";
        $query = Flight::db()->prepare($sqlString);
        $query->execute([$codigo]);
        $inventario = $query->fetch();
        Flight::json($inventario);
    }

}
?>