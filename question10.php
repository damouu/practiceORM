<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Item as item;
use app\model\Commande as commande;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$commande = commande::find('000b2a0b-d055-4499-9c1b-84441a254a36');
$items = $commande->lesItems()->where("commande_id","=","000b2a0b-d055-4499-9c1b-84441a254a36")->get();
foreach ($items as $item){
    echo $item->libelle;
}