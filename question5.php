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

$newcarte = new carte();
$newcarte->password = "test";
$newcarte->nom_proprietaire = "test";
$newcarte->mail_proprietaire = "test@mail.fr";
$newcarte->created_at = "2019-10-10 16:05:59";
$newcarte->updated_at = "2019-10-10 16:05:59";
$newcarte->cumul = "2019";
$newcarte->save();
// here is from dede branch
