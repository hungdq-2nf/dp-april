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
    private $books = array();
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
        if ((is_numeric($bookNumberToGet)) &&
            ($bookNumberToGet <= $this->getBookCount())) {
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
        while (++$counter <= $this->getBookCount()) {
            if ($book_in->getAuthorAndTitle() ==
                $this->books[$counter]->getAuthorAndTitle()) {
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
    protected $bookList;
    protected $currentBook = 0;

    public function __construct(BookList2 $bookList_in)
    {
        $this->bookList = $bookList_in;
    }

    public function getCurrentBook()
    {
        if (($this->currentBook > 0) &&
            ($this->bookList->getBookCount() >= $this->currentBook)) {
            return $this->bookList->getBook($this->currentBook);
        }
    }

    public function getNextBook()
    {
        if ($this->hasNextBook()) {
            return $this->bookList->getBook(++$this->currentBook);
        } else {
            return NULL;
        }
    }

    public function hasNextBook()
    {
        if ($this->bookList->getBookCount() > $this->currentBook) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

class BookListReverseIterator extends BookListIterator
{
    public function __construct(BookList2 $bookList_in)
    {
        $this->bookList = $bookList_in;
        $this->currentBook = $this->bookList->getBookCount() + 1;
    }

    public function getNextBook()
    {
        if ($this->hasNextBook()) {
            return $this->bookList->getBook(--$this->currentBook);
        } else {
            return NULL;
        }
    }

    public function hasNextBook()
    {
        if (1 < $this->currentBook) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}


writeln('');

$firstBook = new Book2('Title Book first', 'Author Book first');
$secondBook = new Book2('Title Book second', 'Author Book second');
$thirdBook = new Book2('Title Book third', 'Author Book third');

$books = new BookList2();
$books->addBook($firstBook);
$books->addBook($secondBook);
$books->addBook($thirdBook);

writeln('Testing the Iterator');

$booksIterator = new BookListIterator($books);

while ($booksIterator->hasNextBook()) {
    $book = $booksIterator->getNextBook();
    writeln('getting next book with iterator :');
    writeln($book->getAuthorAndTitle());
    writeln('');
}

$book = $booksIterator->getCurrentBook();
writeln('getting current book with iterator :');
writeln($book->getAuthorAndTitle());
writeln('');

writeln('Testing the Reverse Iterator');

$booksReverseIterator = new BookListReverseIterator($books);

while ($booksReverseIterator->hasNextBook()) {
    $book = $booksReverseIterator->getNextBook();
    writeln('getting next book with reverse iterator :');
    writeln($book->getAuthorAndTitle());
    writeln('');
}

$book = $booksReverseIterator->getCurrentBook();
writeln('getting current book with reverse iterator :');
writeln($book->getAuthorAndTitle());
writeln('');

function writeln($line_in)
{
    echo $line_in . "<br/>";
}

/* kq:

Testing the Iterator
getting next book with iterator :
Title Book first by Author Book first

getting next book with iterator :
Title Book second by Author Book second

getting next book with iterator :
Title Book third by Author Book third

getting current book with iterator :
Title Book third by Author Book third

Testing the Reverse Iterator
getting next book with reverse iterator :
Title Book third by Author Book third

getting next book with reverse iterator :
Title Book second by Author Book second

getting next book with reverse iterator :
Title Book first by Author Book first

getting current book with reverse iterator :
Title Book first by Author Book first
