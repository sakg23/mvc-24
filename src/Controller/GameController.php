<?php

namespace App\Controller;

use App\Card\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route("/game", name: "game_home")]
    public function home(): Response
    {
        return $this->render('game/home.html.twig');
    }

    #[Route("/game/doc", name: "game_doc")]
    public function documentation(): Response
    {
        return $this->render('game/doc.html.twig');
    }

    #[Route("/game/play", name: "game_play")]
    public function play(SessionInterface $session): Response
    {
        if (!$session->has('game')) {
            $session->set('game', new Game());
        }
        /** @var Game $game */
        $game = $session->get('game');

        return $this->render('game/play.html.twig', [
            'player' => $game->getPlayer(),
            'dealer' => $game->getDealer(),
        ]);
    }

    #[Route("/game/hit", name: "game_hit")]
    public function hit(SessionInterface $session): Response
    {
        /** @var Game $game */
        $game = $session->get('game');
        $game->dealToPlayer();

        if ($game->getPlayer()->getScore() > 21) {
            $this->addFlash('notice', 'You busted! Dealer wins.');
            return $this->redirectToRoute('game_result');
        }

        return $this->redirectToRoute('game_play');
    }

    #[Route("/game/stand", name: "game_stand")]
    public function stand(SessionInterface $session): Response
    {
        /** @var Game $game */
        $game = $session->get('game');
        $game->dealerTurn();

        return $this->redirectToRoute('game_result');
    }

    #[Route("/game/result", name: "game_result")]
    public function result(SessionInterface $session): Response
    {
        /** @var Game $game */
        $game = $session->get('game');
        $playerScore = $game->getPlayer()->getScore();
        $dealerScore = $game->getDealer()->getScore();

        // Apply the new rules
        $winner = $this->determineWinner($playerScore, $dealerScore);

        return $this->render('game/result.html.twig', [
            'player' => $game->getPlayer(),
            'dealer' => $game->getDealer(),
            'winner' => $winner,
        ]);
    }

    private function determineWinner(int $playerScore, int $dealerScore): string
    {
        if ($playerScore > 21) {
            return "Banken vinner! Du gick över 21.";
        }

        if ($dealerScore > 21) {
            return "Du vinner! Banken gick över 21.";
        }

        if ($playerScore > $dealerScore) {
            return "Du vinner!";
        }

        if ($playerScore < $dealerScore) {
            return "Banken vinner!";
        }

        return "Banken vinner! (oavgjort)";
    }

    #[Route("/game/reset", name: "game_reset")]
    public function reset(SessionInterface $session): Response
    {
        $session->set('game', new Game());
        return $this->redirectToRoute('game_play');
    }
}
