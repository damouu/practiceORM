<?php
require_once 'src/mf/utils/ClassLoader.php';
require_once 'vendor/autoload.php';

use app\model\Carte as carte;
use mf\utils\ClassLoader as Loader;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

try {
    $db->addConnection($config);
    $db->setAsGlobal();
    $db->bootEloquent();
} catch (Exception $exception) {
    throw new $exception;
}


$carte_fidels = carte::select("nom_proprietaire", "mail_proprietaire", "cumul")->get();

foreach ($carte_fidels as $carte_fidel) {
    echo $carte_fidel->nom_proprietaire, " ",
    $carte_fidel->mail_proprietaire, " ",
    "montant du cumul est", " ", $carte_fidel->cumul . PHP_EOL;
}
