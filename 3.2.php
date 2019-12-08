<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Item as item;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();


$items = item::all();
foreach ($items as $item){
    echo "l'item "," ",$item->libelle , " apparait dans les commandes : ",' '.PHP_EOL;
    foreach ($item->commandes()->get() as $commande){
        echo $commande->id.PHP_EOL;
    }
}