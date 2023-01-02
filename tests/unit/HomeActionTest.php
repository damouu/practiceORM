<?php

namespace tests\unit;

use Nekofar\Slim\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase;
use src\domain\CarteRepository;
use src\model\Carte as carte;

class HomeActionTest extends TestCase
{
    use AppTestTrait;

    public function testFindCardOfId()
    {
        $newCarte = new carte();
        $newCarte->password = "test";
        $newCarte->nom_proprietaire = "test";
        $newCarte->mail_proprietaire = "test@mail.fr";
        $newCarte->cumul = "2020";

        $pp = new carte();
        $pp->password = "dede";
        $pp->nom_proprietaire = "dede";
        $pp->mail_proprietaire = "dede@mail.fr";
        $pp->cumul = "12121";

        $carteRepository = new CarteRepository([0 => $newCarte, 1 => $pp]);

        $this->assertEquals($newCarte, $carteRepository->findCardOfId(0));
    }
}