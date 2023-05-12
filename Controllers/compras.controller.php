<?php
class ComprasController {
    
    // Obtener todas las compras
    public static function getAll() {
        $sqlString = "SELECT * FROM compras";
        $query = flight::db()->prepare($sqlString);
        $query->execute();
        $compras = $query->fetchAll();
        Flight::json($compras);
    }
    
    // Obtener compras por cliente
    public static function getByCliente($cliente) {
        $sqlString = "SELECT * FROM compras WHERE cliente = ?";
        $query = flight::db()->prepare($sqlString);
        $query->execute([$cliente]);
        $compras = $query->fetchAll();
        Flight::json($compras);
    }
    
    // Obtener compras por fecha
    public static function getByFecha($fecha) {
        $sqlString = "SELECT * FROM compras WHERE fecha = ?";
        $query = flight::db()->prepare($sqlString);
        $query->execute([$fecha]);
        $compras = $query->fetchAll();
        Flight::json($compras);
    }
    
    // Agregar una compra
    public static function post() {
    $request = Flight::request();
    $cliente = $request->data->cliente;
    $tipo_nota = $request->data->tipo_nota;
    $total = $request->data->total;

    $sql = "SET @Contador = (SELECT COUNT(*) FROM compras);
        SET @Folio = CONCAT('Fol.', LPAD((@Contador+1), 3, '0'));
        INSERT INTO compras (folio, fecha, cliente, tipo_nota, total) 
        VALUES (@Folio, NOW(), ?, ?, ?)";
    $query = Flight::db()->prepare($sql);


    $query->bindParam(1, $cliente);
    $query->bindParam(2, $tipo_nota);
    $query->bindParam(3, $total);
    $query->execute();

    Flight::json(["compra creada exitosamente"]);
    }

    // Eliminar una compra por folio
    public static function deleteCompra($folio) {
        $sqlString = "DELETE FROM compras WHERE folio = ?";
        $query = flight::db()->prepare($sqlString);
        $query->execute([$folio]);
        Flight::json(['message' => 'Compra eliminada exitosamente']);
    }
}
