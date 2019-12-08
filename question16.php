<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Commande as commande;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();


$commande = commande::where("id","=","9f1c3241-958a-4d35-a8c9-19eef6a4fab3")->first();
$items = $commande->lesItems()->where("tarif","<",5.0)->get();
foreach ($items as $item){
    echo $item->tarif.PHP_EOL;
}
