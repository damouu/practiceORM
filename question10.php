<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Item_commande as item_commande;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$item_commande = item_commande::where("commande_id","=","000b2a0b-d055-4499-9c1b-84441a254a36");
$uniq = $item_commande->get();
foreach ($uniq as $dede){
    echo "la commande"," ",$dede->commande_id," ","contient comme item :";
    echo $dede->infoCommandeItem," ","en quantite"," ",$dede->quantite.PHP_EOL;
}

// here is from dede branch
