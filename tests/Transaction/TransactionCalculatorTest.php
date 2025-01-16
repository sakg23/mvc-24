<?php

namespace App\Tests\Service;

use App\Service\TransactionCalculator;
use App\Repository\TransactionRepository;
use PHPUnit\Framework\TestCase;

class TransactionCalculatorTest extends TestCase
{
    private TransactionRepository $repositoryMock;
    private TransactionCalculator $calculator;

    protected function setUp(): void
    {
        $this->repositoryMock = $this->createMock(TransactionRepository::class);
        $this->calculator = new TransactionCalculator($this->repositoryMock);
    }

    // Test monthly average calculation
    public function testCalculateMonthlyAverages()
    {
        $this->repositoryMock
            ->method('findByTypeAndYear')
            ->willReturn([
                ['date' => '2025-01-01', 'amount' => 1000],
                ['date' => '2025-01-15', 'amount' => 500],
            ]);

        $result = $this->calculator->calculateMonthlyAverages('income', 2025);

        $this->assertIsArray($result);
        $this->assertEquals(1500, $result[1]); // January total
    }

    // Test yearly average calculation
    public function testCalculateYearlyAverage()
    {
        $this->repositoryMock
            ->method('findByTypeAndYear')
            ->willReturn([
                ['amount' => 12000],
                ['amount' => 6000],
            ]);

        $result = $this->calculator->calculateYearlyAverage('income', 2025);

        $this->assertEquals(1500, $result); // Yearly average
    }
}
