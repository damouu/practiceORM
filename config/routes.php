<?php

use Slim\App;

return static function (App $app) {

    $app->get('/api/carte/{id}[/]', [src\action\CarteController::class, 'getCartId']);

    $app->get('/api/command/{id}[/]', [src\action\CommandeController::class, 'getCommandId']);
    
    $app->get('/api/carte/{id}/command', [src\action\CarteController::class, 'getCarteCommand']);
};
