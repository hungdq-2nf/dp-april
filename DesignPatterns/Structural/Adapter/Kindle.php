<?php

namespace DesignPatterns\Structural\Adapter;
require 'EBookInterface.php';

/**
 * this is the adapted class. In production code, this could be a class from another package, some vendor code.
 * Notice that it uses another naming scheme and the implementation does something similar but in another way
 */
class Kindle implements EBookInterface
{
    /**
     * @var int
     */
    private $page = 1;

    /**
     * @var int
     */
    private $totalPages = 100;

    public function pressNext()
    {
        echo $this->page;
        $this->page++;
        return $this->page;
    }

    public function unlock()
    {
        echo 'unlock page now';
    }

    /**
     * returns current page and total number of pages, like [10, 100] is page 10 of 100
     *
     * @return int[]
     */
    public function getPage()
    {
        return $this->page;
//        return [$this->page, $this->totalPages];
    }
}

$kindle = new Kindle;

echo 'pressNext(): <br>';
echo $kindle->pressNext();
echo '<br>';

echo 'getPage(): <br>';
echo $kindle->getPage();
//echo json_encode($kindle->getPage());