<?php
class CatalogoProductoController
{

    // Método para obtener todos los productos
    public static function getAll()
    {
        $sqlString = "SELECT * FROM catalogo_producto";
        $query = flight::db()->prepare($sqlString);
        $query->execute();
        $productos = $query->fetchAll();
        Flight::json($productos);
    }

    // Método para obtener un producto por su código
    public static function getByCode($codigo)
    {
        $sqlString = "SELECT * FROM catalogo_producto WHERE codigo = ?";
        $query = flight::db()->prepare($sqlString);
        $query->bindParam(1, $codigo);
        $query->execute();
        $producto = $query->fetch();
        Flight::json($producto);
    }

    // Método para buscar productos por descripción
    public static function getByDescripcion($descripcion)
    {
        $sqlString = "SELECT * FROM catalogo_producto WHERE descripcion LIKE :descripcion";
        $query = flight::db()->prepare($sqlString);
        $query->bindValue(":descripcion", "%$descripcion%");
        $query->execute();
        $productos = $query->fetchAll();
        Flight::json($productos);
    }

    // Método para agregar un nuevo producto
    public static function post()
    {
        $request = Flight::request();
        $codigo = $request->data->codigo;
        $descripcion = $request->data->descripcion;
        $precio_compra = $request->data->precio_compra;
        $precio_venta = $request->data->precio_venta;
        $tipo = $request->data->tipo;
        $cantidad = $request->data->cantidad;


        $sqlString = "INSERT INTO catalogo_producto VALUES(?,?,?,?,?)";
        $query = flight::db()->prepare($sqlString);
        $query->bindParam(1, $codigo);
        $query->bindParam(2, $descripcion);
        $query->bindParam(3, $precio_compra);
        $query->bindParam(4, $precio_venta);
        $query->bindParam(5, $tipo);
        $query->bindParam(6, $cantidad);
        $query->execute();
        Flight::json("Producto agregado correctamente");

    }

    // Método para eliminar un producto por su código
    public static function deleteByCode($codigo)
    {
        $sqlString = "DELETE FROM catalogo_producto WHERE codigo = :codigo";
        $query = flight::db()->prepare($sqlString);
        $query->bindParam(":codigo", $codigo);
        $query->execute();
        Flight::json("Producto eliminado correctamente");
    }

}
