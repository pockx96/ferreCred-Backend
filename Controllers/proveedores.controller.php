<?php
class ProveedorController {
public static function getAll() {
    $sqlString = "SELECT * FROM proveedores";
    $query = Flight::db()->prepare($sqlString);
    $query->execute();
    $proveedores = $query->fetchAll();
    Flight::json($proveedores);
}

public static function getById($id) {
    $sqlString = "SELECT * FROM proveedores WHERE id = ?";
    $query = Flight::db()->prepare($sqlString);
    $query->bindParam(1, $id);
    $query->execute();
    $proveedor = $query->fetch();
    Flight::json($proveedor);
}

public static function post() {
    //no hay id?
    $request = Flight::request();
    $nombreEmpresa = $request->data->nombre_empresa;
    $nombreContacto = $request->data->nombre_contacto;
    $direccion = $request->data->direccion;
    $telefono = $request->data->telefono;
    $correoElectronico = $request->data->correo_electronico;
    $RFC = $request->data->RFC;

    $sqlString = "INSERT INTO proveedores (nombre_empresa, nombre_contacto, direccion, telefono, correo_electronico, RFC) VALUES (?,?,?,?,?,?)";
    $query = Flight::db()->prepare($sqlString);
    $query->bindParam(1, $nombreEmpresa);
    $query->bindParam(2, $nombreContacto);
    $query->bindParam(3, $direccion);
    $query->bindParam(4, $telefono);
    $query->bindParam(5, $correoElectronico);
    $query->bindParam(6, $RFC);
    $query->execute();

    Flight::json(["proveedor creado exitosamente"]);
}

public static function put($id) {
    $request = Flight::request();
    $nombreEmpresa = $request->data->nombreEmpresa;
    $nombreContacto = $request->data->nombreContacto;
    $direccion = $request->data->direccion;
    $telefono = $request->data->telefono;
    $correoElectronico = $request->data->correoElectronico;
    $RFC = $request->data->RFC;
    $deuda = $request->data->deuda;

    $sqlString = "UPDATE proveedores SET nombre_empresa = ?, nombre_contacto = ?, direccion = ?, telefono = ?, correo_electronico = ?, RFC = ?, deuda = ? WHERE id = ?";
    $query = Flight::db()->prepare($sqlString);
    $query->bindParam(1, $nombreEmpresa);
    $query->bindParam(2, $nombreContacto);
    $query->bindParam(3, $direccion);
    $query->bindParam(4, $telefono);
    $query->bindParam(5, $correoElectronico);
    $query->bindParam(6, $RFC);
    $query->bindParam(7, $deuda);
    $query->bindParam(8, $id);
    $query->execute();

    Flight::json(["proveedor actualizado exitosamente"]);
}

public static function delete($id) {
    $sqlString = "DELETE FROM proveedores WHERE id = ?";
    $query = Flight::db()->prepare($sqlString);
    $query->bindParam(1, $id);
    $query->execute();
    Flight::json(["proveedor eliminado correctamente"]);
    }
}