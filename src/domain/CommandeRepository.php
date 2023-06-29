<?php

namespace src\domain;

use src\model\Commande;

class CommandeRepository
{
    public function getCommandByUuid(string $uuid): Commande
    {
        return Commande::findOrFail($uuid);

    }

}