<?php

abstract class AbstractFactoryMethod
{
    abstract function makePHPBook($param);
}

class SalahFactoryMethod extends AbstractFactoryMethod
{
    private $context = "Salah";

    function makePHPBook($param)
    {
        $book = NULL;
        switch ($param) {
            case "us":
                $book = new SalahPHPBook;
                break;
            case "other":
                $book = new BobbyPHPBook;
                break;
            default:
                $book = new SalahPHPBook;
                break;
        }
        return $book;
    }
}

class BobbyFactoryMethod extends AbstractFactoryMethod
{
    private $context = "Bobby";

    function makePHPBook($param)
    {
        $book = NULL;
        switch ($param) {
            case "us":
                $book = new BobbyPHPBook;
                break;
            case "other":
                $book = new SalahPHPBook;
                break;
            case "otherother":
                $book = new VisualQuickstartPHPBook;
                break;
            default:
                $book = new BobbyPHPBook;
                break;
        }
        return $book;
    }
}

abstract class AbstractBook
{
    abstract function getAuthor();

    abstract function getTitle();
}

abstract class AbstractPHPBook
{
    private $subject = "PHP";
}

class SalahPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;
    private static $oddOrEven = 'odd';

    function __construct()
    {
        //alternate between 2 books
        if ('odd' == self::$oddOrEven) {
            $this->author = 'Rasmus Lerdorf and Kevin Tatroe';
            $this->title = 'Programming PHP';
            self::$oddOrEven = 'even';
        } else {
            $this->author = 'David Sklar and Adam Trachtenberg';
            $this->title = 'PHP Cookbook';
            self::$oddOrEven = 'odd';
        }
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }
}

class BobbyPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;

    function __construct()
    {
        //alternate randomly between 2 books
        mt_srand((double)microtime() * 10000000);
        $rand_num = mt_rand(0, 1);

        if (1 > $rand_num) {
            $this->author = 'George Schlossnagle';
            $this->title = 'Advanced PHP Programming';
        } else {
            $this->author = 'Christian Wenz';
            $this->title = 'PHP Phrasebook';
        }
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }
}

class VisualQuickstartPHPBook extends AbstractPHPBook
{
    private $author;
    private $title;

    function __construct()
    {
        $this->author = 'Larry Ullman';
        $this->title = 'PHP for the World Wide Web';
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }
}

writeln('');

writeln('testing SalahFactoryMethod');
$factoryMethodInstance = new SalahFactoryMethod;
testFactoryMethod($factoryMethodInstance);
writeln('');

writeln('testing BobbyFactoryMethod');
$factoryMethodInstance = new BobbyFactoryMethod;
testFactoryMethod($factoryMethodInstance);
writeln('');

writeln('');

function testFactoryMethod($factoryMethodInstance)
{
    $phpUs = $factoryMethodInstance->makePHPBook("us");
    writeln('us php Author: ' . $phpUs->getAuthor());
    writeln('us php Title: ' . $phpUs->getTitle());

    $phpUs = $factoryMethodInstance->makePHPBook("other");
    writeln('other php Author: ' . $phpUs->getAuthor());
    writeln('other php Title: ' . $phpUs->getTitle());

    $phpUs = $factoryMethodInstance->makePHPBook("otherother");
    writeln('otherother php Author: ' . $phpUs->getAuthor());
    writeln('otherother php Title: ' . $phpUs->getTitle());
}

function writeln($line_in)
{
    echo $line_in . "<br/>";
}

/* kq:

testing SalahFactoryMethod
us php Author: Rasmus Lerdorf and Kevin Tatroe
us php Title: Programming PHP
other php Author: George Schlossnagle
other php Title: Advanced PHP Programming
otherother php Author: David Sklar and Adam Trachtenberg
otherother php Title: PHP Cookbook

testing BobbyFactoryMethod
us php Author: Christian Wenz
us php Title: PHP Phrasebook
other php Author: Rasmus Lerdorf and Kevin Tatroe
other php Title: Programming PHP
otherother php Author: Larry Ullman
otherother php Title: PHP for the World Wide Web

