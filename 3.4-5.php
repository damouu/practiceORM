<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Commande as commande;
use app\model\Item_commande as item_commande;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();


$commande = commande::where("id","=","3")->first();
$item_commande4 = new item_commande();
$item_commande4->item_id = 4;
$item_commande4->commande_id = $commande->id;
$item_commande4->quantite = 3;
//$commande->lesItems()->save($item_commande);

$commande = commande::where("id","=","3")->first();
$item_commande6 = new item_commande();
$item_commande6->item_id = 6;
$item_commande6->commande_id = $commande->id;
$item_commande6->quantite = 4;
//$commande->lesItems()->save($item_commande);

$item_commande6 = item_commande::find(6);
$commande->lesItems()->attach([2 =>["quantite"=> 3], 6 =>["quantite"=>4]]);
