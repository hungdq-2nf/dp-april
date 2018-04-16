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

    public function __construct(string $text)
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





