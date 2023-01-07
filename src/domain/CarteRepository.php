<?php

namespace src\domain;

use src\model\Carte;

class CarteRepository
{
    public function getCardsLimit(int $limitNumber): Carte
    {
        return carte::select("nom_proprietaire", "mail_proprietaire", "cumul")->limit($limitNumber)->get();
    }

    public function getCardById(int $id): Carte
    {
        return Carte::findOrFail($id);
    }

}