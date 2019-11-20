<?php
require_once 'src/mf/utils/ClassLoader.php';
require_once 'vendor/autoload.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Carte as carte;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

    try {
        $carte_fidel = carte::where("id", "=", "7342")->firstOrFail();
        echo $carte_fidel;
} catch (ModelNotFoundException $e) {
        echo "no existing card";
    }

// here is from dede branch
