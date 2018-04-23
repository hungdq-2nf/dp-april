<?php
echo '---- Structural > Composite <br>';

/* Structural > Composite
 *
 * hỗn hợp: cấu trúc một class theo tiêu chuẩn hoặc điều chỉnh cấu trúc một class đang tồn tại
 */

interface RenderableInterface
{
    public function render();
}

class InputElement implements RenderableInterface
{
    public function render()
    {
        return '<input type="text" />';
    }
}

class TextElement implements RenderableInterface
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render()
    {
        return $this->text;
    }
}

class Form implements RenderableInterface
{
    private $elements;

    public function render()
    {
        $formCode = '<form>';

        $this->elements = [1,2];

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= '</form>';

        return $formCode;
    }

//    public function addElement(RenderableInterface $element)
    public function addElement($element)
    {
        $this->elements[] = $element;
    }
}

echo '<br> $inputElement->render() <br>';
$inputElement = new InputElement();
echo $inputElement->render();

echo '<br> $textElement->render() <br>';
$textElement = new TextElement('text 1');
echo $textElement->render();

echo '<br> $form->render() <br>';
$form = new Form();
//echo $form->render();

$element = 1;
$element = [1, 2];
$form->addElement(RenderableInterface::class);


