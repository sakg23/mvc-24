<?php

namespace App\Tests\Card;

use App\Card\Player;
use App\Card\CardGraphic;
use PHPUnit\Framework\TestCase;

class PlayerTest extends TestCase
{
    public function testPlayerScore(): void
    {
        $player = new Player();
        $player->addCard(new CardGraphic('hearts', 1)); // Ace
        $player->addCard(new CardGraphic('clubs', 10)); // 10
        $this->assertSame(11, $player->getScore());
    }

    public function testPlayerScoreWithAceAdjustment(): void
    {
        $player = new Player();
        $player->addCard(new CardGraphic('hearts', 1)); // Ace
        $player->addCard(new CardGraphic('spades', 10)); // 10
        $player->addCard(new CardGraphic('diamonds', 10)); // 10
        $this->assertSame(21, $player->getScore());
    }

    public function testResetHand(): void
    {
        $player = new Player();
        $player->addCard(new CardGraphic('hearts', 7));
        $player->resetHand();
        $this->assertCount(0, $player->getHand());
    }
}
