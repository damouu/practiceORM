<?php

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Factory\AppFactory;

return [
    'settings' => static function () {
        return require __DIR__ . '/settings.php';
    },

    App::class => static function (ContainerInterface $container) {
        AppFactory::setContainer($container);
        return AppFactory::create();
    },
];