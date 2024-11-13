<?php

namespace App\Card;

class Card
{
    private string $suit;
    private int $value;

    public function __construct(string $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    public function getSuit(): string
    {
        return $this->suit;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function __toString(): string
    {
        $suits = ['hearts' => '♥', 'diamonds' => '♦', 'clubs' => '♣', 'spades' => '♠'];
        $values = [1 => 'A', 11 => 'J', 12 => 'Q', 13 => 'K'];
        $displayValue = $values[$this->value] ?? $this->value;  // Maps values like 1 to "A" (Ace), etc.
        return "{$displayValue}{$suits[$this->suit]}";
    }
}
