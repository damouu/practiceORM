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


$commande = commande::with("listItem")
    ->where("nom_client","=","Aaron McGlynn")->get();
foreach ($commande->listItem as $cd ){
    print $cd->pivot->item_id;
}
die();






$commandes = commande::where("nom_client","=","Aaron McGlynn")->get();
foreach ($commandes as $commande){
    echo "les commande de ", " ",$commande->nom_client," ","contient comme item :".PHP_EOL;
    $items_commandes = $commande->listItem;
    foreach ($items_commandes as $items_commande){
        echo $items_commande->libelle.PHP_EOL;
    }
}

