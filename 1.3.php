<?php
require_once 'src/mf/utils/ClassLoader.php';
require_once 'vendor/autoload.php';

use app\model\Carte as carte;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use mf\utils\ClassLoader as Loader;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();
try {
    $carte_fidel = carte::where("id", "=", "7342")->firstOrFail();
    echo $carte_fidel . PHP_EOL;
} catch (ModelNotFoundException $e) {
    echo "cette carte n'existe pas" . PHP_EOL;
}
