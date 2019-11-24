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

$carte = carte::where("id","=", "5");
$uniq = $carte->get();
foreach ($uniq as $dede){
    echo "les commandes de la carte ",$dede->id.PHP_EOL;
    echo $dede->commandesCarte.PHP_EOL;
    echo "information de la carte",'; ';
    echo $dede->id," ",$dede->nom_proprietaire," ",$dede->mail_proprietaire," ",$dede->cumul.PHP_EOL;
}

// here is from dede branch
