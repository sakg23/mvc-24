<?php

namespace App\Tests\Card;

use App\Card\DeckOfCards;
use PHPUnit\Framework\TestCase;

class DeckOfCardsTest extends TestCase
{
    public function testDeckInitialization(): void
    {
        $deck = new DeckOfCards();
        $this->assertCount(52, $deck->getCards());
    }

    public function testDeckShuffle(): void
    {
        $deck = new DeckOfCards();
        $originalOrder = $deck->getCards();
        $deck->shuffle();
        $this->assertNotEquals($originalOrder, $deck->getCards());
    }

    public function testDeckDraw(): void
    {
        $deck = new DeckOfCards();
        $drawnCards = $deck->draw(2);
        $this->assertCount(2, $drawnCards);
        $this->assertCount(50, $deck->getCards());
    }
}
