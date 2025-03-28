<?php

require 'flight/Flight.php';
require 'Controllers/usuarios.controller.php';
require 'Controllers/clientes.controller.php';
require 'Controllers/catalogoProducto.controller.php';
require 'Controllers/compras.controller.php';
require 'Controllers/entradas.controller.php';
require 'Controllers/deuda.controller.php';
require 'Controllers/productos.controller.php';
require 'Controllers/proveedores.controller.php';
require 'Controllers/inventario.controller.php';
require 'Controllers/bitacora.controller.php';

//Flight::register('db', 'PDO', array('mysql:host=193.203.166.166;dbname=u428227033_ferredb', 'u428227033_rooto', 'Huevos*321'));
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=ferre', 'pock', 'root'));


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

Flight::map('/*', function () {
    $cors = new Cors();
    $cors->init([
        'origin' => '*',
        'methods' => 'GET,POST,PUT,DELETE,OPTIONS',
        'headers.allow' => 'Content-Type',
        'headers.expose' => 'Content-Type',
    ]);
});

//Controllador Usuario
//Todos funcionan correctamente
Flight::route('GET /usuarios', function () {
    usuarioController::getAll();
});
Flight::route('GET /usuarios/@id', function ($id) {
    usuarioController::get($id);
});
Flight::route('POST /usuarios', function () {
    usuarioController::post();
});
Flight::route('DELETE /usuarios', function () {
    usuarioController::delete();
});
Flight::route('PUT /usuarios', function () {
    usuarioController::put();
});

// Controlador clientes
//todo funciona correctamente
Flight::route('GET /clientes', function () {
    clienteController::getAll();
});
Flight::route('GET /clientes/@id', function ($id) {
    clienteController::get($id);
});
Flight::route('POST /clientes', function () {
    clienteController::post();
});
Flight::route('DELETE /clientes/@id', function ($id) {
    clienteController::delete($id);
});
Flight::route('PUT /clientes', function () {
    clienteController::put();
});

/// Controlador del Catalogo de producto
//Post Y Delete muestran error
Flight::route('GET /catalogo', function () {
    CatalogoProductoController::getAll();
});
Flight::route('GET /catalogo/@codigo', function ($codigo) {
    CatalogoProductoController::getByCode($codigo);
});
Flight::route('GET /catalogo/search/@descripcion', function ($descripcion) {
    CatalogoProductoController::getByDescripcion($descripcion);
});
//Insert value list does not match column list
Flight::route('POST /catalogo', function () {
    CatalogoProductoController::post();
});
Flight::route('DELETE /catalogo/@codigo', function ($codigo) {
    CatalogoProductoController::deleteByCode($codigo);
});
Flight::route('PUT /catalogo/@codigo', function ($codigo) {
    CatalogoProductoController::putUpdateProducto($codigo);
});
Flight::route('PUT /catalogo/cantidad/@codigo', function ($codigo) {
    CatalogoProductoController::putUpdateCantidad($codigo);
});


// Controlador de Compras
//Error 500 ?
Flight::route('GET /compras', ['ComprasController', 'getAll']);
Flight::route('GET /compras/cliente/@cliente', function ($cliente) {
    ComprasController::getByCliente($cliente);
});
Flight::route('GET /compras/deuda/@cliente', function ($cliente) {
    ComprasController::getDeuda($cliente);
});
Flight::route('GET /compras/fecha/@fecha', function ($fecha) {
    ComprasController::getByFecha($fecha);
});
Flight::route('POST /compras', function () {
    ComprasController::post();
});
Flight::route('DELETE /compras/@folio', function ($folio) {
    ComprasController::deleteCompra($folio);
});
Flight::route('PUT /compras', function () {
    ComprasController::DeudaUpdate();
});



// Deudas
//Error 500 ?
Flight::route('GET /deuda', ['DeudaController', 'getAll']);
Flight::route('POST /deuda', function () {
    DeudaController::post();
});
Flight::route('GET /deuda/@folio', function ($folio) {
    DeudaController::getByFolio($folio);
});
Flight::route('GET /deuda/cliente/@cliente', function ($cliente) {
    DeudaController::getByCliente($cliente);
});
Flight::route('PUT /deuda', function () {
    DeudaController::put();
});
Flight::route('DELETE /deuda/@folio', function ($folio) {
    DeudaController::deleteByFolio($folio);
});

// Entradas
//GetAll funciona, necesito hacer funcionar a proveedores para el resto
Flight::route('GET /entradas', ['EntradasController', 'getAll']);
Flight::route('POST /entradas', function () {
    EntradasController::post();
});
Flight::route('GET /entradas/@proveedor', function ($proveedor) {
    EntradasController::getByProveedor($proveedor);
});

// Productos
Flight::route('GET /productos', ['ProductosController', 'getAll']);
// Integrity constraint violation: 1048 Column 'folio' cannot be null
Flight::route('POST /productos', function () {
    ProductosController::post();
});
Flight::route('GET /productos/@folio', function ($folio) {
    ProductosController::getByFolio($folio);
});

// Proveedores
Flight::route('GET /proveedores', ['ProveedorController', 'getAll']);

Flight::route('GET /proveedores/@id', function ($id) {
    ProveedorController::getByid($id);
});

Flight::route('POST /proveedores', function () {
    ProveedorController::post();
});
// No existe un campo ID al crear un proveedor?
Flight::route('PUT /proveedores/@id', function ($id) {
    ProveedorController::put($id);
});
// No existe un campo ID al crear un proveedor?
Flight::route('DELETE /proveedores/@id', function ($id) {
    ProveedorController::delete($id);
});

/// Inventario
//Funcionan Correctamente
Flight::route('GET /inventario', function () {
    inventarioController::getAll();
});
Flight::route('PUT /inventario', function () {
    inventarioController::restarCantidad();
});
Flight::route('POST /inventario', function () {
    inventarioController::sumarCantidad();
});
Flight::route('PUT /inventario', function () {
    inventarioController::editarCantidad();
});
Flight::route('GET /inventario/@codigo', function ($codigo) {
    InventarioController::getByCode($codigo);
});

/// Bitacora
//Todo Funciona
Flight::route('GET /bitacora', function () {
    BitacoraController::getAll();
});
Flight::route('POST /bitacora', function () {
    BitacoraController::post();
});



Flight::route('OPTIONS /*', function () {
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Origin: *");
});



Flight::start();
