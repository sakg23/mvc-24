<?php

namespace App\Tests\Card;

use App\Card\Game;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    public function testGameInitialization(): void
    {
        $game = new Game();

        // Verify that the deck, player, and dealer objects are properly initialized
        $this->assertInstanceOf(\App\Card\DeckOfCards::class, $game->getDeck());
        $this->assertInstanceOf(\App\Card\Player::class, $game->getPlayer());
        $this->assertInstanceOf(\App\Card\Player::class, $game->getDealer());
    }

    public function testDealToPlayer(): void
    {
        $game = new Game();

        // Deal a card to the player and verify it is of the correct type
        $card = $game->dealToPlayer();
        $this->assertInstanceOf(\App\Card\CardGraphic::class, $card);

        // Check that the player's hand contains exactly one card
        $this->assertCount(1, $game->getPlayer()->getHand());
    }

    public function testDealerTurn(): void
    {
        $game = new Game();

        // Simulate the dealer's turn and ensure the dealer's score meets the rules
        $game->dealerTurn();
        $this->assertGreaterThanOrEqual(17, $game->getDealer()->getScore());
    }
}
