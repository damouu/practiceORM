<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Carte as carte;
use app\model\Commande as commande;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$commandes = commande::where("carte_id","=","5")->take(5)->get();
foreach ($commandes as $commande){
    echo "la commande numero "," ",$commande->id," ","a ete fait par la carte numero "," ",$commande->carte_id.PHP_EOL;
    foreach ($commande->infocarte()->get() as $infocarte_commande) {
        echo "la carte numero "," ",$infocarte_commande->id," "," appartient a "," ",$infocarte_commande->nom_proprietaire," ","est contient un cummul de "," ",$infocarte_commande->cumul.PHP_EOL;
    }
}