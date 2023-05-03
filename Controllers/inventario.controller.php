<?php

class InventarioController{

    public static function getAll() {
        $sqlString = "SELECT p.codigo, p.descripcion, p.precio_compra, p.precio_venta, i.cantidad FROM catalogo_producto p JOIN inventario i ON p.codigo = i.codigo_producto;";
        $query = Flight::db()->prepare($sqlString);
        $query->execute();
        $entradas = $query->fetchAll();
        Flight::json($entradas);
    }

}
?>