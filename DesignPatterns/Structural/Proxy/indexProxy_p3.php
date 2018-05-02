<?php

interface AnimalFeeder
{
    public function __construct($petName);

    public function dropFood($hungerLevel, $water);

    public function displayFood($hungerLevel);
}

class Cat implements AnimalFeeder
{
    public function __construct($petName)
    {
        $this->petName = $petName;
    }

    public function dropFood($hungerLevel, $water)
    {
        return $this->selectFood($hungerLevel) . ($water ? ' with water' : '');
    }

    public function displayFood($hungerLevel)
    {
        return $this->selectFood($hungerLevel);
    }

    protected function selectFood($hungerLevel)
    {
        switch ($hungerLevel) {
            case 0:
                return 'food for cat 1';
                break;
            case 1:
                return 'food for cat 2';
                break;
            case 3:
                return 'food for cat 3';
                break;
        }
    }
}

class Dog
{
    public function __construct($petName)
    {
        if (strlen($petName) > 10) {
            throw new \Exception('Name too long.');
        }
        $this->petName = $petName;
    }

    public function dropFood($hungerLevel, $water)
    {
        return $this->selectFood($hungerLevel) . ($water ? ' with water' : '');
    }

    public function displayFood($hungerLevel)
    {
        return $this->selectFood($hungerLevel);
    }

    protected function selectFood($hungerLevel)
    {
        if ($hungerLevel == 1) {
            return "food for dog 1";
        } elseif ($hungerLevel == 2) {
            return "food for dog 2";
        } elseif ($hungerLevel == 3) {
            return "food for dog 3";
        }
    }
}

class AnimalFeederProxy
{
    protected $instance;

    public function __construct($feeder, $name)
    {
        $class = __NAMESPACE__ . '\\AnimalFeeders' . $feeder;
        $this->instance = new $class($name);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->instance, $name], $arguments);
    }
}

class AnimalFeedersCat
{
    public function displayFood($hungerLevel)
    {
        echo 'displayFood Cat <br>';
    }

    public function dropFood($hungerLevel, $water)
    {
        echo 'dropFood Cat <br>';
    }
}

class AnimalFeedersDog
{
    public function displayFood($hungerLevel)
    {
        echo 'displayFood Dog <br>';
    }

    public function dropFood($hungerLevel, $water)
    {
        echo 'dropFood Dog <br>';
    }
}

$felix = new AnimalFeederProxy('Cat', 'Felix');
echo $felix->displayFood(1);
echo "\n";
echo $felix->dropFood(1, true);
echo "\n";

$brian = new AnimalFeederProxy('Dog', 'Brian');
echo $brian->displayFood(1);
echo "\n";
echo $brian->dropFood(1, true);



echo '<br> Cat <br>';
$cat = new Cat('Cat 1');
$cat->dropFood(1, false);
$cat->displayFood(2);

echo '<br> Dog <br>';
$dog = new Dog('Dog 1');
$dog->dropFood(1, true);
$dog->displayFood(2);


class AnimalFeedersFeeder1
{
    function methodCat1(){
        echo 'methodCat1';
    }
}

class AnimalFeedersFeeder2
{
    function methodDog1(){
        echo 'methodDog1';
    }
}

echo '<br> AnimalFeederProxy Cat 1<br>';
$feeder1 = 'Feeder1';
$nameCat1 = 'Cat 1';
$methodCat1 = 'methodCat1';

$animalFeederProxy = new AnimalFeederProxy($feeder1, $nameCat1);
$animalFeederProxy->__call('methodCat1', [1]);

echo '<br> AnimalFeederProxy Dog 1<br>';
$feeder2 = 'Feeder2';
$nameDog1 = 'Dog 1';
$methodDog1 = 'methodDog1';

$animalFeederProxy = new AnimalFeederProxy($feeder2, $nameDog1);
$animalFeederProxy->__call($methodDog1, [1]);




