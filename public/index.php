<?php

require '../vendor/autoload.php';

$db = new Illuminate\Database\Capsule\Manager();
$config = parse_ini_file("../config/config.ini");
$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$app = DI\Bridge\Slim\Bridge::create();

$app->get('/api/carte', [src\action\CarteController::class, 'getCardsLimit']);

$app->get('/api/carteid', [src\action\CarteController::class, 'getCartId']);

 $app->get('/', [src\action\CarteController::class, 'getCartId']);

$app->run();