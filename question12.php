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

$commande = commande::where('nom_client', '=', 'Aaron McGlynn')->first();
echo "la premiere commande de "," ",$commande->nom_client," ","numero de la commande est"," ",$commande->id," ";
$item = $commande->listItem()->first();
echo "contient comme produit", " ",$item->libelle.PHP_EOL," ","et a ete commande en quantite "," ",$item->pivot->quantite.PHP_EOL;
