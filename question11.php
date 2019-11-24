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

// affiche toutes les items et toutes les commandes contenant l'item en question , requete un peu long a afficher
$item_commande = item_commande::select();
$uniq = $item_commande->get();
foreach ($uniq as $dede){
    echo $dede->infoItem.PHP_EOL;
    echo $dede->infoCommande.PHP_EOL;
}

