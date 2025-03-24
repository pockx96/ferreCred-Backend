<?php

require 'flight/Flight.php';
require 'Controllers/usuarios.controller.php';
require 'Controllers/clientes.controller.php';
require 'Controllers/catalogoProducto.controller.php';
require 'Controllers/compras.controller.php';
require 'Controllers/entradas.controller.php';

Flight::register('db','PDO',array('mysql:host=localhost;dbname=easy','admi','root'));


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
Flight::route('DELETE /clientes', function () {
    clienteController::delete();
});

Flight::route('PUT /clientes', function () {
    clienteController::put();
});





/// Controlador del producto

Flight::route('GET /productos', function(){
    ProductoController::getAll();
});

Flight::route('GET /productos/@codigo', function($codigo){
    ProductoController::getByCode($codigo);
});

Flight::route('GET /productos/search/@descripcion', function($descripcion){
    ProductoController::getByDescripcion($descripcion);
});

Flight::route('POST /productos', function(){
    ProductoController::post();
});

Flight::route('DELETE /productos/@codigo', function($codigo){
    ProductoController::deleteByCode($codigo);
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

Flight::route('GET /deuda/@folio',function($folio){
    DeudaController::getById($folio);
});

Flight::route('GET /deuda/cliente/@cliente', function($cliente){
    DeudaController::getByCliente($cliente);
});
Flight::route('POST /deuda', function(){
    DeudaController::post();
});
Flight::route('PUT /deuda/@folio', function($folio){
    DeudaController::put($folio);
});
Flight::route('DELETE /deuda/@folio', function($folio){
    DeudaController::deleteByFolio($folio);
});

// Entradas

Flight::route('GET /entradas', ['EntradasController', 'getAll']);




Flight::route('OPTIONS /*', function() {
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Origin: *");
});



Flight::start();
