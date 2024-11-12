<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class LuckyControllerJson
{
    #[Route("/api", name: "api_home")]
    public function apiHome(): Response
    {
        $html = '
            <html>
                <body>
                    <h1>API Overview</h1>
                    <p>Welcome to the API landing page. Here are the available JSON routes:</p>
                    <ul>
                        <li><a href="/api/lucky/number">/api/lucky/number</a> - Returns a random lucky number in JSON format.</li>
                        <li><a href="/api/quote">/api/quote</a> - Returns a quote of the day in JSON format.</li>
                    </ul>
                </body>
            </html>
        ';

        return new Response($html);
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
}
