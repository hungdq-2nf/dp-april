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

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function renderData()
    {
        return $this->data;
    }
}

echo '<br><br> $jsonRenderer->renderData() <br>';
$jsonRenderer = new JsonRenderer();
$jsonRenderer->renderData();

echo '<br><br> $xmlRenderer->renderData() <br>';
$xmlRenderer = new XmlRenderer();
$xmlRenderer->renderData();

echo '<br><br> $webservice->renderData() <br>';
$webservice = new Webservice();
$webservice->renderData();





