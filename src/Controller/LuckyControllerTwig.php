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
            'kmom02' => 'Komposition innebär att en klass innehåller instanser av en annan klass. Detta används för att bygga komplexa objekt som består av flera delar, vilket gör det möjligt att dela funktionalitet på ett flexibelt sätt utan att använda arv. I PHP skapar du objekt inuti andra objekt för att uppnå komposition. 
            Interface definierar en standardiserad uppsättning metoder som en klass måste implementera, utan att specificera hur dessa metoder utförs. Detta tillåter olika klasser att implementera samma interface men på olika sätt. Interfaces i PHP deklareras med nyckelordet interface och implementeras med implements. Trait är en mekanism i PHP som tillåter utvecklare att återanvända kod i klasser genom att inkludera trait i klassen. Detta är särskilt användbart i språk som PHP där multipelt arv inte är tillåtet. Traits inkluderas i klasser med use. Jag löste uppgiften genom att skapa en DeckController i Symfony som hanterar en kortlek. 
            Kontrollern inkluderar metoder för att visa, blanda, dra, och dela ut kort från kortleken, och all funktionalitet är tillgänglig genom ett RESTful API. Nöjd/Missnöjd: Jag är överlag nöjd med hur jag implementerade uppgiften, speciellt med hur jag organiserade koden och använde Symfonys funktioner. Jag är dock mindre nöjd med hur jag hanterade sessioner, eftersom det kändes som jag kunde ha gjort det mer effektivt. Förbättringspotential: I framtiden skulle jag vilja förbättra hanteringen av sessioner för att göra API:t mer robust och säkert. Dessutom skulle jag kunna lägga till mer felhantering och validering för att hantera olika felaktiga input från användarna bättre. 
            Att arbeta med Symfony och följa MVC (Model-View-Controller) mönstret har varit mycket lärorikt. MVC-strukturen hjälper till att hålla koden organiserad och separerar logik på ett sätt som gör applikationen lättare att underhålla och utveckla vidare. Symfony erbjuder en robust struktur och många verktyg som underlättar utvecklingen, men det kräver också en del inlärning för att förstå alla delar av ramverket fullt ut. TIL för detta kursmoment,i detta kursmoment lärde jag mig framför allt vikten av att noggrant planera och strukturera en API-design. Jag insåg också hur kraftfullt Symfony kan vara när det kommer till att bygga webbapplikationer, och jag fick en djupare förståelse för hur sessionshantering kan implementeras i ett webb-API. 
            Genom att lösa denna uppgift har jag fått praktisk erfarenhet av objektorienterade principer i PHP och hur de kan tillämpas i en verklig applikation.',
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
