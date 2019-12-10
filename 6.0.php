<?php
require_once 'vendor/autoload.php';
require_once 'src/mf/utils/ClassLoader.php';
use \mf\utils\ClassLoader as Loader;
use app\model\Item as item;

$loader = new Loader("src");
$loader->register();

$config = parse_ini_file('conf/config.ini');
$db = new Illuminate\Database\Capsule\Manager();

$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();


$item = new item();
$item->id = 1234;
$item->libelle = "sushi";
$item->description = "sushi aux maguro";
$item->tarif = 3;
$item->deleted_at = null;
$item->save();
echo "ok";

$sushi = item::find(1234);
$sushi->delete();


$item = item::onlyTrashed()->where("id","=",1234)->get();
echo $item;