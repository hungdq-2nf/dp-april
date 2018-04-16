<?php
echo '---- Structural > Decorator <br><br>';

/* Structural > Decorator
 *
 * nhà trang trí: Tính năng mới được thêm vào bằng cách tạo class mới có cùng dạng với class đang có, mở rộng các phương thức một cách linh động
 */

interface RenderableInterface
{
    public function renderData();
}

abstract class RendererDecorator implements RenderableInterface
{
    protected $wrapped;

    public function __construct(RenderableInterface $renderer)
    {
        $this->wrapped = $renderer;
    }
}

class JsonRenderer extends RendererDecorator
{
    public function renderData()
    {
        return json_encode($this->wrapped->renderData());
    }
}

class XmlRenderer extends RendererDecorator
{
    public function renderData()
    {
        $doc = new \DOMDocument();
        $data = $this->wrapped->renderData();
        $doc->appendChild($doc->createElement('content', $data));

        return $doc->saveXML();
    }
}

class Webservice implements RenderableInterface
{
    private $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function renderData()
    {
        return $this->data;
    }
}


