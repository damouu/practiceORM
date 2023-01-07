<?php

use Slim\App;

return static function (App $app) {

    $app->get('/api/carte/{id}[/]', [src\action\CarteController::class, 'getCartId']);

};
