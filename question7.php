<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Carte as carte;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$carte = carte::where("cumul",">", "1000");
$uniq = $carte->get();
foreach ($uniq as $dede){
    echo $dede->nom_proprietaire," ",$dede->id," ",$dede->cumul.PHP_EOL;
    echo $dede->commandesCarte.PHP_EOL;
}

// here is from dede branch
