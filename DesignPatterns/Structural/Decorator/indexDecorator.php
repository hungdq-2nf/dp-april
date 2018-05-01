<?php
echo '---- Structural > Decorator <br>';

/* Structural > Decorator
 *
 * nhà trang trí: Tính năng mới được thêm vào bằng cách tạo class mới có cùng dạng với class đang có, mở rộng các phương thức một cách linh động
 */

interface RenderableInterface
{
    public function renderData();
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
        return $this->wrapped->renderData();
//        return json_encode($this->wrapped->renderData());
    }
}

class XmlRenderer extends RendererDecorator
{
    public function renderData()
    {
        $doc = new \DOMDocument();
        $data = $this->wrapped->renderData();
        $doc->appendChild(
            $doc->createElement('content', $data)
        );
        return $doc->saveXML();
    }
}

$data = 'abc';

echo '<br> $webservice->renderData(): method of old class';
$webservice = new Webservice($data);
echo '<pre>';
print_r($webservice->renderData());
echo '</pre>';

echo '$jsonRenderer->renderData(): method of new class';
$jsonRenderer = new JsonRenderer($webservice);
echo '<pre>';
print_r($jsonRenderer->renderData());
echo '</pre>';

echo '$xmlRenderer->renderData(): method of new class';
$xmlRenderer = new XmlRenderer($webservice);
echo '<pre>';
print_r($xmlRenderer->renderData());
echo '</pre>';





