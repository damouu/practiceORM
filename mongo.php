<?php
require_once 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27018");
$pokemons = $client->pokemon->pokemons;

$results = $pokemons->find(['id' => '001']);

foreach ($results as $result) {
    echo $result['name'] . PHP_EOL;
}