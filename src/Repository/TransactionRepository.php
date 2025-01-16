<?php

namespace App\Repository;

use App\Entity\Transaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TransactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transaction::class);
    }

    public function findByTypeAndMonth(string $type, int $year, int $month): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM `transaction`
            WHERE type = :type
            AND strftime("%Y", date) = :year
            AND strftime("%m", date) = :month
        ';

        $stmt = $conn->executeQuery($sql, [
            'type' => $type,
            'year' => (string) $year,
            'month' => str_pad((string) $month, 2, '0', STR_PAD_LEFT),
        ]);

        return $stmt->fetchAllAssociative();
    }

    public function findByTypeAndYear(string $type, int $year): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM `transaction`
            WHERE type = :type
            AND strftime("%Y", date) = :year
        ';

        $stmt = $conn->executeQuery($sql, [
            'type' => $type,
            'year' => (string) $year, // Cast year to string
        ]);

        return $stmt->fetchAllAssociative();
    }


}
