<?php
echo '---- Behavioral > Iterator <br><br>';

/* Behavioral > Iterator
 *
 * lặp lại thành bộ sưu tập
 */

class Book
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $title;

    public function __construct($title, $author)
    {
        $this->author = $author;
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthorAndTitle()
    {
        return $this->getTitle().' by '.$this->getAuthor();
    }
}

class BookList implements \Countable, \Iterator
{
    private $books = [];

    private $currentIndex = 0;

    public function addBook(Book $book)
    {
        echo 'ok<br>';
        $this->books[] = $book;
    }

    public function removeBook(Book $bookToRemove)
    {
        echo 'ok<br>';
        foreach ($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() === $bookToRemove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
    }

    public function getAll()
    {
        return $this->books;
    }

    public function count()
    {
        return count($this->books);
    }

    public function current()
    {
        return $this->books[$this->currentIndex];
    }

    public function key()
    {
        return $this->currentIndex;
    }

    public function next()
    {
        echo 'ok<br>';
        $this->currentIndex++;
    }

    public function rewind()
    {
        echo 'ok<br>';
        $this->currentIndex = 0;
    }

    public function valid()
    {
        return isset($this->books[$this->currentIndex]);
    }
}

echo '- $book1<br>';
$title1 = 'title 1';
$author1 = 'author 1';
$book1 = new Book($title1, $author1);

echo '<br>getAuthor() 1<br>';
echo $book1->getAuthor();

echo '<br>getTitle() 1<br>';
echo $book1->getTitle();

echo '<br>getAuthorAndTitle() 1<br>';
echo $book1->getAuthorAndTitle();

echo '<br><br>- $book2<br>';
$title2 = 'title 2';
$author2 = 'author 2';
$book2 = new Book($title2, $author2);

echo '<br>getAuthor() 2<br>';
echo $book2->getAuthor();

echo '<br>getTitle() 2<br>';
echo $book2->getTitle();

echo '<br>getAuthorAndTitle() 2<br>';
echo $book2->getAuthorAndTitle();


echo '<br><br>- $bookList<br>';
$bookList = new BookList();

echo 'addBook() 1<br>';
$bookList->addBook($book1);

echo '<br> removeBook() 1<br>';
//echo $bookList->removeBook($book1);

echo '<br> addBook() 2<br>';
echo $bookList->addBook($book2);

//echo '<br> removeBook() 2<br>';
//echo $bookList->removeBook($book2);

echo '<br> count() <br>';
echo $bookList->count();

echo '<br> getAll() <br>';
echo '<pre>';
print_r($bookList->getAll());
echo '</pre>';

echo ' current() <br>';
echo '<pre>';
print_r($bookList->current());
echo '</pre>';

echo '<br> key() <br>';
echo $bookList->key();

echo '<br> next() <br>';
$bookList->next();

echo ' current() <br>';
echo '<pre>';
print_r($bookList->current());
echo '</pre>';

echo '<br> rewind() <br>';
$bookList->rewind();

echo ' current() <br>';
echo '<pre>';
print_r($bookList->current());
echo '</pre>';

echo '<br> valid() <br>';
echo '<pre>';
print_r($bookList->valid());
echo '</pre>';


/*
 * class Countable
 *  > method count()
 *
 * class Iterator
 *  > method current()
 *  > method next()
 *  > method key()
 *  > method valid()
 *  > method rewind()
 */

