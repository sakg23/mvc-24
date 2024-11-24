<?php

namespace App\Tests\Card;

use App\Card\Card;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testCardInitialization(): void
    {
        $card = new Card('hearts', 1);
        $this->assertSame('hearts', $card->getSuit());
        $this->assertSame(1, $card->getValue());
    }

    public function testCardToString(): void
    {
        $card = new Card('diamonds', 11);
        $this->assertSame('J♦', (string) $card);

        $card = new Card('spades', 1);
        $this->assertSame('A♠', (string) $card);
    }
}
