<?php

namespace src\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\domain\CommandeRepository;

class CommandeController
{
    private $commandRepository;

    public function __construct(CommandeRepository $commandRepository)
    {
        $this->commandRepository = $commandRepository;
    }

    public function getCommandUuid(Request $request, Response $response, array $args): Response
    {
        $command = $this->commandRepository->getCommandByUuid($args['uuid']);
        $payload = json_encode($command, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response->withStatus(200)->withHeader('Content-Type', 'application/json');
    }

}