<?php

namespace src\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\domain\ItemRepository;

class ItemController
{
    private $itemRepository;

    public function __construct(ItemRepository $repository)
    {
        $this->itemRepository = $repository;
    }

    public function getItemId(Request $request, Response $response, array $args)
    {
        $item = $this->itemRepository->getItem(intval($args['id']));
        $payload = json_encode($item, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
        // maintenant je vois l'utiliter de ce que clement avais fait, de faire un Reponse Factory pour que le Factory construise lui meme les
        // reponses juste en l'invocan.
        //TODO refactor et ajouter une Factory pour que le facgory construise lui meme les reponses.
    }
}