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
//        echo 1;
//        print_r($locator->get($carname));die;
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

class ServiceLocator2 implements ServiceLocatorInterface {
    protected $services = array();

    public function set($name, $service) {
        if (!is_object($service)) {
            echo '<br> Only objects can be registered with the locator. <br>';
        }
        if (!in_array($service, $this->services, true)) {
            $this->services[$name] = $service;
        }
        return $this;
    }

    public function get($name) {
        if (!isset($this->services[$name])) {
            return '<br> The service has not been registered with the locator. <br>';
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
$bmv = new BMW();
echo $bmv->run();

$serviceLocator2 = new ServiceLocator2();
$carname = 'BMW';

echo '<br> $dirver1->drive() <br>';
// Lái xe 1 thích lái Mercedes
$driver1 = new Driver($serviceLocator2, $carname);
//$driver1->drive(); // Mercedes !

echo '<br> $dirver2->drive() <br>';
// Lái xe 2 thích lái BMV
$driver2 = new Driver($serviceLocator2, $carname);
//$dirver2->drive(); // BMW !

// Tạo ra cái gara
$serviceLocator = new ServiceLocator2();

echo '<br> $serviceLocator->set(\'mec\', new Mercedes()) <br>';
$serviceLocator->set('mec', new Mercedes());

echo '<br> $serviceLocator->get(\'mec\') <br>';
echo '<pre>';
print_r($serviceLocator->get('mec'));
echo '</pre>';

echo ' $serviceLocator->has(\'mec\') <br>';
echo '<pre>';
print_r($serviceLocator->has('mec'));
echo '</pre>';

echo ' $serviceLocator->remove(\'mec\') <br>';
echo '<pre>';
print_r($serviceLocator->remove('mec'));
echo '</pre>';

echo ' $serviceLocator->clear() <br>';
echo '<pre>';
print_r($serviceLocator->clear());
echo '</pre>';


echo ' $serviceLocator->set(\'bmv\', new BMV()) <br>';
echo '<pre>';
print_r($serviceLocator->set('bmv', new BMW()));
echo '</pre>';

echo ' $serviceLocator->get(\'bmw\') <br>';
echo '<pre>';
print_r($serviceLocator->get('bmw'));
echo '</pre>';

echo ' $serviceLocator->has(\'bmw\') <br>';
echo '<pre>';
print_r($serviceLocator->has('bmw'));
echo '</pre>';

echo ' $serviceLocator->remove(\'bmw\') <br>';
echo '<pre>';
print_r($serviceLocator->remove('bmw'));
echo '</pre>';

echo ' $serviceLocator->clear() <br>';
echo '<pre>';
print_r($serviceLocator->clear());
echo '</pre>';

// Tạo ra ông lái xe và lấy xe Mercedes từ gara
$driver = new Driver($serviceLocator, 'mec');
//$driver->drive(); // Mẹc xà đí...!









