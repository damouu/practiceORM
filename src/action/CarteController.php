<?php

namespace src\action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\domain\CarteRepository;

class CarteController
{
    private $carteRepository;

    public function __construct(CarteRepository $carteRepository)
    {
        $this->carteRepository = $carteRepository;
    }

    public function getCardsLimit(Request $request, Response $response): Response
    {
        $queryParams = $request->getQueryParams();
        if (!array_key_exists("limit", $queryParams)) {
            $queryParams["limit"] = 1;
        }
        $cards = $this->carteRepository->getCardsLimit($queryParams["limit"]);
        $cardsResponse = [];
        $cardsCount = 0;
        foreach ($cards as $card) {
            $cardsTempArray["nom_proprietaire"] = $card->nom_proprietaire;
            $cardsTempArray["mail_proprietaire"] = $card->mail_proprietaire;
            $cardsTempArray["cumul"] = $card->cumul;
            $cardsResponse[$cardsCount] = $cardsTempArray;
            $cardsCount++;
        }
        $payload = json_encode($cardsResponse, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $response->getBody()->write($payload);
        return $response->withHeader('Content-Type', 'application/json');
    }

}