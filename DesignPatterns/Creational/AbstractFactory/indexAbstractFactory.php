<?php
echo '---- Creational > Abstract Factory <br><br>';

/* Creational > Abstract Factory
 *
 * nhà máy ảo
 */

abstract class AbstractFactory
{
    abstract public function createText(string $content);
}

class JsonFactory extends AbstractFactory
{
    public function createText(string $content)
    {
        return new JsonText($content);
    }
}

class HtmlFactory extends AbstractFactory
{
    public function createText(string $content)
    {
        return new HtmlText($content);
    }
}

abstract class Text
{
    /**
     * @var string
     */
    protected $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
}

class JsonText extends Text
{
    // do something here
    function __construct($text)
    {
        parent::__construct($text);
        echo 'json text: '.$text;
    }
}

class HtmlText extends Text
{
    // do something here
    function __construct($text)
    {
        parent::__construct($text);
        echo 'html text: '.$text;
    }
}

echo '<br><br> $jsonText <br>';
$jsonText = new JsonText('1');
//echo $jsonText;

echo '<br><br> $htmlText <br>';
$htmlText = new HtmlText('2');
//echo $htmlText;


