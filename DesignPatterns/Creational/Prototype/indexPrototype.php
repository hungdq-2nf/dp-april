<?php
echo '---- Creational > Prototype <br><br>';

/* Creational > Prototype
 *
 *
 */

abstract class BookPrototype
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $category;

    abstract public function __clone();

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class BarBookPrototype extends BookPrototype
{
    /**
     * @var string
     */
    protected $category = 'Bar';

    public function __clone()
    {
    }
}

class FooBookPrototype extends BookPrototype
{
    /**
     * @var string
     */
    protected $category = 'Foo';

    public function __clone()
    {
    }
}

echo ' BarBookPrototype <br>';
$barBookPrototype = new BarBookPrototype();
$barBookPrototype->setTitle('title bar');
echo $barBookPrototype->getTitle();

echo '<br><br> FooBookPrototype <br>';
$fooBookPrototype = new FooBookPrototype();
$fooBookPrototype->setTitle('title foo');
echo $fooBookPrototype->getTitle();







