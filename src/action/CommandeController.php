<?php

namespace src\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class CommandeController
{
    public function getTest(Request $request, Response $response): Response
    {
        $response->getBody()->write("Hello, dede");
        return $response;
    }

}