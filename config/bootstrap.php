<?php

use DI\ContainerBuilder;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions(__DIR__ . '/container.php');

$container = $containerBuilder->build();

$app = $container->get(App::class);

(require __DIR__ . '/routes.php')($app);

//(require __DIR__ . '/middleware.php')($app);

$db = new Illuminate\Database\Capsule\Manager();

$config = parse_ini_file($container->get('settings')['dbconf']);
$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

return $app;