<?php
echo '---- Structural > Bridge <br><br>';

/* Structural > Bridge
 *
 * cầu nối: tách sự trừu tượng từ việc thực hiện nên 2 cái có thể khác nhau 1 cách độc lập
 * */

interface FormatterInterface
{
    public function format($text);
}

class HtmlFormatter implements FormatterInterface
{
    public function format($text)
    {
        echo 1;
        return sprintf('<p>%s</p>', $text);
    }
}

class PlainTextFormatter implements FormatterInterface
{
    public function format($text)
    {
        echo 2;
        return $text;
    }
}

abstract class Service
{
    /**
     * @var FormatterInterface
     */
    protected $implementation;

    /**
     * @param FormatterInterface $printer
     */
//    public function __construct(FormatterInterface $printer)
//    {
//        $this->implementation = $printer;
//    }

    /**
     * @param FormatterInterface $printer
     */
    public function setImplementation(FormatterInterface $printer)
    {
        $this->implementation = $printer;
    }

    abstract public function get();
}

class HelloWorldService extends Service
{
    public function get()
    {
        return $this->implementation->format('Hello World');
    }
}

echo 'HtmlFormatter() <br>';
$htmlFormatter = new HtmlFormatter();
$textHtml = 'text html';
echo '<pre>';
print_r($htmlFormatter->format($textHtml));
echo '</pre>';

echo 'PlainTextFormatter() <br>';
$plainTextFormatter = new PlainTextFormatter();
$textPlain = 'text plain';
echo '<pre>';
print_r($plainTextFormatter->format($textPlain));
echo '</pre>';

echo '<br> -- service use bridge <br><br>';

echo 'HelloWorldService() html <br>';
//$hellowordService = new HelloWorldService($htmlFormatter);
$hellowordService = new HelloWorldService();
$hellowordService->setImplementation($htmlFormatter);
echo '<pre>';
print_r($hellowordService->get());
echo '</pre>';

echo 'HelloWorldService() plain <br>';
//$hellowordService = new HelloWorldService($plainTextFormatter);
$hellowordService = new HelloWorldService();
$hellowordService->setImplementation($plainTextFormatter);
echo '<pre>';
print_r($hellowordService->get());
echo '</pre>';



