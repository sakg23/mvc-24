<?php

namespace App\Controller;

use App\Service\TransactionCalculator;
use App\Entity\Transaction;
use App\Form\TransactionType;
use App\Repository\TransactionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransactionController extends AbstractController
{
    #[Route("/proj", name: "proj", methods: ['GET'])]
    public function home(TransactionRepository $transactionRepository): Response
    {
        return $this->render('transaction/index.html.twig', [
            'transactions' => $transactionRepository->findAll(),
        ]);
    }

    #[Route("/proj/about", name: "proj_about", methods: ['GET'])]
    public function about(): Response
    {
        return $this->render('transaction/about.html.twig');
    }

    #[Route('/proj/add', name: 'transaction_add', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($transaction);
            $entityManager->flush();

            return $this->redirectToRoute('proj');
        }

        return $this->render('transaction/add.html.twig', [
            'transaction' => $transaction,
            'form' => $form,
        ]);
    }

    #[Route('/proj/edit/{id}', name: 'transaction_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Transaction $transaction, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('proj');
        }

        return $this->render('transaction/edit.html.twig', [
            'transaction' => $transaction,
            'form' => $form,
        ]);
    }

    #[Route('/proj/{id}', name: 'transaction_delete', methods: ['POST'])]
    public function delete(Request $request, Transaction $transaction, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transaction->getId(), $request->request->get('_token'))) {
            $entityManager->remove($transaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proj');
    }

    #[Route('/proj/average', name: 'transaction_averages')]
    public function averages(TransactionCalculator $calculator): Response
    {
        $currentYear = (int) date('Y');

        // Get monthly averages for income and expenses
        $monthlyIncomeAverages = $calculator->calculateMonthlyAverages('income', $currentYear);
        $monthlyExpenseAverages = $calculator->calculateMonthlyAverages('expense', $currentYear);

        // Get yearly averages for income and expenses
        $yearlyIncomeAverage = $calculator->calculateYearlyAverage('income', $currentYear);
        $yearlyExpenseAverage = $calculator->calculateYearlyAverage('expense', $currentYear);

        return $this->render('transaction/average.html.twig', [
            'monthlyIncomeAverages' => $monthlyIncomeAverages,
            'monthlyExpenseAverages' => $monthlyExpenseAverages,
            'yearlyIncomeAverage' => $yearlyIncomeAverage,
            'yearlyExpenseAverage' => $yearlyExpenseAverage,
        ]);
    }


}
