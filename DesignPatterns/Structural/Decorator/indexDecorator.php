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

//    public function __construct(RenderableInterface $renderer)
    public function __construct($renderer)
    {
        $this->wrapped = $renderer;
    }
}

class JsonRenderer extends RendererDecorator
{
    public function renderData()
    {
        echo 'JsonRenderer';
//        return json_encode($this->wrapped->renderData());
    }
}

class XmlRenderer extends RendererDecorator
{
    public function renderData()
    {
        $doc = new \DOMDocument();
//        $data = $this->wrapped->renderData();
        $data = 'data XmlRenderer';
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

echo '<br> $jsonRenderer->renderData() <br>';
$jsonRenderer = new JsonRenderer(RenderableInterface::class);
$jsonRenderer->renderData();

echo '<br> $xmlRenderer->renderData() <br>';
$xmlRenderer = new XmlRenderer(RenderableInterface::class);
$xmlRenderer->renderData();

echo '<br> $webservice->renderData() <br>';
$webservice = new Webservice('data Webservice');
$webservice->renderData();





