<?php

namespace App\Controller;

use App\Card\DeckOfCards;
use App\Card\Card;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CardGameController extends AbstractController
{
    #[Route("/card", name: "card_init")]
    public function home(
        SessionInterface $session
    ): Response {
        if (!$session->has('deck')) {
            $session->set('deck', new DeckOfCards());
        }
        return $this->render('card/home.html.twig', [
            'cards_in_deck' => $session->get('deck')->getCount()
        ]);
    }

    #[Route("/card/deck", name: "card_deck")]
    public function deck(
        SessionInterface $session
    ): Response {
        $deck = $session->get('deck');
        return $this->render('card/deck.html.twig', [
            'deck' => $deck->getCards()
        ]);
    }

    #[Route("/card/deck/shuffle", name: "card_shuffle")]
    public function shuffle(
        SessionInterface $session
    ): Response {
        $deck = new DeckOfCards();
        $deck->shuffle();
        $session->set('deck', $deck);
        $session->remove('drawn_cards');
        $this->addFlash('notice', 'Deck shuffled!');
        return $this->redirectToRoute('card_deck');
    }

    #[Route("/card/deck/draw/{number<\d+>?1}", name: "card_draw")]
    public function draw(
        SessionInterface $session,
        int $number = 1
    ): Response {
        $deck = $session->get('deck');

        // Draw the specified number of cards (1 by default if not provided)
        $newDraw = $deck->draw($number);

        // Retrieve all previously drawn cards from the session, or create a new array if it doesn't exist
        $drawnCards = $session->get('drawn_cards', []);

        // Add the newly drawn cards to the list of already drawn cards
        $drawnCards = array_merge($drawnCards, $newDraw);

        // Update the session with the modified deck and the full list of drawn cards
        $session->set('deck', $deck);
        $session->set('drawn_cards', $drawnCards);

        return $this->render('card/draw.html.twig', [
            'drawn_cards' => $drawnCards,
            'cards_in_deck' => $deck->getCount()
        ]);
    }

    #[Route("/card/session", name: "card_session")]
    public function sessionOverview(
        SessionInterface $session
    ): Response {
        return $this->render('card/session.html.twig', [
            'session_data' => $session->all()
        ]);
    }

    #[Route("/card/session/delete", name:"card_session_delete")]
    public function deleteSession(
        SessionInterface $session
    ): Response {
        $session->clear();
        $this->addFlash('notice', 'Session cleared!');
        return $this->redirectToRoute('card_session');
    }
}
