<?php

interface AnimalFeeder
{
    public function __construct(string $petName);

    public function dropFood(int $hungerLevel, bool $water = false): string;

    public function displayFood(int $hungerLevel): string;
}

class Cat implements AnimalFeeder
{
    public function __construct(string $petName)
    {
        $this->petName = $petName;
    }

    public function dropFood(int $hungerLevel, bool $water = false): string
    {
        return $this->selectFood($hungerLevel) . ($water ? ' with water' : '');
    }

    public function displayFood(int $hungerLevel): string
    {
        return $this->selectFood($hungerLevel);
    }

    protected function selectFood(int $hungerLevel): string
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
    public function __construct(string $petName)
    {
        if (strlen($petName) > 10) {
            throw new \Exception('Name too long.');
        }
        $this->petName = $petName;
    }

    public function dropFood(int $hungerLevel, bool $water = false): string
    {
        return $this->selectFood($hungerLevel) . ($water ? ' with water' : '');
    }

    public function displayFood(int $hungerLevel): string
    {
        return $this->selectFood($hungerLevel);
    }

    protected function selectFood(int $hungerLevel): string
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

    public function __construct(string $feeder, string $name)
    {
        $class = __NAMESPACE__ . '\\AnimalFeeders' . $feeder;
        $this->instance = new $class($name);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([$this->instance, $name], $arguments);
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



echo '<br><br> Cat <br>';
$cat = new Cat('Cat 1');
$cat->dropFood(1, false);
$cat->displayFood(2);

echo '<br><br> Dog <br>';
$dog = new Dog('Dog 1');
$dog->dropFood(1, true);
$dog->displayFood(2);


echo '<br><br> AnimalFeederProxy Cat 1<br>';
$animalFeederProxy = new AnimalFeederProxy('Feeder 1', 'Cat 1');
$animalFeederProxy->__call('Cat 1', 1);

echo '<br><br> AnimalFeederProxy Dog 1<br>';
$animalFeederProxy = new AnimalFeederProxy('Feeder 2', 'Dog 1');
$animalFeederProxy->__call('Dog 1', 1);




