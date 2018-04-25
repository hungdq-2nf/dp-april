<?php
echo '---- Creational > Builder <br>';

/* Creational > Builder
 *
 *
 */

abstract class Vehicle
{
    /**
     * @var object[]
     */
    private $data = [];

    /**
     * @param string $key
     * @param object $value
     */
    public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }
}


class Car extends Vehicle
{
}

class Truck extends Vehicle
{
}

class Engine
{
}

class Door
{
}

class Wheel
{
}

interface BuilderInterface
{
    public function createVehicle();

    public function addWheel();

    public function addEngine();

    public function addDoors();

    public function getVehicle();
}

class CarBuilder implements BuilderInterface
{
    /**
     * @var Car
     */
    private $car;

    public function addDoors()
    {
        $this->car->setPart('rightDoor', new Door());
        $this->car->setPart('leftDoor', new Door());
        $this->car->setPart('trunkLid', new Door());
    }

    public function addEngine()
    {
        $this->car->setPart('engine', new Engine());
    }

    public function addWheel()
    {
        $this->car->setPart('wheelLF', new Wheel());
        $this->car->setPart('wheelRF', new Wheel());
        $this->car->setPart('wheelLR', new Wheel());
        $this->car->setPart('wheelRR', new Wheel());
    }

    public function createVehicle()
    {
        $this->car = new Car();
    }

    public function getVehicle()
    {
        return $this->car;
    }
}

class Director
{
    public function build(BuilderInterface $builder)
    {
        $builder->createVehicle();
        $builder->addDoors();
        $builder->addEngine();
        $builder->addWheel();

        return $builder->getVehicle();
    }
}

class TruckBuilder implements BuilderInterface
{
    /**
     * @var Truck
     */
    private $truck;

    public function addDoors()
    {
        $this->truck->setPart('rightDoor', new Door());
        $this->truck->setPart('leftDoor', new Door());
    }

    public function addEngine()
    {
        $this->truck->setPart('truckEngine', new Engine());
    }

    public function addWheel()
    {
        $this->truck->setPart('wheel1', new Wheel());
        $this->truck->setPart('wheel2', new Wheel());
        $this->truck->setPart('wheel3', new Wheel());
    }

    public function createVehicle()
    {
        $this->truck = new Truck();
    }

    public function getVehicle()
    {
        return $this->truck;
    }
}


echo '<br> CarBuilder <br>';
$carBuilder = new CarBuilder();
$carBuilder->createVehicle();
$carBuilder->addDoors();
$carBuilder->addEngine();
$carBuilder->addWheel();
echo '$carBuilder->getVehicle(): <br>';
echo '<pre>';
print_r($carBuilder->getVehicle());
echo '</pre>';

echo '<br> Director <br>';
$director = new Director();
echo '<pre>';
print_r($director->build($carBuilder));
echo '</pre>';

echo '<br> TruckBuilder <br>';
$truckBuilder = new TruckBuilder();
$truckBuilder->createVehicle();
$truckBuilder->addDoors();
$truckBuilder->addEngine();
$truckBuilder->addWheel();
echo '$truckBuilder->getVehicle(): <br>';
echo '<pre>';
print_r($truckBuilder->getVehicle());
echo '</pre>';


