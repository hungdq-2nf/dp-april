<?php

interface Car {
    public function run();
}

class BMW implements Car {
    public function run()
    {
        echo 'BMW !';
    }
}

class Mercedes implements Car {
    public function run()
    {
        echo 'Mercedes !';
    }
}

class Driver {
    private $car;
    public function __construct(ServiceLocatorInterface $locator, $carname) {
        $this->car = $locator->get($carname);
    }
    public function drive() {
        $this->car->run();
    }
}

interface ServiceLocatorInterface {
    public function set($name, $service);
    public function get($name);
    public function has($name);
    public function remove($name);
    public function clear();
}

class ServiceLocator implements ServiceLocatorInterface {
    protected $services = array();

    public function set($name, $service) {
        if (!is_object($service)) {
            throw new InvalidArgumentException( "Only objects can be registered with the locator.");
        }
        if (!in_array($service, $this->services, true)) {
            $this->services[$name] = $service;
        }
        return $this;
    }

    public function get($name) {
        if (!isset($this->services[$name])) {
            throw new RuntimeException( "The service $name has not been registered with the locator.");
        }
        return $this->services[$name];
    }

    public function has($name) {
        return isset($this->services[$name]);
    }

    public function remove($name) {
        if (isset($this->services[$name])) {
            unset($this->services[$name]);
        }
        return $this;
    }

    public function clear() {
        $this->services = array();
        return $this;
    }
}
echo '<br> $mec->run() <br>';
$mec = new Mercedes();
echo $mec->run();

echo '<br> $bmv->run() <br>';
$bmv = new BMV();
echo $bmv->run();

echo '<br> $dirver1->drive() <br>';
// Lái xe 1 thích lái Mercedes
$driver1 = new Driver($mec);
$dirver1->drive(); // Mẹc xà đí...!

echo '<br> $dirver2->drive() <br>';
// Lái xe 2 thích lái BMV
$driver2 = new Driver($bmv);
$dirver2->drive(); // Bi em ví...!

// Tạo ra cái gara
$serviceLocator = new ServiceLocator();

echo '<br> $serviceLocator->set(\'mec\', new Mercerdes()) <br>';
$serviceLocator->set('mec', new Mercerdes());

echo '<br> $serviceLocator->get(\'mec\') <br>';
echo $serviceLocator->get('mec');

echo '<br> $serviceLocator->has(\'mec\') <br>';
echo $serviceLocator->has('mec');

echo '<br> $serviceLocator->remove(\'mec\') <br>';
echo $serviceLocator->remove('mec');

echo '<br> $serviceLocator->clear() <br>';
echo $serviceLocator->clear();


echo '<br> $serviceLocator->set(\'bmv\', new BMV()) <br>';
$serviceLocator->set('bmv', new BMV());

echo '<br> $serviceLocator->get(\'bmw\') <br>';
echo $serviceLocator->get('bmw');

echo '<br> $serviceLocator->has(\'bmw\') <br>';
echo $serviceLocator->has('bmw');

echo '<br> $serviceLocator->remove(\'bmw\') <br>';
echo $serviceLocator->remove('bmw');

echo '<br> $serviceLocator->clear() <br>';
echo $serviceLocator->clear();


// Tạo ra ông lái xe và lấy xe Mercedes từ gara
$driver = new Driver($serviceLocator, 'mec');
$driver->drive(); // Mẹc xà đí...!


echo '<br><br>  <br>';


echo '<br><br>  <br>';








