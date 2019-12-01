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



$commandes = commande::where("nom_client","=",'Aaron McGlynn')->get();
foreach ($commandes as $commande){
    echo "la commande numero "," ",$commande->id," ","contient :";
    foreach ($commande->lesItems() as $item){
    }
    var_dump($item);
}
die();
echo $commandes;
die();
$items = $commandes->lesItems->first();
echo $items;
die();
var_dump( $commandes);
die();
var_dump($commandes);
$items = $commandes->lesItems()->get();
var_dump($items->toSql());
die();



$commandes = commande::where('nom_client', '=', 'Aaron McGlynn')->get();
foreach ($commandes as $commande){
    $items = $commande->lesItems()->get();
    echo $items;
}
die();
$items = $commande->lesItems()->where("commande_id","=","000b2a0b-d055-4499-9c1b-84441a254a36")->get();
echo "la premiere commande de "," ",$commande->nom_client," ","numero de la commande est"," ",$commande->id," ";
$item = $commande->listItem()->first();
echo "contient comme produit", " ",$item->libelle.PHP_EOL," ","et a ete commande en quantite "," ",$item->pivot->quantite.PHP_EOL;
