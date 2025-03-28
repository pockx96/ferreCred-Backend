<?php
class ComprasController
{

    // Obtener todas las compras
    public static function getAll()
    {
        $sqlString = "SELECT * FROM compras ";
        $query = flight::db()->prepare($sqlString);
        $query->execute();
        $compras = $query->fetchAll();
        Flight::json($compras);
    }

    // Obtener compras por cliente
    public static function getByCliente($cliente)
    {
        $sqlString = "SELECT * FROM `compras` WHERE cliente = ?;";
        $query = flight::db()->prepare($sqlString);
        $query->execute([$cliente]);
        $compras = $query->fetchAll();
        Flight::json($compras);
    }

    public static function getDeuda($cliente)
    {
        $sqlString = "SELECT SUM(deuda) AS suma_deuda
        FROM compras
        WHERE cliente = ?;";
        $query = flight::db()->prepare($sqlString);
        $query->execute([$cliente]);
        $compras = $query->fetch();
        Flight::json($compras);
    }

    // Obtener compras por fecha
    public static function getByFecha($fecha)
    {
        $sqlString = "SELECT * FROM compras WHERE fecha = ?";
        $query = flight::db()->prepare($sqlString);
        $query->execute([$fecha]);
        $compras = $query->fetchAll();
        Flight::json($compras);
    }

    // Agregar una compra
    public static function post()
    {
        $request = Flight::request();
        $cliente = $request->data->cliente;
        $tipo_nota = $request->data->tipo_nota;
        $total = $request->data->total;
        $deuda = $request->data->deuda;

        $sql = "INSERT INTO compras (folio, fecha, cliente, tipo_nota, total, deuda) 
        SELECT CONCAT('Fol.', LPAD(COALESCE(MAX(SUBSTR(folio, 5)), 0) + 1, 3, '0')), CURDATE(), ?, ?, ?, ?
        FROM compras";
        $query = Flight::db()->prepare($sql);

        $query->bindValue(1, $cliente);
        $query->bindValue(2, $tipo_nota);
        $query->bindValue(3, $total);
        $query->bindValue(4, $deuda);
        $query->execute();

        Flight::json(["compra creada exitosamente"]);
    }


    // Eliminar una compra por folio
    public static function deleteCompra($folio)
    {
        $sqlString = "DELETE FROM compras WHERE folio = ?";
        $query = flight::db()->prepare($sqlString);
        $query->execute([$folio]);
        Flight::json(['message' => 'Compra eliminada exitosamente']);
    }

    // Actualizar la deuda
    public static function DeudaUpdate()
    {
        $request = Flight::request();
        $folio = $request->data->folio;
        $deuda = $request->data->deuda;
        $sql = "UPDATE compras
        SET deuda = ?
        WHERE folio = ?;";
        $query = Flight::db()->prepare($sql);
        $query->bindValue(1, $deuda);
        $query->bindValue(2, $folio);
        $query->execute();

        Flight::json(["Deuda actualizada"]);
    }

}
