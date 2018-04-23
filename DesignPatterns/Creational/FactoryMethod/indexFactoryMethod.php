<?php
echo '---- Creational > Factory Method <br><br>';

/* Creational > Factory Method
 *
 *
 */

interface VehicleInterface
{
    public function setColor(string $rgb);
}

class Bicycle implements VehicleInterface
{
    /**
     * @var string
     */
    private $color;

    public function setColor(string $rgb)
    {
        $this->color = $rgb;
    }
}

class CarFerrari implements VehicleInterface
{
    /**
     * @var string
     */
    private $color;

    public function setColor(string $rgb)
    {
        $this->color = $rgb;
    }
}

class CarMercedes implements VehicleInterface
{
    /**
     * @var string
     */
    private $color;

    public function setColor(string $rgb)
    {
        $this->color = $rgb;
    }

    public function addAMGTuning()
    {
        // do additional tuning here
        echo 'add AMG Tuning here';
    }
}


abstract class FactoryMethod
{
    const CHEAP = 'cheap';
    const FAST = 'fast';

    abstract protected function createVehicle(string $type);

    public function create(string $type)
    {
        $obj = $this->createVehicle($type);
        $obj->setColor('black');

        return $obj;
    }
}

class GermanFactory extends FactoryMethod
{
    protected function createVehicle(string $type)
    {
        switch ($type) {
            case parent::CHEAP:
                return new Bicycle();
            case parent::FAST:
                $carMercedes = new CarMercedes();
                // we can specialize the way we want some concrete Vehicle since we know the class
                $carMercedes->addAMGTuning();

                return $carMercedes;
            default:
                throw new \InvalidArgumentException("$type is not a valid vehicle");
        }
    }
}

class ItalianFactory extends FactoryMethod
{
    protected function createVehicle(string $type)
    {
        switch ($type) {
            case parent::CHEAP:
                return new Bicycle();
            case parent::FAST:
                return new CarFerrari();
            default:
                throw new \InvalidArgumentException("$type is not a valid vehicle");
        }
    }
}

echo '<br><br> Bicycle <br>';
$bicycle = new Bicycle();
$bicycle->setColor('#eee');

echo '<br><br> CarFerrari <br>';
$carFerrari = new CarFerrari();
$carFerrari->setColor('#fff');

echo '<br><br> CarMercedes <br>';
$carMercedes = new CarMercedes();
$carMercedes = $carMercedes->setColor('#000');

echo '<br><br> GermanFactory <br>';
$germanFactory = new GermanFactory();

echo '<br> germanFactory type cheap: <br>';
echo $germanFactory->create('cheap');

echo '<br> germanFactory type fast: <br>';
echo $germanFactory->create('fast');


echo '<br><br> ItalianFactory <br>';
$italianFactory = new ItalianFactory();

echo '<br> $italianFactory type cheap: <br>';
echo $italianFactory->create('cheap');

echo '<br> $italianFactory type fast: <br>';
echo $italianFactory->create('fast');


