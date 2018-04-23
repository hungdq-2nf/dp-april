<?php
echo '---- Structural > Facade <br><br>';

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

class Facade
{
    private $os;

    private $bios;

    public function __construct($bios, $os)
    {
        $this->bios = $bios;
        $this->os = $os;
    }

    public function turnOn()
    {
        echo 1;
        $this->bios->execute();
        $this->bios->waitForKeyPress();
        $this->bios->launch($this->os);
    }

    public function turnOff()
    {
        echo 2;
        $this->os->halt();
        $this->bios->powerDown();
    }
}

echo '<br> Facade <br>';
$facade = new Facade(BiosInterface::class, OsInterface::class);
//$facade->turnOn();
//$facade->turnOff();






