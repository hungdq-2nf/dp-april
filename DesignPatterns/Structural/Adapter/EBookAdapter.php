<?php

namespace DesignPatterns\Structural\Adapter;
require 'BookInterface.php';
require 'Book.php';

/**
 * This is the adapter here. Notice it implements BookInterface,
 * therefore you don't have to change the code of the client which is using a Book
 */
class EBookAdapter implements BookInterface
{
    /**
     */
    protected $eBook;

    /**
     */
//    public function __construct(EBookInterface $eBook)
    public function __construct($eBook)
    {
        echo 2;
        $this->eBook = $eBook;
//        return $this->eBook;
    }

    /**
     * This class makes the proper translation from one interface to another.
     */
    public function open()
    {
        $this->eBook->unlock();
    }

    public function turnPage()
    {
        $this->eBook->pressNext();
    }

    /**
     * notice the adapted behavior here: EBookInterface::getPage() will return two integers, but BookInterface
     * supports only a current page getter, so we adapt the behavior here
     *
     * @return int
     */
    public function getPage()
    {
        return $this->eBook->getPage()[0];
    }
}

$kindle = new Kindle();
$ebook = new EBookAdapter($kindle);

echo 'open() <br>';
echo $ebook->open();
//echo json_encode($ebook);
echo '<br>';





