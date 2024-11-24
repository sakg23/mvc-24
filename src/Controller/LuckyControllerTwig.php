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
            'Kmom01' => 'Hej där! Här är en kort sammanfattning om mina erfarenheter och reflektioner kring detta kursmoment.
            Jag har tidigare erfarenhet av objektorienterad programmering, särskilt genom att ha arbetat med Python och dess OOP-struktur, vilket har gett mig en bra grund även om jag fortfarande utvecklar min förståelse. PHP:s modell för klasser och objekt är ganska intuitiv om man har tidigare programmeringskunskaper, och jag har även en del kunskap från webteknologikursen. För att komma igång i PHP behöver man förstå grunderna som klasser, objekt, egenskaper och metoder – det handlar om att organisera koden modulärt och lättläst.
            När det gäller uppgiften me/report upplever jag kodbasen som väl strukturerad och lätt att följa. Uppdelningen av olika routes och funktioner i separata metoder och kontroller gör det tydligt vilken del som ansvarar för vad, vilket underlättar både läsbarhet och underhåll.
            I artikeln “PHP The Right Way” fann jag särskilt avsnittet om modern PHP och bästa praxis intressant. Det är inspirerande att få en översikt av de senaste funktionerna och hur man kan använda dem effektivt. Jag är också nyfiken på att fördjupa mig mer i hur ramverk som Symfony fungerar och hur det kan underlätta byggandet av robusta webbapplikationer.
            Min TIL (Today I Learned) för detta moment är vikten av att ständigt utvecklas och ta till sig nya lärdomar. Även med tidigare erfarenhet finns det alltid nytt att lära, och jag ser fram emot att fortsätta fördjupa min kunskap och förbättra mina färdigheter inom webbprogrammering.',
            'Kmom02' => 'Komposition innebär att en klass innehåller instanser av en annan klass. Detta används för att bygga komplexa objekt som består av flera delar, vilket gör det möjligt att dela funktionalitet på ett flexibelt sätt utan att använda arv. I PHP skapar du objekt inuti andra objekt för att uppnå komposition. 
            Interface definierar en standardiserad uppsättning metoder som en klass måste implementera, utan att specificera hur dessa metoder utförs. Detta tillåter olika klasser att implementera samma interface men på olika sätt. Interfaces i PHP deklareras med nyckelordet interface och implementeras med implements. Trait är en mekanism i PHP som tillåter utvecklare att återanvända kod i klasser genom att inkludera trait i klassen. Detta är särskilt användbart i språk som PHP där multipelt arv inte är tillåtet. Traits inkluderas i klasser med use. Jag löste uppgiften genom att skapa en DeckController i Symfony som hanterar en kortlek. 
            Kontrollern inkluderar metoder för att visa, blanda, dra, och dela ut kort från kortleken, och all funktionalitet är tillgänglig genom ett RESTful API. Nöjd/Missnöjd: Jag är överlag nöjd med hur jag implementerade uppgiften, speciellt med hur jag organiserade koden och använde Symfonys funktioner. Jag är dock mindre nöjd med hur jag hanterade sessioner, eftersom det kändes som jag kunde ha gjort det mer effektivt. Förbättringspotential: I framtiden skulle jag vilja förbättra hanteringen av sessioner för att göra API:t mer robust och säkert. Dessutom skulle jag kunna lägga till mer felhantering och validering för att hantera olika felaktiga input från användarna bättre. 
            Att arbeta med Symfony och följa MVC (Model-View-Controller) mönstret har varit mycket lärorikt. MVC-strukturen hjälper till att hålla koden organiserad och separerar logik på ett sätt som gör applikationen lättare att underhålla och utveckla vidare. Symfony erbjuder en robust struktur och många verktyg som underlättar utvecklingen, men det kräver också en del inlärning för att förstå alla delar av ramverket fullt ut. TIL för detta kursmoment,i detta kursmoment lärde jag mig framför allt vikten av att noggrant planera och strukturera en API-design. Jag insåg också hur kraftfullt Symfony kan vara när det kommer till att bygga webbapplikationer, och jag fick en djupare förståelse för hur sessionshantering kan implementeras i ett webb-API. 
            Genom att lösa denna uppgift har jag fått praktisk erfarenhet av objektorienterade principer i PHP och hur de kan tillämpas i en verklig applikation.',
            'Kmom03' => 'Att modellera ett kortspel med hjälp av flödesdiagram och pseudokod var både utmanande och givande. Flödesdiagrammet hjälpte mig att visualisera spelets logik och identifiera de viktigaste stegen i varje delmoment, från spelarens tur till bankens drag och jämförelse av poäng. Pseudokoden gjorde det enklare att bryta ner spelets mekanik i mindre delar och att planera hur klasserna skulle samverka. Det känns som en metodik som verkligen stödjer problemlösning och hjälper till att strukturera tankarna innan jag skriver själva koden.
            I min implementation använde jag tidigare klasser som jag redan byggt, som representerade kort och kortleken. Jag skapade två nya klasser: en för spelaren och en för spelets logik. Genom att återanvända kod kunde jag hålla implementationen enkel och fokuserad. Jag är nöjd med hur det blev, men ser att det finns förbättringspotential, särskilt när det gäller att hantera fler avancerade spelscenarion eller att göra koden mer flexibel för andra typer av kortspel. Applikationen fungerar bra för grundreglerna, men jag skulle gärna lägga till fler funktioner, som statistik eller möjlighet att satsa poäng.
            Att koda i Symfony känns fortfarande som en utmaning, men det är också väldigt lärorikt. Jag uppskattar hur ramverket hjälper till att strukturera applikationen och erbjuder många färdiga lösningar, men ibland kan det kännas överväldigande med alla koncept som måste förstås för att saker ska fungera korrekt. Det blir dock enklare ju mer jag arbetar med det.
            Min största TIL (Today I Learned) från detta kmom är hur viktigt det är att planera ordentligt innan jag börjar koda. Flödesdiagram och pseudokod var ett utmärkt stöd, och jag inser hur värdefullt det är att lägga tid på att tänka igenom applikationens struktur innan man börjar implementera. Det gör arbetet mer effektivt och minskar risken för misstag.',
            'Kmom04' => 'Under detta kmom har jag fått jobba mycket med att skriva tester i PHPUnit, vilket var både utmanande och lärorikt. Att skriva kod som testar annan kod kändes i början ganska ovant, och jag insåg snabbt att det kräver ett annat sätt att tänka. Det handlar inte bara om att skriva funktionalitet utan också om att säkerställa att den verkligen fungerar som tänkt, och att alla möjliga scenarier täcks in. Jag tyckte att PHPUnit som verktyg var kraftfullt men ibland lite frustrerande, särskilt när jag stötte på felmeddelanden som var svåra att tolka. Men när jag väl förstod flödet blev det tydligare och jag kunde börja uppskatta dess struktur och effektivitet.
            När det gäller kodtäckningen lyckades jag nå över 90% för flera av mina modellklasser, vilket jag är riktigt nöjd med. Jag fokuserade på att skriva tester som täckte så många grenar och scenarier som möjligt. Det var också en bra övning att använda kodtäckningsrapporten för att identifiera vilka delar som saknade tester och därefter förbättra dem.
            Min egen kod känns till största delen som “testbar kod”, men det fanns definitivt delar som var mer utmanande att testa. Till exempel var vissa klasser mindre testbara eftersom de hade hårt kopplade beroenden eller saknade tydlig struktur för att hantera vissa fall. Jag märkte att jag behövde skriva om delar av koden för att göra den mer modulär och isolerad, vilket gjorde att testerna blev lättare att skriva och förstå. Ett exempel var att ta bort parametrar från vissa konstruktörer, eftersom de inte längre behövdes, vilket både förenklade koden och förbättrade testbarheten.
            Jag tycker att testbar kod ofta är ett tecken på snygg och ren kod. När jag skrev om delar av koden insåg jag att kod som är lätt att testa också blir lättare att läsa, underhålla och utveckla vidare. Det handlar om att skapa tydliga gränser mellan klasser och metoder, och att hålla dem fokuserade på enskilda ansvarsområden.
            Min TIL (Today I Learned) för detta kmom är definitivt hur viktigt det är att skriva testbar kod från början och hur mycket det kan underlätta när man arbetar med ett projekt över tid. Jag har också lärt mig att vara tålmodig med både testskrivning och felsökning, eftersom det är en process som kräver noggrannhet och uthållighet. Att se resultatet av tester som går igenom och en hög kodtäckning var verkligen motiverande och gav en känsla av kontroll över koden.'
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
