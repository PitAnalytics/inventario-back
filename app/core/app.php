<?php
/********************/
/**PSR-7-INTERFACE***/
/********************/
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


/*********************/
/****SLIM-INSTANCE****/
/*********************/
$app = new \Slim\App(['settings' => ['displayErrorDetails' => true,'responseChunkSize' => 8096]]);
require_once '../app/core/container.php';


/******************/
/****ROUTER********/
/******************/
$app->get('/', \App\Controllers\TestController::class.':wellcome');

$app->get('/zona', \App\Controllers\ZonaController::class.':index');

$app->get('/equipo', \App\Controllers\EquipoController::class.':index');
$app->get('/equipo/obtener/{codigo}', \App\Controllers\EquipoController::class.':get');
$app->get('/inventario', \App\Controllers\InventarioController::class.':index');
$app->get('/inventario/busqueda/{zona}/{codigoEquipo}', \App\Controllers\InventarioController::class.':search');
$app->get('/inventario/obtener/{id}', \App\Controllers\InventarioController::class.':get');
$app->get('/inventario/actualizar/{id}/{zona}/{usando}', \App\Controllers\InventarioController::class.':update');

/******************/
/****EJECUTAMOS****/
/******************/
$app->run();


?>