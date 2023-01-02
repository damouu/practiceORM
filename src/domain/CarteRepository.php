<?php

namespace src\domain;

use src\model\Carte;

class CarteRepository
{
//    public function __construct(array $cartes = null)
//    {
//        $this->cartes = $cartes ?? [
//            0 => new Carte([0, "dede", "dede", "dede", "dede", '', '', 123])
//        ];
//    }

    public function getCardsLimit(int $limitNumber): object
    {
        return carte::select("nom_proprietaire", "mail_proprietaire", "cumul")->limit($limitNumber)->get();
    }


    public function findCardOfId(int $id): Carte
    {
//        return Carte::findOrFail($id);
        return $this->cartes[$id];
    }


}