<?php
require_once 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$pokemons = $client->pokemon->pokemons;

$results = $pokemons->insertOne(['id' => '152', 'name' => 'pepe']);

$pepes = $pokemons->find(['id' => '152']);

foreach ($pepes as $result) {
    echo $result['name'] . PHP_EOL;
}