<?php

namespace App\Tests\Entity;

use App\Entity\Transaction;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    public function testGettersAndSetters()
    {
        $transaction = new Transaction();

        $transaction->setType('income');
        $transaction->setAmount('1000.50');
        $transaction->setCategory('Salary');
        $transaction->setDescription('Monthly salary');
        $transaction->setDate(new \DateTime('2025-01-01'));

        $this->assertEquals('income', $transaction->getType());
        $this->assertEquals('1000.50', $transaction->getAmount());
        $this->assertEquals('Salary', $transaction->getCategory());
        $this->assertEquals('Monthly salary', $transaction->getDescription());
        $this->assertEquals('2025-01-01', $transaction->getDate()->format('Y-m-d'));
    }
}
