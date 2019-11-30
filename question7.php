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

$cartes_cummul_1000 = carte::where("cumul",">", "1000")->get();
foreach ($cartes_cummul_1000 as $carte_cummul_1000) {
    echo "la carte numero "," ", $carte_cummul_1000->id," ","contient un cumul de"," ",$carte_cummul_1000->cumul," "," et a passe les commandes :".PHP_EOL;
    $commandesCarte = $carte_cummul_1000->commandesCarte()->get();
    foreach ($commandesCarte as $commandeCarte){
        echo "commande numero "," ",$commandeCarte->id," ","d'un montant de ",$commandeCarte->montant.PHP_EOL;
    }
}

