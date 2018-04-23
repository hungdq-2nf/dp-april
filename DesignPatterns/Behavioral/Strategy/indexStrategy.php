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
        if ($a['id'] == $b['id']) {
            return 0;
        } else if ($a['id'] < $b['id']) {
            return -1;
        } else if ($a['id'] > $b['id']) {
            return 1;
        }
//        return $a['id'] <=> $b['id'];
    }
}

class DateComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        $aDate = new \DateTime($a['date']);
        $bDate = new \DateTime($b['date']);

        if ($aDate == $bDate) {
            return 0;
        } else if ($aDate < $bDate) {
            return -1;
        } else if ($aDate > $bDate) {
            return 1;
        }
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

//https://stackoverflow.com/questions/30365346/what-is-the-spaceship-operator-in-php-7

echo '<br><br> $contextId <br>';
$contextId = new Context('id');
echo $contextId->executeStrategy([2,1,5]);

echo '<br><br> $contextDate <br>';
$contextDate = new Context('date');
echo $contextDate->executeStrategy(['2018-04-09', '2018-04-01', '2018-04-02']);

