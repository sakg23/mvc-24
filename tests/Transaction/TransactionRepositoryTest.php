<?php

namespace App\Tests\Repository;

use App\Entity\Transaction;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class TransactionRepositoryTest extends KernelTestCase
{
    private $entityManager;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $this->entityManager = self::$kernel->getContainer()->get('doctrine')->getManager();

        // Clear the database
        $connection = $this->entityManager->getConnection();
        $connection->executeStatement('DELETE FROM `transaction`');

        // Seed test data
        $this->seedTestData();
    }

    private function seedTestData(): void
    {
        $transaction1 = new Transaction();
        $transaction1->setType('income');
        $transaction1->setAmount('500.00');
        $transaction1->setCategory('Salary');
        $transaction1->setDescription('January Salary');
        $transaction1->setDate(new \DateTime('2025-01-15'));

        $this->entityManager->persist($transaction1);

        $transaction2 = new Transaction();
        $transaction2->setType('expense');
        $transaction2->setAmount('200.00');
        $transaction2->setCategory('Groceries');
        $transaction2->setDescription('Monthly Groceries');
        $transaction2->setDate(new \DateTime('2025-01-20'));

        $this->entityManager->persist($transaction2);

        $this->entityManager->flush();
    }

    public function testFindByTypeAndMonth(): void
    {
        $repository = $this->entityManager->getRepository(Transaction::class);

        // Fetch transactions of type "income" for January 2025
        $results = $repository->findByTypeAndMonth('income', 2025, 1);

        // Debugging: Print results
        print_r($results);

        $this->assertCount(1, $results); // Ensure only one transaction is returned
        $this->assertEquals('income', $results[0]['type']);
        $this->assertEquals('500.00', $results[0]['amount']);
        $this->assertEquals('2025-01-15', $results[0]['date']);
    }

    public function testFindByTypeAndYear(): void
    {
        $repository = $this->entityManager->getRepository(Transaction::class);

        // Fetch transactions of type "expense" for the year 2025
        $results = $repository->findByTypeAndYear('expense', 2025);

        $this->assertCount(1, $results); // Ensure only one transaction is returned
        $this->assertEquals('expense', $results[0]['type']);
        $this->assertEquals('200.00', $results[0]['amount']);
        $this->assertEquals('2025-01-20', $results[0]['date']);
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // Remove all data after tests
        $connection = $this->entityManager->getConnection();
        $connection->executeStatement('DELETE FROM `transaction`');

        $this->entityManager->close();
        $this->entityManager = null; // Avoid memory leaks
    }
}
