<?php
echo '---- Behavioral > State <br><br>';

abstract class StateOrder
{
    /**
     * @var array
     */
    private $details;

    /**
     * @var StateOrder $state
     */
    protected static $state;

    /**
     * @return mixed
     */
    abstract protected function done();

    protected function setStatus($status)
    {
        $this->details['status'] = $status;
        $this->details['updatedTime'] = time();
    }

    protected function getStatus()
    {
        return $this->details['status'];
    }
}

class CreateOrder extends StateOrder
{
    public function __construct()
    {
        $this->setStatus('created');
    }

    protected function done()
    {
        echo 'ok new ShippingOrder()<br>';
        static::$state = new ShippingOrder();
    }
}

class ShippingOrder extends StateOrder
{
    public function __construct()
    {
        $this->setStatus('shipping');
    }

    protected function done()
    {
        echo 'ok<br>';
        $this->setStatus('completed');
    }
}

class ContextOrder extends StateOrder
{
    public function setState(StateOrder $state)
    {
        echo 'ok<br>';
        static::$state = $state;
    }

    public function getState()
    {
        return static::$state;
    }

    public function done()
    {
        echo 'ok<br>';
        static::$state->done();
    }

    public function getStatus()
    {
        return static::$state->getStatus();
    }
}

$createOrder = new CreateOrder();
$shippingOrder = new ShippingOrder();
$contextOrder = new ContextOrder();


echo '$contextOrder->setState($createOrder): <br>';
$contextOrder->setState($createOrder);

echo '<br> $contextOrder->getState(): <br>';
echo '<pre>';
print_r($contextOrder->getState());
echo '</pre>';

echo '$contextOrder->done(): <br>';
$contextOrder->done();

echo '<br> $contextOrder->getStatus(): <br>';
print_r($contextOrder->getStatus());


echo '<br><br> $contextOrder->setState($shippingOrder): <br>';
$contextOrder->setState($shippingOrder);

echo '<br> $contextOrder->getState: <br>';
echo '<pre>';
print_r($contextOrder->getState());
echo '</pre>';

echo '$contextOrder->done(): <br>';
$contextOrder->done();

echo ' $contextOrder->getStatus: <br>';
print_r($contextOrder->getStatus());



