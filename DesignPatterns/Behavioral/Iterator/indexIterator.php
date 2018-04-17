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

    public function __construct(string $title, string $author)
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

$book = new Book();
$bookList = new BookList();

echo 'addBook() <br>';
echo $bookList->addBook($book);

echo '<br><br> removeBook() <br>';
echo $bookList->removeBook($book);

echo '<br><br> count() <br>';
echo $bookList->count();

echo '<br><br> current() <br>';
echo $bookList->current();

echo '<br><br> key() <br>';
echo $bookList->key();

echo '<br><br> next() <br>';
echo $bookList->next();

echo '<br><br> rewind() <br>';
echo $bookList->rewind();

echo '<br><br> valid() <br>';
echo $bookList->valid();


