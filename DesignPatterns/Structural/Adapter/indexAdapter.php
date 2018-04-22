<?php
echo '---- Structural > Adapter <br><br>';

/* Structural > Adapter
 *
 * bộ chuyển đổi: giúp các thành phần mới có thể cắm vào hệ thống không hỗ trợ cổng của nó
 * */

interface BookInterface
{
    public function turnPage();

    public function open();

    public function getPage();
}

interface EBookInterface
{
    public function unlock();

    public function pressNext();

    public function getPage();
}

class Book implements BookInterface
{
    private $page;

    public function open()
    {
        $this->page = 1;
    }

    public function turnPage()
    {
        $this->page++;
    }

    public function getPage()
    {
        return $this->page;
    }
}

class Kindle implements EBookInterface
{
    private $page = 6;

    private $totalPages = 100;

    public function pressNext()
    {
        echo 'press next now';
        $this->page++;
    }

    public function unlock()
    {
        echo 'unlock page';
    }

    public function getPage()
    {
        if($this->page <= 100) {
            return [$this->page, $this->totalPages];
        } else {
            echo 'over page !';
        }
    }
}

class EBookAdapter implements BookInterface
{
    protected $eBook;

    public function __construct(EBookInterface $eBook)
    {
        $this->eBook = $eBook;
    }

    public function open()
    {
        $this->eBook->unlock();
    }

    public function turnPage()
    {
        $this->eBook->pressNext();
    }

    public function getPage()
    {
        return $this->eBook->getPage()[0];
    }
}


echo '<br>_:<br>';
$book = new Book();
echo '<br>- open() <br>';
echo $book->open();

echo '<br>- turnPage() <br>';
echo $book->turnPage();

echo '<br>- getPage() <br>';
echo $book->getPage();


echo '<br><br>_DP:<br>';

$kindle = new Kindle();
$ebook = new EBookAdapter($kindle);

echo '<br>- open() <br>';
echo $ebook->open();

echo '<br>- turnPage() <br>';
echo $ebook->turnPage();

echo '<br>- getPage() <br>';
echo $ebook->getPage();




