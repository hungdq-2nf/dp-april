<?php
echo '---- Creational > Factory Method <br>';

/* Creational > Factory Method
 *
 *
 */

interface VehicleInterface
{
    public function setColor($rgb);
}

class Bicycle implements VehicleInterface
{
    /**
     * @var string
     */
    private $color;

    public function setColor($rgb)
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

    public function setColor($rgb)
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

    public function setColor($rgb)
    {
        $this->color = $rgb;
    }

    public function addAMGTuning()
    {
        // do additional tuning here
        echo 'add AMG Tuning here <br>';
    }
}


abstract class FactoryMethod
{
    const CHEAP = 'cheap';
    const FAST = 'fast';

    abstract protected function createVehicle($type);

    public function create($type)
    {
        $obj = $this->createVehicle($type);
        $obj->setColor('black');

        return $obj;
    }
}

class GermanFactory extends FactoryMethod
{
    protected function createVehicle($type)
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
    protected function createVehicle($type)
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

echo '<br> Bicycle <br>';
$bicycle = new Bicycle();
$bicycle->setColor('#eee');

echo '<br> CarFerrari <br>';
$carFerrari = new CarFerrari();
$carFerrari->setColor('#fff');

echo '<br> CarMercedes <br>';
$carMercedes = new CarMercedes();
$carMercedes = $carMercedes->setColor('#000');

echo '<br> GermanFactory <br>';
$germanFactory = new GermanFactory();

echo '<br> germanFactory type cheap: <br>';
echo '<pre>';
print_r($germanFactory->create(FactoryMethod::CHEAP));
echo '</pre>';

echo '<br> germanFactory type fast: <br>';
echo '<pre>';
print_r($germanFactory->create(FactoryMethod::FAST));
echo '</pre>';

echo '<br> ItalianFactory <br>';
$italianFactory = new ItalianFactory();

echo '<br> $italianFactory type cheap: <br>';
echo '<pre>';
print_r($italianFactory->create(FactoryMethod::CHEAP));
echo '</pre>';

echo '<br> $italianFactory type fast: <br>';
echo '<pre>';
print_r($italianFactory->create(FactoryMethod::FAST));
echo '</pre>';

