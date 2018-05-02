<?php
echo '---- Behavioral > Strategy <br><br>';

/* Behavioral > Strategy
 *
 * chiến lược
 */

interface ComparatorInterface
{
    public function compareAsc($a, $b);
    public function compareDesc($a, $b);
}

class IdComparator implements ComparatorInterface
{
    public function compareAsc($a, $b)
    {
        if ($a == $b) return 0;
        return ($a < $b) ? -1 : 1;
    }

    public function compareDesc($a, $b)
    {
        if ($a == $b) return 0;
        return ($a > $b) ? -1 : 1;
    }
}

class DateComparator implements ComparatorInterface
{
    public function compareAsc($a, $b)
    {
        $aDate = new \DateTime($a);
        $bDate = new \DateTime($b);

        if ($aDate == $bDate) return 0;
        return ($aDate < $bDate) ? -1 : 1;
    }

    public function compareDesc($a, $b)
    {
        $aDate = new \DateTime($a);
        $bDate = new \DateTime($b);

        if ($aDate == $bDate) return 0;
        return ($aDate > $bDate) ? -1 : 1;
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
//        uasort($elements, [$this->comparator, 'compareAsc']);
        uasort($elements, [$this->comparator, 'compareDesc']);

        return $elements;
    }
}

//https://stackoverflow.com/questions/30365346/what-is-the-spaceship-operator-in-php-7

$arrayId = [2,1,5];
$arrayDate = [
    '2018-04-09',
    '2018-04-01',
    '2018-04-02'
];

echo ' $contextId <br>';
$contextId = new Context(new IdComparator());
echo '<pre>';
print_r($contextId->executeStrategy($arrayId));

echo '<br><br> $contextDate <br>';
$contextDate = new Context(new DateComparator());
echo '<pre>';
print_r($contextDate->executeStrategy($arrayDate));

