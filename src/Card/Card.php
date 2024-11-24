<?php

namespace App\Card;

/**
 * Represents a card in a deck of cards.
 */
class Card
{
    /**
     * The suit of the card (e.g., hearts, diamonds).
     *
     * @var string
     */
    private string $suit;

    /**
     * The value of the card (e.g., 1 for Ace, 11 for Jack).
     *
     * @var int
     */
    private int $value;

    /**
     * Constructs a card with a suit and value.
     *
     * @param string $suit The suit of the card.
     * @param int $value The value of the card.
     */
    public function __construct(string $suit, int $value)
    {
        $this->suit = $suit;
        $this->value = $value;
    }

    /**
     * Gets the suit of the card.
     *
     * @return string The suit of the card.
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * Gets the value of the card.
     *
     * @return int The value of the card.
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * Converts the card to its string representation.
     *
     * @return string The string representation of the card.
     */
    public function __toString(): string
    {
        $suits = ['hearts' => '♥', 'diamonds' => '♦', 'clubs' => '♣', 'spades' => '♠'];
        $values = [1 => 'A', 11 => 'J', 12 => 'Q', 13 => 'K'];
        $displayValue = $values[$this->value] ?? $this->value;  // Maps values like 1 to "A" (Ace), etc.
        return "{$displayValue}{$suits[$this->suit]}";
    }
}
