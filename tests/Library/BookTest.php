<?php

namespace App\Tests\Entity;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testGetSetTitle()
    {
        $book = new Book();
        $book->setTitle('Test Title');
        $this->assertEquals('Test Title', $book->getTitle());
    }

    public function testGetSetIsbn()
    {
        $book = new Book();
        $book->setIsbn('1234567890123');
        $this->assertEquals('1234567890123', $book->getIsbn());
    }

    public function testGetSetAuthor()
    {
        $book = new Book();
        $book->setAuthor('John Doe');
        $this->assertEquals('John Doe', $book->getAuthor());
    }

    public function testGetSetImage()
    {
        $book = new Book();
        $book->setImage('image.jpg');
        $this->assertEquals('image.jpg', $book->getImage());
    }
}
