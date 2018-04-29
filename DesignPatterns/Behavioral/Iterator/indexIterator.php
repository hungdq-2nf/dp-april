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
        $this->books[] = $book;
    }

    public function removeBook(Book $bookToRemove)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getAuthorAndTitle() === $bookToRemove->getAuthorAndTitle()) {
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
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
        $this->currentIndex++;
    }

    public function rewind()
    {
        $this->currentIndex = 0;
    }

    public function valid()
    {
        return isset($this->books[$this->currentIndex]);
    }
}

$title1 = 'title 1';
$author1 = 'author 1';
$book1 = new Book($title1, $author1);

$title2 = 'title 1';
$author2 = 'author 1';
$book2 = new Book($title2, $author2);

$bookList = new BookList();

echo 'addBook() 1<br>';
echo $bookList->addBook($book1);

echo '<br><br> removeBook() 1<br>';
echo $bookList->removeBook($book1);

echo 'addBook() 2<br>';
echo $bookList->addBook($book2);

echo '<br> count() <br>';
echo $bookList->count();

echo '<br><br> current() <br>';
echo '<pre>';
print_r($bookList->current());
echo '</pre>';

echo '<br> key() <br>';
echo $bookList->key();

echo '<br> next() <br>';
echo $bookList->next();

echo '<br> rewind() <br>';
echo $bookList->rewind();

echo '<br> valid() <br>';
echo $bookList->valid();


