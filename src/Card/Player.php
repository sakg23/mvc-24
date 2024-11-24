<?php

namespace App\Card;

class Player
{
    private array $hand = []; // Cards in the player's hand

    public function addCard(CardGraphic $card): void
    {
        $this->hand[] = $card;
    }

    public function getHand(): array
    {
        return $this->hand;
    }

    public function getScore(): int
    {
        $score = 0;
        $aces = 0;

        foreach ($this->hand as $card) {
            $value = $card->getValue();
            if ($value === 1) { // Ace
                $aces++;
                $score += 14; // Default high value for Ace
                continue;
            }

            if ($value > 10) { // Face cards (J, Q, K)
                $score += 10;
                continue;
            }

            $score += $value;
        }

        // Adjust for Aces if score exceeds 21
        while ($score > 21 && $aces > 0) {
            $score -= 13; // Switch Ace from 14 to 1
            $aces--;
        }

        return $score;
    }

    public function resetHand(): void
    {
        $this->hand = [];
    }
}

class Dealer extends Player
{
    public function __construct()
    {
    }
}
