<?php

namespace App\Card;

class CardGraphic extends Card
{
    private array $suitSymbols = [
        'hearts' => '♥',
        'diamonds' => '♦',
        'clubs' => '♣',
        'spades' => '♠',
    ];

    private array $valueSymbols = [
        1 => 'A',  // Ace
        11 => 'J', // Jack
        12 => 'Q', // Queen
        13 => 'K', // King
    ];

    public function __construct(string $suit, int $value)
    {
        parent::__construct($suit, $value);
    }

    public function getAsString(): string
    {
        $suitSymbol = $this->suitSymbols[$this->getSuit()] ?? '';
        $valueSymbol = $this->valueSymbols[$this->getValue()] ?? $this->getValue();
        return "{$valueSymbol}{$suitSymbol}";
    }

    public function __toString(): string
{
    return "[{$this->getAsString()}]";
}

}
