<?php

namespace App\Tests\Card;

use App\Card\CardGraphic;
use PHPUnit\Framework\TestCase;

class CardGraphicTest extends TestCase
{
    public function testCardGraphicToString(): void
    {
        $card = new CardGraphic('clubs', 13);
        $this->assertSame('[K♣]', (string) $card);

        $card = new CardGraphic('hearts', 7);
        $this->assertSame('[7♥]', (string) $card);
    }
}
