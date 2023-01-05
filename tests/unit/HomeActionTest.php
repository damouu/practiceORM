<?php

namespace tests\unit;

use Nekofar\Slim\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase;
use src\model\Carte as carte;

class HomeActionTest extends TestCase
{
    use AppTestTrait;

    public function testFindCardOfId()
    {
        $newCarte = new carte();
        $newCarte->password = "testCI/CD";
        $newCarte->nom_proprietaire = "testCI/CD";
        $newCarte->mail_proprietaire = "test@mail.fr";
        $newCarte->cumul = "2022";

        $pp = new carte();
        $pp->password = "dede";
        $pp->nom_proprietaire = "dede";
        $pp->mail_proprietaire = "dede@mail.fr";
        $pp->cumul = "12121";

//        $carteRepository = new CarteRepository([0 => $newCarte, 1 => $pp]);

        $this->assertEquals($pp, $newCarte);
    }
}