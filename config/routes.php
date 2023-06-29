<?php

use Slim\App;

return static function (App $app) {

    $app->get('/api/carte/{id}[/]', [src\action\CarteController::class, 'getCartId']);

    $app->get('/api/command/{uuid}[/]', [src\action\CommandeController::class, 'getCommandUuid']);

    $app->get('/api/carte/{id}/command', [src\action\CarteController::class, 'getCarteCommand']);

    $app->get('/api/item/{id}[/]', [src\action\ItemController::class, 'getItemId']);
};
