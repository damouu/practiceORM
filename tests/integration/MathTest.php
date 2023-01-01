<?php

namespace tests\integration;

use PHPUnit\Framework\TestCase;
use src\model\Carte;

class MathTest extends TestCase
{
    public function testSavingUser(): void
    {
        $carte = new Carte();
        $carte->setGetFullName('Miles Davis');
        $this->assertEquals('Miles Davis', $carte->getGetFullName());
    }

}