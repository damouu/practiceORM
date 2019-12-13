<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Carte as carte;
use app\model\Commande as commande;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$commandes = commande::whereHas("lesItems",function ($q){
    $q->where("item_commande.quantite",">",3);
})->get();
foreach ($commandes as $commande){
        foreach ($commande->infocarte()->get() as $carte){
            echo $carte.PHP_EOL;
        }
}