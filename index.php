<?php
session_start();
require 'vendor/autoload.php';
require 'database/Database.php';
require 'models/Jugador.php';
require 'models/Acceso.php';
require 'models/JugadorTalla.php';

$db = (new Database())->getConnection();

$jugadorModel = new Jugador($db);
$accesoModel = new Acceso($db);
$tallaModel = new JugadorTalla($db);

Flight::set('flight.views.path', 'views');

//////////////////////////
// Funciones Auth
//////////////////////////

Flight::route('GET /', function () use ($jugadorModel) {
    Flight::render('login');
});

Flight::route('POST /auth/login', function () use ($accesoModel) {
    $user = $accesoModel->login(Flight::request()->data);
    
    if (!$user) {
        Flight::redirect('/');
    } else {
        $_SESSION['user'] = $user; 
        Flight::redirect('/jugadores');
    }
});

Flight::route('GET /registro', function () use ($jugadorModel) {
    Flight::render('registro');
});

Flight::route('POST /auth/registro', function () use ($accesoModel) {
    $accesoModel->crear(Flight::request()->data);
    Flight::redirect('/');
});

//////////////////////////
// Jugador CRUD
//////////////////////////

Flight::route('GET /jugadores', function () use ($jugadorModel) {
    $jugadores = $jugadorModel->obtenerTodos();
    Flight::render('jugadores', ['jugadores' => $jugadores], 'content');
    Flight::render('layout');
});

Flight::route('GET /jugador/nuevo', function () {
    Flight::render('form', ['jugador' => null], 'content');
    Flight::render('layout');
});

Flight::route('POST /jugador/guardar', function () use ($jugadorModel) {
    $jugadorModel->crear(Flight::request()->data);
    Flight::redirect('/jugadores');
});

Flight::route('GET /jugador/editar/@id', function ($id) use ($jugadorModel) {
    $jugador = $jugadorModel->obtenerPorId($id);
    Flight::render('form', ['jugador' => $jugador], 'content');
    Flight::render('layout');
});

Flight::route('POST /jugador/actualizar/@id', function ($id) use ($jugadorModel) {
    $jugadorModel->actualizar($id, Flight::request()->data);
    Flight::redirect('/jugadores');
});

Flight::route('GET /jugador/eliminar/@id', function ($id) use ($jugadorModel) {
    $jugadorModel->eliminar($id);
    Flight::redirect('/jugadores');
});

//////////////////////////
// Acceso CRUD
//////////////////////////

Flight::route('GET /accesos', function () use ($accesoModel) {
    $accesos = $accesoModel->obtenerTodos();
    Flight::render('accesos', ['accesos' => $accesos], 'content');
    Flight::render('layout');
});

Flight::route('GET /acceso/nuevo', function () {
    Flight::render('form_acceso', ['acceso' => null], 'content');
    Flight::render('layout');
});

Flight::route('POST /acceso/guardar', function () use ($accesoModel) {
    $accesoModel->crear(Flight::request()->data);
    Flight::redirect('/accesos');
});

Flight::route('GET /acceso/editar/@id', function ($id) use ($accesoModel) {
    $acceso = $accesoModel->obtenerPorId($id);
    Flight::render('form_acceso', ['acceso' => $acceso], 'content');
    Flight::render('layout');
});

Flight::route('POST /acceso/actualizar/@id', function ($id) use ($accesoModel) {
    $accesoModel->actualizar($id, Flight::request()->data);
    Flight::redirect('/accesos');
});

Flight::route('GET /acceso/eliminar/@id', function ($id) use ($accesoModel) {
    $accesoModel->eliminar($id);
    Flight::redirect('/accesos');
});

//////////////////////////
// JugadorTalla CRUD
//////////////////////////

Flight::route('GET /jugador-tallas', function () use ($tallaModel) {
    $tallas = $tallaModel->obtenerTodos();
    Flight::render('jugador_tallas', ['tallas' => $tallas], 'content');
    Flight::render('layout');
});

Flight::route('GET /jugador-talla/nuevo', function () use ($tallaModel) {
    $jugadores = $tallaModel->obtenerJugadores();
    Flight::render('form_jugador_talla', ['talla' => null, 'jugadores' => $jugadores], 'content');
    Flight::render('layout');
});

Flight::route('POST /jugador-talla/guardar', function () use ($tallaModel) {
    $tallaModel->crear(Flight::request()->data);
    Flight::redirect('/jugador-tallas');
});

Flight::route('GET /jugador-talla/editar/@id', function ($id) use ($tallaModel) {
    $talla = $tallaModel->obtenerPorId($id);
    $jugadores = $tallaModel->obtenerJugadores();
    Flight::render('form_jugador_talla', compact('talla', 'jugadores'), 'content');
    Flight::render('layout');
});

Flight::route('POST /jugador-talla/actualizar/@id', function ($id) use ($tallaModel) {
    $tallaModel->actualizar($id, Flight::request()->data);
    Flight::redirect('/jugador-tallas');
});

Flight::route('GET /jugador-talla/eliminar/@id', function ($id) use ($tallaModel) {
    $tallaModel->eliminar($id);
    Flight::redirect('/jugador-tallas');
});


Flight::start();
