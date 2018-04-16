<?php
echo '---- Behavioral > Null Object <br><br>';

/* Behavioral > Null Object
 *
 * đối tượng null
 */

interface LoggerInterface
{
    public function log(string $str);
}

class NullLogger implements LoggerInterface
{
    public function log(string $str)
    {
        // do nothing
    }
}

class PrintLogger implements LoggerInterface
{
    public function log(string $str)
    {
        echo $str;
    }
}

class Service
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function doSomething()
    {
        // notice here that you don't have to check if the logger is set with eg. is_null(), instead just use it
        $this->logger->log('We are in '.__METHOD__);
    }
}



