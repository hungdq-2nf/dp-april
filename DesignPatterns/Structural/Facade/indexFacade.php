<?php
echo '---- Structural > Facade <br>';

/* Structural > Facade
 *
 * mặt ngoài:
 */

interface OsInterface
{
    public function halt();

    public function getName();
}

interface BiosInterface
{
    public function execute();

    public function waitForKeyPress();

    public function launch(OsInterface $os);

    public function powerDown();
}

class Os implements OsInterface
{
    function halt()
    {
        echo 'halt <br>';
    }

    function getName()
    {
        echo 'getName <br>';
    }
}

class Bios implements BiosInterface
{
    function execute()
    {
        echo 'execute <br>';
    }

    function waitForKeyPress()
    {
        echo 'waitForKeyPress <br>';
    }

    function launch(OsInterface $os)
    {
        echo 'launch <br>';
    }

    function powerDown()
    {
        echo 'powerDown <br>';
    }
}

class Facade
{
    private $os;

    private $bios;

    public function __construct(OsInterface $os, BiosInterface $bios)
    {
        $this->os = $os;
        $this->bios = $bios;
    }

    public function turnOn()
    {
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    public function turnOff()
    {
        $this->os->halt();
        $this->bios->powerDown();
    }
}

$os = new Os();
$bios = new Bios();

echo '<br> $os: <br>';
$os->halt();
$os->getName();

echo '<br> $bios: <br>';
$bios->execute();
$bios->waitForKeyPress();
$bios->launch($os);
$bios->powerDown();

echo '<br> - Facade <br>';
$facade = new Facade($os, $bios);

echo '<br> turnOn(): <br>';
$facade->turnOn();

echo '<br> turnOff(): <br>';
$facade->turnOff();






