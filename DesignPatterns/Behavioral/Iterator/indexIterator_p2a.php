<?php

class Book2
{
    private $author;
    private $title;

    function __construct($title_in, $author_in)
    {
        $this->author = $author_in;
        $this->title = $title_in;
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getAuthorAndTitle()
    {
        return $this->getTitle() . ' by ' . $this->getAuthor();
    }
}

class BookList2
{
    private $books = [];
    private $bookCount = 0;

    public function __construct()
    {
    }

    public function getBookCount()
    {
        return $this->bookCount;
    }

    private function setBookCount($newCount)
    {
        $this->bookCount = $newCount;
    }

    public function getBook($bookNumberToGet)
    {
        if (
            (is_numeric($bookNumberToGet))
            && ($bookNumberToGet <= $this->getBookCount())
        ) {
            return $this->books[$bookNumberToGet];
        } else {
            return NULL;
        }
    }

    public function addBook(Book2 $book_in)
    {
        $this->setBookCount($this->getBookCount() + 1);
        $this->books[$this->getBookCount()] = $book_in;
        return $this->getBookCount();
    }

    public function removeBook(Book2 $book_in)
    {
        $counter = 0;
        while (++$count <= $this->getBookCount()) {
            if ($book_in->getAuthorAndTitle() == $this->books[$couter]->getAuthorAndTitle()) {
                for ($x = $counter; $x < $this->getBookCount(); $x++) {
                    $this->books[$x] = $this->books[$x + 1];
                }
                $this->setBookCount($this->getBookCount() - 1);
            }
        }
        return $this->getBookCount();
    }
}

class BookListIterator
{

}




