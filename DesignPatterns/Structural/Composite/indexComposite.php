<?php
echo '---- Structural > Composite <br><br>';

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

        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }

        $formCode .= '</form>';

        return $formCode;
    }

    public function addElement(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }
}


echo '<br><br> $inputElement->render() <br>';
$inputElement = new InputElement();
echo $inputElement->render();

echo '<br><br> $textElement->render() <br>';
$textElement = new TextElement();
echo $textElement->render();

echo '<br><br> $textElement->render() <br>';
$form = new Form();
echo $form->render();

$element = 1;
$form->addElement($element);


