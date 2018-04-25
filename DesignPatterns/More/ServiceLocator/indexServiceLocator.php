<?php
echo '---- more > ServiceLocator <br><br>';

/* more > ServiceLocator
 *
 *
 */

class LogService
{
}

class ServiceLocator
{
    /**
     * @var array
     */
    private $services = [];

    /**
     * @var array
     */
    private $instantiated = [];

    /**
     * @var array
     */
    private $shared = [];

    /**
     * instead of supplying a class here, you could also store a service for an interface
     *
     * @param string $class
     * @param object $service
     * @param bool $share
     */
    public function addInstance($class, $service, $share)
    {
        $this->services[$class] = $service;
        $this->instantiated[$class] = $service;
        $this->shared[$class] = $share;
    }

    /**
     * instead of supplying a class here, you could also store a service for an interface
     *
     * @param string $class
     * @param array $params
     * @param bool $share
     */
    public function addClass($class, array $params, $share)
    {
        $this->services[$class] = $params;
        $this->shared[$class] = $share;
    }

    public function has($interface)
    {
        return isset($this->services[$interface]) || isset($this->instantiated[$interface]);
    }

    /**
     * @param string $class
     *
     * @return object
     */
    public function get($class)
    {
        if (isset($this->instantiated[$class])
            && $this->shared[$class]
        ) {
            return $this->instantiated[$class];
        }

        $args = $this->services[$class];

        switch (count($args)) {
            case 0:
                $object = new $class();
                break;
            case 1:
                $object = new $class($args[0]);
                break;
            case 2:
                $object = new $class($args[0], $args[1]);
                break;
            case 3:
                $object = new $class($args[0], $args[1], $args[2]);
                break;
            default:
                throw new \OutOfRangeException('Too many arguments given');
        }

        if ($this->shared[$class]) {
            $this->instantiated[$class] = $object;
        }

        return $object;
    }
}

echo ' ServiceLocator <br>';
$objectService = 0;
$serviceLocator = new ServiceLocator();
$serviceLocator->addInstance('class', (object)$objectService, true);

echo '<br> $serviceLocator->addClass() <br>';
echo $serviceLocator->addClass('class 2', [1, 3], true);

echo '<br><br> $serviceLocator->has(\'interface\') <br>';
echo $serviceLocator->has('interface');

echo '<br><br> $serviceLocator->get(\'class 3\') <br>';
echo '<pre>';
print_r($serviceLocator->get('class'));
echo '</pre>';










