<?php
require_once 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27018");

$pokemons = $client->pokemon->pokemons;

$results = $pokemons->insertOne(['id' => '152', 'name' => 'pepe']);

$pepes = $pokemons->find(['id' => '152']);


$array = [];

for ($i = 0; $i <= 10; $i++) {
    $array[$i] = $i;
}
print_r(array_values($array));

//foreach ($pepes as $result) {
//    print_r(array_keys($result));
//}