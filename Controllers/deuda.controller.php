<?php
class DeudaController {
    
    public static function getAll() {
        $sqlString = "SELECT * FROM deuda";
        $query = Flight::db()->prepare($sqlString);
        $query->execute();
        $deudas = $query->fetchAll();
        Flight::json($deudas);
    }
    
    public static function getByFolio($folio) {
        $sqlString = "SELECT * FROM deuda WHERE folio = ?";
        $query = Flight::db()->prepare($sqlString);
        $query->bindParam(1, $folio);
        $query->execute();
        $deuda = $query->fetch();
        Flight::json($deuda);
    }

    public static function getByCliente($cliente) {
        $sqlString = "SELECT * FROM deuda WHERE cliente = ?";
        $query = Flight::db()->prepare($sqlString);
        $query->bindParam(1, $cliente);
        $query->execute();
        $deudas = $query->fetch();
        Flight::json($deudas);
    }

    public static function put($folio) {
        $request = Flight::request();
        $adeudo = $request->data->adeudo;
        $sqlString = "UPDATE deuda SET adeudo = ? WHERE folio = ?";
        $query = Flight::db()->prepare($sqlString);
        $query->bindParam(1, $adeudo);
        $query->bindParam(2, $folio);
        $query->execute();
        Flight::json(["adeudo actualizado exitosamente"]);
    }

    public static function deleteByFolio($folio) {
        $sqlString = "DELETE FROM deuda WHERE folio = ?";
        $query = Flight::db()->prepare($sqlString);
        $query->bindParam(1, $folio);
        $query->execute();
        Flight::json(["deuda eliminada exitosamente"]);
    }

    public static function post() {
        $request = Flight::request();
        $folio = $request->data->folio;
        $fecha = $request->data->fecha;
        $cliente = $request->data->cliente;
        $total = $request->data->total;
        $adeudo = $request->data->adeudo;
        $sql = "INSERT INTO deuda (folio, fecha, cliente, total, adeudo) VALUES (?,?,?,?,?)";
        $query = Flight::db()->prepare($sql);
        $query->bindParam(1, $folio);
        $query->bindParam(2, $fecha);
        $query->bindParam(3, $cliente);
        $query->bindParam(4, $total);
        $query->bindParam(5, $adeudo);
        $query->execute();
        Flight::json(["deuda creada exitosamente"]);
    }

}


