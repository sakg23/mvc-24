<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerTwig extends AbstractController
{
    #[Route("/", name: "home")]
    #[Route("/home", name: "home_alternative")]
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function report(): Response
    {
        $reports = [
            'kmom01' => 'Hej där! Här är en kort sammanfattning om mina erfarenheter och reflektioner kring detta kursmoment.
            Jag har tidigare erfarenhet av objektorienterad programmering, särskilt genom att ha arbetat med Python och dess OOP-struktur, vilket har gett mig en bra grund även om jag fortfarande utvecklar min förståelse. PHP:s modell för klasser och objekt är ganska intuitiv om man har tidigare programmeringskunskaper, och jag har även en del kunskap från webteknologikursen. För att komma igång i PHP behöver man förstå grunderna som klasser, objekt, egenskaper och metoder – det handlar om att organisera koden modulärt och lättläst.
            När det gäller uppgiften me/report upplever jag kodbasen som väl strukturerad och lätt att följa. Uppdelningen av olika routes och funktioner i separata metoder och kontroller gör det tydligt vilken del som ansvarar för vad, vilket underlättar både läsbarhet och underhåll.
            I artikeln “PHP The Right Way” fann jag särskilt avsnittet om modern PHP och bästa praxis intressant. Det är inspirerande att få en översikt av de senaste funktionerna och hur man kan använda dem effektivt. Jag är också nyfiken på att fördjupa mig mer i hur ramverk som Symfony fungerar och hur det kan underlätta byggandet av robusta webbapplikationer.
            Min TIL (Today I Learned) för detta moment är vikten av att ständigt utvecklas och ta till sig nya lärdomar. Även med tidigare erfarenhet finns det alltid nytt att lära, och jag ser fram emot att fortsätta fördjupa min kunskap och förbättra mina färdigheter inom webbprogrammering.',
            'kmom02' => 'Beskrivning för kmom02',
            // Lägg till fler kursmoment här om du behöver
        ];

        return $this->render('report.html.twig', ['reports' => $reports]);
    }

    #[Route("/lucky", name: "lucky")]
    public function lucky(): Response
    {
        $luckyNumber = random_int(1, 100);
        return $this->render('lucky_number.html.twig', ['luckyNumber' => $luckyNumber]);
    }
}
