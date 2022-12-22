<?php
require_once 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27018");

function arrayOfArrays(): void
{
    $count = 0;
    $dede = [];
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $arrayBis[$j] = $count;
            $count++;
        }
        $dede[$i] = $arrayBis;
    }

    print_r($dede);
}

arrayOfArrays();