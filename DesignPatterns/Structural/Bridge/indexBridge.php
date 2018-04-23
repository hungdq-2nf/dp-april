<?php
echo '---- Structural > Bridge <br><br>';

/* Structural > Adapter
 *
 * bộ chuyển đổi: giúp các thành phần mới có thể cắm vào hệ thống không hỗ trợ cổng của nó
 * */

interface FormatterInterface
{
    public function format(string $text);
}

class HtmlFormatter implements FormatterInterface
{
    public function format($text)
    {
        return sprintf('<p>%s</p>', $text);
    }
}

class PlainTextFormatter implements FormatterInterface
{
    public function format(string $text)
    {
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
    public function __construct(FormatterInterface $printer)
    {
        $this->implementation = $printer;
    }

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








