<?php
echo '---- Behavioral > Strategy <br><br>';

/* Behavioral > Strategy
 *
 * chiến lược
 */

interface ComparatorInterface
{
    public function compare($a, $b);
}

class IdComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
//        return $a['id'] <=> $b['id'];
    }
}

class DateComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        $aDate = new \DateTime($a['date']);
        $bDate = new \DateTime($b['date']);

//        return $aDate <=> $bDate;
    }
}

class Context
{
    private $comparator;

    public function __construct(ComparatorInterface $comparator)
    {
        $this->comparator = $comparator;
    }

    public function executeStrategy(array $elements)
    {
        uasort($elements, [$this->comparator, 'compare']);

        return $elements;
    }
}





