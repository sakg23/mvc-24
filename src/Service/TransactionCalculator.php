<?php

namespace App\Service;

use App\Repository\TransactionRepository;

class TransactionCalculator
{
    private TransactionRepository $transactionRepository;

    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    // Calculate Monthly Averages
    public function calculateMonthlyAverages(string $type, int $year): array
    {
        // Fetch all transactions of the given type for the year
        $transactions = $this->transactionRepository->findByTypeAndYear($type, $year);

        // Initialize monthly totals for all months (1 to 12)
        $monthlyTotals = array_fill(1, 12, 0);

        // Group transactions by month
        foreach ($transactions as $transaction) {
            $month = (int)date('m', strtotime($transaction['date'])); // Convert to integer for numerical sorting
            $monthlyTotals[$month] += $transaction['amount'];
        }

        // Convert monthly totals into averages (if needed)
        $monthlyAverages = [];
        foreach ($monthlyTotals as $month => $total) {
            $monthlyAverages[$month] = $total; // Add totals as averages
        }

        return $monthlyAverages;
    }

    // Calculate Yearly Average
    public function calculateYearlyAverage(string $type, int $year): float
    {
        // Fetch transactions for the given type and year
        $transactions = $this->transactionRepository->findByTypeAndYear($type, $year);

        if (count($transactions) === 0) {
            return 0;
        }

        // Calculate the total amount
        $total = array_reduce($transactions, function ($sum, $transaction) {
            return $sum + $transaction['amount'];
        }, 0);

        // Divide by 12 months (for a full year's average)
        return $total / 12;
    }
}
