<?php

class SimpleBook
{
    private $author;
    private $title;

    function __construct($author_in, $title_in)
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
}

class BookAdapter
{
    private $book;

    function __construct(SimpleBook $book_in)
    {
        $this->book = $book_in;
    }

    function getAuthorAndTitle()
    {
        return $this->book->getTitle() . ' by ' . $this->book->getAuthor();
    }
}

// client

writeln('');

$book = new SimpleBook("Author Book Simple", "Title Book Simple");
$bookAdapter = new BookAdapter($book);
writeln('Author and Title: ' . $bookAdapter->getAuthorAndTitle());
writeln('');


function writeln($line_in)
{
    echo $line_in . "<br/>";
}

/* kq:

Author and Title: Title Book Simple by Author Book Simple
