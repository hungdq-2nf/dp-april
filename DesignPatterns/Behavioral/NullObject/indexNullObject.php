<?php
echo '---- Behavioral > Null Object <br><br>';

/* Behavioral > Null Object
 *
 * đối tượng null
 */

interface LoggerInterface
{
    public function log($str);
}

class NullLogger implements LoggerInterface
{
    public function log($str)
    {
        // do nothing
        echo 'null log: ' . $str . '<br>';
    }
}

class PrintLogger implements LoggerInterface
{
    public function log($str)
    {
        echo 'print log: ' . $str.'<br>';
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
        echo 'service<br>';
        // notice here that you don't have to check if the logger is set with eg. is_null(), instead just use it
        $this->logger->log('We are in class '.__METHOD__);
    }
}

$nullLogger = new NullLogger();
$printLogger = new PrintLogger();

$serviceNullLogger = new Service($nullLogger);
$serviceNullLogger->doSomething();

$servicePrintLogger = new Service($printLogger);
$servicePrintLogger->doSomething();


