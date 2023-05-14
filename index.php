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

// Flight::register('db','PDO',array('mysql:host=localhost;dbname=u530512250_ferreDb','u530512250_admi','Huevos*1'));
Flight::register('db','PDO',array('mysql:host=localhost;dbname=ferre','admi','root'));


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

Flight::route('GET /usuarios', function(){
    usuarioController::getAll();
});
Flight::route('GET /usuarios/@id', function($id){
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

Flight::route('GET /clientes', function(){
    clienteController::getAll();
});
Flight::route('GET /clientes/@id', function($id){
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

Flight::route('GET /catalogo', function(){
    CatalogoProductoController::getAll();
});

Flight::route('GET /catalogo/@codigo', function($codigo){
    CatalogoProductoController::getByCode($codigo);
});

Flight::route('GET /catalogo/search/@descripcion', function($descripcion){
    CatalogoProductoController::getByDescripcion($descripcion);
});

Flight::route('POST /catalogo', function(){
    CatalogoProductoController::post();
});

Flight::route('DELETE /catalogo/@codigo', function($codigo){
    CatalogoProductoController::deleteByCode($codigo);
});



// Controlador de Compras

Flight::route('GET /compras', ['ComprasController', 'getAll']);

Flight::route('GET /compras/cliente/@cliente', function($cliente) {
    ComprasController::getByCliente($cliente);
});

Flight::route('GET /compras/fecha/@fecha', function($fecha) {
    ComprasController::getByFecha($fecha);
});

Flight::route('POST /compras', function() {
    ComprasController::post();
});

Flight::route('DELETE /compras/@folio', function($folio) {
    ComprasController::deleteCompra($folio);
});

// Deudas

Flight::route('GET /deuda', ['DeudaController', 'getAll']);

Flight::route('POST /deuda', function() {
    DeudaController::post();
});

Flight::route('GET /deuda/@folio', function($folio) {
    DeudaController::getByFolio($folio);
});

Flight::route('GET /deuda/cliente/@cliente', function($cliente) {
    DeudaController::getByCliente($cliente);
});
Flight::route('PUT /deuda/@folio', function($folio) {
    DeudaController::put($folio);
});

Flight::route('DELETE /deuda/@folio', function($folio) {
    DeudaController::deleteByFolio($folio);
});

// Entradas

Flight::route('GET /entradas', ['EntradasController', 'getAll']);

Flight::route('POST /entradas', function() {
    EntradasController::post();
});

Flight::route('GET /entradas/@proveedor', function($proveedor) {
    EntradasController::getByProveedor($proveedor);
});

// Productos
Flight::route('GET /productos', ['ProductosController', 'getAll']);

Flight::route('POST /productos', function() {
    ProductosController::post();
});

Flight::route('GET /productos/@folio', function($folio) {
    ProductosController::getByFolio($folio);
});

// Proveedores
Flight::route('GET /proveedores', ['ProveedorController', 'getAll']);

Flight::route('GET /proveedores/@id', function($id) {
    ProveedorController::getByid($id);
});

Flight::route('POST /proveedores', function() {
    ProveedorController::post();
});

Flight::route('PUT /proveedores/@id', function($id) {
    ProveedorController::put($id);
});

Flight::route('DELETE /proveedores/@id', function($id) {
    ProveedorController::delete($id);
});

/// Inventario

Flight::route('GET /inventario', function(){
    inventarioController::getAll();
});
Flight::route('PUT /inventario', function(){
    inventarioController::restarCantidad();
});
Flight::route('POST /inventario', function(){
    inventarioController::sumarCantidad();
});
Flight::route('GET /inventario/@codigo',function($codigo){
    InventarioController::getByCode($codigo);
});
/// Bitacora

Flight::route('GET /bitacora', function(){
    BitacoraController::getAll();
});

Flight::route('POST /bitacora', function() {
    BitacoraController::post();
});



Flight::route('OPTIONS /*', function() {
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Origin: *");
});



Flight::start();
