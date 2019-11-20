<?php
require_once 'src/mf/utils/ClassLoader.php';
require_once 'vendor/autoload.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Carte as carte;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$carte_fidel = carte::select("nom_proprietaire","mail_proprietaire","cumul");
$uniq = $carte_fidel->get();
foreach ($uniq as $dede){
    echo $dede->nom_proprietaire," ",
    $dede->mail_proprietaire," ",
   "montant du cumul est"," ",$dede->cumul . PHP_EOL;
    // here is from master branch
}