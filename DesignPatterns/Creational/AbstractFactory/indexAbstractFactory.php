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

    public function __construct(string $text)
    {
        $this->text = $text;
    }
}

class JsonText extends Text
{
    // do something here
}

class HtmlText extends Text
{
    // do something here
}

