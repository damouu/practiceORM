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

$carte = carte::where("mail_proprietaire","like","%Aaron.McGlynn%")->first();
$commandes = $carte->commandesCarte()->where("etat","=","0")->get();
foreach ($commandes as $commande){
    echo $commande.PHP_EOL;
}