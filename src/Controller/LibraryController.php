<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
    #[Route('/library', name: 'library_index')]
    public function index(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();

        return $this->render('library/index.html.twig', ['books' => $books]);
    }

    #[Route('/library/create', name: 'library_create')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        if ($request->isMethod('POST')) {
            $book = new Book();
            $book->setTitle($request->request->get('title'));
            $book->setIsbn($request->request->get('isbn'));
            $book->setAuthor($request->request->get('author'));
            $book->setImage($request->request->get('image'));

            $entityManager = $doctrine->getManager();
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('library_index');
        }

        return $this->render('library/create.html.twig');
    }

    #[Route('/library/book/{id}', name: 'library_view')]
    public function view(Book $book): Response
    {
        return $this->render('library/view.html.twig', ['book' => $book]);
    }

    #[Route('/library/update/{id}', name: 'library_update')]
    public function update(Request $request, Book $book, ManagerRegistry $doctrine): Response
    {
        if ($request->isMethod('POST')) {
            $book->setTitle($request->request->get('title'));
            $book->setIsbn($request->request->get('isbn'));
            $book->setAuthor($request->request->get('author'));
            $book->setImage($request->request->get('image'));

            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('library_index');
        }

        return $this->render('library/update.html.twig', ['book' => $book]);
    }

    #[Route('/library/delete/{id}', name: 'library_delete', methods: ['POST'])]
    public function delete(Book $book, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $entityManager->remove($book);
        $entityManager->flush();

        return $this->redirectToRoute('library_index');
    }

    #[Route('/api/library/books', name: 'api_library_books')]
    public function apiBooks(BookRepository $bookRepository): Response
    {
        $books = $bookRepository->findAll();
        return $this->json($books);
    }

    #[Route('/api/library/book/{isbn}', name: 'api_library_book')]
    public function apiBook(BookRepository $bookRepository, string $isbn): Response
    {
        $book = $bookRepository->findOneBy(['isbn' => $isbn]);
        return $this->json($book);
    }
}
