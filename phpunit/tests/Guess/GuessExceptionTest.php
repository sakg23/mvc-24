<?php

namespace Mos\Guess;

use PHPUnit\Framework\TestCase;

class GuessExceptionTest extends TestCase
{
        /**
     * Verify GuessException when guess is to high.
     */
    public function testGuessToHigh()
    {
        $guess = new Guess();

        $this->expectException(GuessException::class);
        $guess->makeGuess(101);
    }
}