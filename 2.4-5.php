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


$commande = commande::updateOrCreate(
    ['id' => 777],
    ['id' => 777,
    'created_at'  => "2019-10-10 16:00:00",
     "updated_at" => "2019-10-10 16:00:00",
     "date_livraison" => "2019-10-10 16:00:00",
        "montant" => 5,
        "etat" => 0,
        "nom_client" => "Kory Goyette",
        "carte_id" => 10 ]
);


$commande2 = commande::updateOrCreate(
    ['id' => 888],
    ['id' => 888,
        'created_at'  => "2019-10-10 16:00:00",
        "updated_at" => "2019-10-10 16:00:00",
        "date_livraison" => "2019-10-10 16:00:00",
        "montant" => 10,
        "etat" => 1,
        "nom_client" => "Kory Goyette",
        "carte_id" => 10 ]
);


$commande3 = commande::updateOrCreate(
    ['id' => 3],
    ['id' => 3,
        'created_at'  => "2019-10-10 16:00:00",
        "updated_at" => "2019-10-10 16:00:00",
        "date_livraison" => "2019-10-10 16:00:00",
        "montant" => 15,
        "etat" => 2,
        "nom_client" => "Kory Goyette",
        "carte_id" => 11 ]
);

echo "nouveau insert fait";
