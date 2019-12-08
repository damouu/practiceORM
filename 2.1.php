<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Carte as carte;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$carte42 = carte::find("42");
echo "la carte numero"," ",$carte42->id," ","appartient a "," ",$carte42->nom_proprietaire," ","et possede un cumul de "," ",$carte42->cumul," ","et a passe les commandes :".PHP_EOL;
foreach ($commandes_carte42 = $carte42->commandesCarte()->get() as $commande_carte42 ){
    echo "la commande numero", " ",$commande_carte42->id," ","d'un montant de "," ",$commande_carte42->montant.PHP_EOL;
}
