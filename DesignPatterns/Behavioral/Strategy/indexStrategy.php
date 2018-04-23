<?php
echo '---- Behavioral > Strategy <br>';

/* Behavioral > Strategy
 *
 * chiến lược
 */

interface ComparatorInterface
{
//    public function compare($a, $b);
    public function compare();
}

class IdComparator implements ComparatorInterface
{
//    public function compare($a, $b)
    public function compare()
    {
//        if ($a['id'] == $b['id']) {
//            return 0;
//        } else if ($a['id'] < $b['id']) {
//            return -1;
//        } else if ($a['id'] > $b['id']) {
//            return 1;
//        }
        $a = 7;
        $b =6;
        if ($a == $b) {
            return 0;
        } else if ($a < $b) {
            return -1;
        } else if ($a > $b) {
            return 1;
        }
//        return $a['id'] <=> $b['id'];
    }
}

//class DateComparator implements ComparatorInterface
//{
//    public function compare($a, $b)
//    {
//        $aDate = new \DateTime($a['date']);
//        $bDate = new \DateTime($b['date']);
//
//        if ($aDate == $bDate) {
//            return 0;
//        } else if ($aDate < $bDate) {
//            return -1;
//        } else if ($aDate > $bDate) {
//            return 1;
//        }
////        return $aDate <=> $bDate;
//    }
//}

class Context
{
    private $comparator;
    public $method_name = 'compare2';

//    public function __construct(ComparatorInterface $comparator)
    public function __construct($comparator)
    {
        $this->comparator = $comparator;
    }

    public function compare2()
    {
        $this->method_name = __FUNCTION__;
//        if ($a['id'] == $b['id']) {
//            return 0;
//        } else if ($a['id'] < $b['id']) {
//            return -1;
//        } else if ($a['id'] > $b['id']) {
//            return 1;
//        }
        $a = 7;
        $b =6;
        if ($a == $b) {
            return 0;
        } else if ($a < $b) {
            return -1;
        } else if ($a > $b) {
            return 1;
        }
//        return $a['id'] <=> $b['id'];
    }

//    public function executeStrategy(array $elements)
    public function executeStrategy()
    {
        $elements = [
            2,
            1
        ];
//        var_dump($this->comparator);
//        var_dump([$this->comparator, 'compare']);
//        uasort($elements, [$this->comparator, 'compare']);
        $IdComparator = new IdComparator();
//        $a['id'] = 7;
//        $b['id'] = 6;
        $a = 7;
        $b =6;
//        uasort($elements, $IdComparator->compare($a, $b));
//        uasort($elements, $IdComparator->compare());
//        uasort($elements, 'compare2');
        echo '==' . $this->method_name;

        uasort($elements, $this->method_name);

        return $elements;
    }

}

//https://stackoverflow.com/questions/30365346/what-is-the-spaceship-operator-in-php-7

echo '<br> $contextId <br>';
//$contextId = new Context('id');
//$contextId = new Context(ComparatorInterface::class);
$contextId = new Context(ComparatorInterface::class);
echo $contextId->executeStrategy();
//echo $contextId->executeStrategy(['id'=>2, 'id'=>1]);

//echo '<br> $contextDate <br>';
//$contextDate = new Context('date');
//echo $contextDate->executeStrategy(['2018-04-09', '2018-04-01', '2018-04-02']);

