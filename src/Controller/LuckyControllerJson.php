<?php

namespace App\Controller;

use App\Card\DeckOfCards;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class LuckyControllerJson extends AbstractController
{
    #[Route("/api", name: "api_home")]
    public function apiHome(): Response
    {
        return $this->render('api.html.twig');
    }

    #[Route("/api/quote", name: "quote_json")]
    public function quote(): JsonResponse
    {
        $quotes = [
            "The journey of a thousand miles begins with one step.",
            "Life is what happens when you're busy making other plans.",
            "Success is not the key to happiness. Happiness is the key to success."
        ];

        $quote = $quotes[array_rand($quotes)];
        $date = new \DateTime();

        $data = [
            'quote' => $quote,
            'date' => $date->format('Y-m-d'),
            'timestamp' => $date->format('H:i:s')
        ];

        $response = new JsonResponse($data, JsonResponse::HTTP_OK, [], false);
        $response->setEncodingOptions(JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/lucky/number", name: "lucky_json")]
    public function lucky(): JsonResponse
    {
        $luckyNumber = random_int(1, 100);
        $data = ['luckyNumber' => $luckyNumber];

        $response = new JsonResponse($data, JsonResponse::HTTP_OK, [], false);
        $response->setEncodingOptions(JSON_PRETTY_PRINT);
        return $response;
    }

    #[Route("/api/deck", name: "api_deck", methods: ["GET"])]
    public function getDeck(SessionInterface $session): JsonResponse
    {
        $deck = $session->get('deck', new DeckOfCards());
        $cards = $deck->getCards();

        return $this->json([
            'deck' => $cards,
            'count' => $deck->getCount()
        ]);
    }

    #[Route("/api/deck/shuffle", name: "api_deck_shuffle", methods: ["POST"])]
    public function shuffleDeck(SessionInterface $session): JsonResponse
    {
        $deck = new DeckOfCards();
        $deck->shuffle();
        $session->set('deck', $deck);

        return $this->json([
            'message' => 'Deck shuffled!',
            'deck' => $deck->getCards(),
            'count' => $deck->getCount()
        ]);
    }

    #[Route("/api/deck/draw", name: "api_deck_draw_one", methods: ["POST"])]
    public function drawOne(SessionInterface $session): JsonResponse
    {
        $deck = $session->get('deck', new DeckOfCards());

        // Draw one card
        $drawnCards = $deck->draw(1);
        $session->set('deck', $deck);

        return $this->json([
            'drawn_cards' => $drawnCards,
            'cards_left' => $deck->getCount()
        ]);
    }

    #[Route("/api/card/deck/draw/{number<\d+>?1}", name: "api_deck_draw_multiple", methods: ["POST"])]
    public function draw(SessionInterface $session, int $number = 1): JsonResponse
    {
        $deck = $session->get('deck');
        $newDraw = $deck->draw($number);

        $drawnCards = $session->get('drawn_cards', []);
        $drawnCards = array_merge($drawnCards, $newDraw);

        $session->set('deck', $deck);
        $session->set('drawn_cards', $drawnCards);

        return $this->json([
            'drawn_cards' => $drawnCards,
            'cards_in_deck' => $deck->getCount()
        ]);
    }

}
