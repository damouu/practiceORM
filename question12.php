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

$commandes = commande::with("lesItems")->where("nom_client","=",'Aaron McGlynn')->get();
foreach ($commandes as $commande){
    echo "la commande numero "," ",$commande->id," ","de monsieur",$commande->nom_client," ","contient comme produit :";
        foreach ($commande->lesItems() as $item){
            echo $item->libelle.PHP_EOL;
            echo $item->pivot->quantite.PHP_EOL;
    }
}