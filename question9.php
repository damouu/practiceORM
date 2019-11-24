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

$commande = commande::find(5);
$commande->id = 5;
$commande->created_at ="2019-10-10 16:00:00";
$commande->updated_at ="2019-10-10 16:11:11";
$commande->date_livraison ="2019-10-11 09:00:00";
$commande->montant = 5;
$commande->etat = 0;
$commande->nom_client = "Kory Goyette";
$commande->carte_id = 10;
$commande->save();

$commande2 = commande::find(2);
$commande2->id = 2;
$commande2->created_at ="2019-10-10 16:00:00";
$commande2->updated_at ="2019-10-10 16:11:11";
$commande2->date_livraison ="2019-10-11 09:00:00";
$commande2->montant = 10;
$commande2->etat = 1;
$commande2->nom_client = "Kory Goyette";
$commande2->carte_id = 10;
$commande2->save();

$commande3 =  commande::find(3);
$commande3->id = 3;
$commande3->created_at ="2019-10-10 16:00:00";
$commande3->updated_at ="2019-10-10 16:11:11";
$commande3->date_livraison ="2019-10-11 09:00:00";
$commande3->montant = 15;
$commande3->etat = 2;
$commande3->nom_client = "Reymundo Daugherty";
$commande3->carte_id = 11;
$commande3->save();
echo "nouveau insert fait";
