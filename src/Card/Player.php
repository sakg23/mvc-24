<?php

namespace App\Card;

class Player
{
    private string $name;
    private array $hand = []; // Cards in the player's hand
    private bool $isDealer;

    public function __construct(string $name, bool $isDealer = false)
    {
        $this->name = $name;
        $this->isDealer = $isDealer;
    }

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
            } elseif ($value > 10) { // Face cards (J, Q, K)
                $score += 10;
            } else {
                $score += $value;
            }
        }

        // Adjust for Aces if score exceeds 21
        while ($score > 21 && $aces > 0) {
            $score -= 13; // Switch Ace from 14 to 1
            $aces--;
        }

        return $score;
    }

    public function isDealer(): bool
    {
        return $this->isDealer;
    }

    public function resetHand(): void
    {
        $this->hand = [];
    }
}
