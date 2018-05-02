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

    public function addElement(RenderableInterface $element)
    {
        $this->elements[] = $element;
    }

    public function render()
    {
        $formCode = '<form>';
        foreach ($this->elements as $element) {
            $formCode .= $element->render();
        }
        $formCode .= '</form>';

        return $formCode;
    }
}

echo '<br> $inputElement->render() <br>';
$inputElement = new InputElement();
echo $inputElement->render();

echo '<br><br> $textElement->render() <br>';
$text = 'text 1';
$textElement = new TextElement($text);
echo $textElement->render();

echo '<br><br> $form->render() <br>';
$form = new Form();

//$form->addElement($inputElement);
$form->addElement($textElement);

echo $form->render();

