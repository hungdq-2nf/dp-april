<?php

interface Car {
    public function run();
}

class BMW implements Car {
    public function run()
    {
        echo 'Bi em ví...!';
    }
}

class Mercedes implements Car {
    public function run()
    {
        echo 'Mẹc xà đí...!';
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

$mec = new Mercedes();
$bmv = new BMV();

// Lái xe 1 thích lái Mercedes
$driver1 = new Driver($mec);
$dirver1->drive(); // Mẹc xà đí...!

// Lái xe 2 thích lái BMV
$driver2 = new Driver($bmv);
$dirver2->drive(); // Bi em ví...!

// Tạo ra cái gara
$locator = new ServiceLocator;
$locator->set('mec', new Mercerdes());
$locator->set('bmv', new BMV());

// Tạo ra ông lái xe và lấy xe Mercedes từ gara
$driver = new Driver($locator, 'mec');
$driver->drive(); // Mẹc xà đí...!









