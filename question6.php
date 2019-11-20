<?php
require_once 'src/mf/utils/ClassLoader.php';
require_once 'vendor/autoload.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Commande as commande;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$commande = commande::where("carte_id","=", "42");
$uniq = $commande->first();
echo $uniq. PHP_EOL;
echo $uniq->infocarte. PHP_EOL;
// here is from dede branch
