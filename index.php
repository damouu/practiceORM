<?php

require 'vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->get('/pepe', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello, dede");
    return $response;
});

$app->get('/dede', function (Request $request, Response $response, array $args) {
    $response->getBody()->write("Hello, dede");
    return $response;
});

$app->run();