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
        //asc
        if ($a ==$b) return 0;
        return ($a <$b) ? -1 : 1;
    }

    public function compareDesc($a, $b)
    {
        //desc
        if ($a ==$b) return 0;
        return ($a >$b) ? -1 : 1;
    }
}

class DateComparator implements ComparatorInterface
{
    public function compareAsc($a, $b)
    {
        $aDate = new \DateTime($a);
        $bDate = new \DateTime($b);

        if ($aDate ==$bDate) return 0;
        return ($aDate < $bDate) ? -1 : 1;
    }

    public function compareDesc($a, $b)
    {
        $aDate = new \DateTime($a);
        $bDate = new \DateTime($b);

        if ($aDate ==$bDate) return 0;
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

    public function compareAsc($a, $b)
    {
        //asc
        if ($a ==$b) return 0;
        return ($a <$b) ? -1 : 1;
    }

    public function compareDesc($a, $b)
    {
        //desc
        if ($a ==$b) return 0;
        return ($a >$b) ? -1 : 1;
    }

    public function executeStrategy(array $elements)
    {
//        uasort($elements, [$this->comparator, 'compareAsc']);
        uasort($elements, [$this->comparator, 'compareDesc']);
//        uasort($elements, [$this, 'compareAsc']);
//        uasort($elements, [$this, 'compareDesc']);

        return $elements;
    }
}

//https://stackoverflow.com/questions/30365346/what-is-the-spaceship-operator-in-php-7

echo '<br><br> $contextId <br>';
$contextId = new Context(new IdComparator());
echo '<pre>';
print_r($contextId->executeStrategy([2,1,5]));

echo '<br><br> $contextDate <br>';
$contextDate = new Context(new DateComparator());
echo '<pre>';
print_r($contextDate->executeStrategy(['2018-04-09', '2018-04-01', '2018-04-02']));

