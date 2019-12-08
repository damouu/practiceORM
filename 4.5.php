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

$cartes = carte::whereHas("commandesCarte",function ($q){
    $q->where("etat",">",3);
})->get();
foreach ($cartes as $carte){
    echo $carte.PHP_EOL;
}