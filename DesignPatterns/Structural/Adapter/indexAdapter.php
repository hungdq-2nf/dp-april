<?php
echo '---- Structural > Adapter <br>';

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

class Book implements BookInterface
{
    private $page = 1;

    public function open()
    {
        echo $this->page . '<br>';
    }

    public function turnPage()
    {
        echo 'ok B <br>';
        $this->page++;
    }

    public function getPage()
    {
        return $this->page;
    }
}

interface EBookInterface
{
    public function unlock();

    public function pressNext();

    public function getPage();
}

class Kindle implements EBookInterface
{
    private $page = 6;

    private $totalPages = 100;

    public function unlock()
    {
        echo 'ok K <br>';
    }

    public function pressNext()
    {
        echo 'ok K <br>';
        $this->page++;
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
        echo 'ok E $this->eBook->unlock()<br>';
        $this->eBook->unlock();
    }

    public function turnPage()
    {
        echo 'ok E $this->eBook->pressNext()<br>';
        $this->eBook->pressNext();
    }

    public function getPage()
    {
        echo 'ok E $this->eBook->getPage()[0]<br>';
        return $this->eBook->getPage()[0];
    }
}


echo '<br> - Book(): <br>';
$book = new Book();
echo '$book->open(): <br>';
echo $book->open();

echo '$book->turnPage(): <br>';
echo $book->turnPage();

echo '$book->getPage(): <br>';
echo '<pre>';
print_r($book->getPage());
echo '</pre>';


echo ' - Kindle():<br>';
$kindle = new Kindle();

echo '$kindle->pressNext(): <br>';
$kindle->pressNext();

echo '$kindle->unlock(): <br>';
$kindle->unlock();

echo '$kindle->getPage(): <br>';
echo '<pre>';
print_r($kindle->getPage());
echo '</pre>';


echo ' - EBookAdapter($kindle):<br>';
$ebook = new EBookAdapter($kindle);

echo '<br>$ebook->open() <br>';
echo $ebook->open();

echo '<br>$ebook->turnPage() <br>';
echo $ebook->turnPage();

echo '<br>$ebook->getPage() <br>';
echo '<pre>';
print_r($ebook->getPage());
echo '</pre>';



