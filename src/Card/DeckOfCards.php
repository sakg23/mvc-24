<?php

namespace App\Card;

class DeckOfCards
{
    private array $cards = [];

    public function __construct()
    {
        $suits = ['hearts', 'diamonds', 'clubs', 'spades'];
        foreach ($suits as $suit) {
            for ($value = 1; $value <= 13; $value++) {
                $this->cards[] = new CardGraphic($suit, $value);
            }
        }
    }

    public function shuffle(): void
    {
        shuffle($this->cards);
    }

    public function draw(int $count = 1): array
    {
        return array_splice($this->cards, 0, $count);  // Draws and removes cards from the deck
    }

    public function getCount(): int
    {
        return count($this->cards);
    }

    public function reset(): void
    {
        $this->__construct();  // Resets the deck by reinitializing it
    }

    public function getCards(): array
    {
        return $this->cards;
    }
}
