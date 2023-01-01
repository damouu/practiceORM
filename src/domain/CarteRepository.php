<?php

namespace src\domain;

use src\model\Carte;

class CarteRepository
{
    public function getCardsLimit($limitNumber): object
    {
        return carte::select("nom_proprietaire", "mail_proprietaire", "cumul")->limit($limitNumber)->get();
    }

}