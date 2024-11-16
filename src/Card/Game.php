<?php
namespace App\Card;

class Game
{
    private DeckOfCards $deck;
    private Player $player;
    private Player $dealer;

    public function __construct()
    {
        $this->deck = new DeckOfCards();
        $this->deck->shuffle();
        $this->player = new Player("Player");
        $this->dealer = new Player("Dealer", true);
    }

    public function dealToPlayer(): CardGraphic
    {
        $card = $this->deck->draw(1)[0];
        $this->player->addCard($card);
        return $card;
    }

    public function dealToDealer(): CardGraphic
    {
        $card = $this->deck->draw(1)[0];
        $this->dealer->addCard($card);
        return $card;
    }

    public function getPlayer(): Player
    {
        return $this->player;
    }

    public function getDealer(): Player
    {
        return $this->dealer;
    }

    public function getDeck(): DeckOfCards
    {
        return $this->deck;
    }

    public function dealerTurn(): void
    {
        while ($this->dealer->getScore() < 17) {
            $this->dealToDealer();
        }
    }

    public function reset(): void
    {
        $this->deck = new DeckOfCards();
        $this->deck->shuffle();
        $this->player->resetHand();
        $this->dealer->resetHand();
    }
}
