<?php

/*
 * BookFactory classes
 */

abstract class AbstractBookFactory
{
    abstract function makePHPBook();

    abstract function makeMySQLBook();
}

class SalahBookFactory extends AbstractBookFactory
{
    private $context = "Salah";

    function makePHPBook()
    {
        return new SalahPHPBook;
    }

    function makeMySQLBook()
    {
        return new SalahMySQLBook;
    }
}

class BobbyBookFactory extends AbstractBookFactory
{
    private $context = "Bobby";

    function makePHPBook()
    {
        return new BobbyPHPBook;
    }

    function makeMySQLBook()
    {
        return new BobbyMySQLBook;
    }
}

/*
 *   Book classes
 */

abstract class AbstractBook
{
    abstract function getAuthor();

    abstract function getTitle();
}

abstract class AbstractMySQLBook extends AbstractBook
{
    private $subject = "MySQL";
}

class SalahMySQLBook extends AbstractMySQLBook
{
    private $author;
    private $title;

    function __construct()
    {
        $this->author = 'George Reese, Randy Jay Yarger, and Tim King';
        $this->title = 'Managing and Using MySQL';
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

class BobbyMySQLBook extends AbstractMySQLBook
{
    private $author;
    private $title;

    function __construct()
    {
        $this->author = 'Paul Dubois';
        $this->title = 'MySQL, 3rd Edition';
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

abstract class AbstractPHPBook extends AbstractBook
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

/*
 *   Initialization
 */

writeln('');

writeln('testing SalahBookFactory');
$bookFactoryInstance = new SalahBookFactory;
testConcreteFactory($bookFactoryInstance);
writeln('');

writeln('testing BobbyBookFactory');
$bookFactoryInstance = new BobbyBookFactory;
testConcreteFactory($bookFactoryInstance);

writeln('');

function testConcreteFactory($bookFactoryInstance)
{
    $phpBookOne = $bookFactoryInstance->makePHPBook();
    writeln('first php Author: ' . $phpBookOne->getAuthor());
    writeln('first php Title: ' . $phpBookOne->getTitle());

    $phpBookTwo = $bookFactoryInstance->makePHPBook();
    writeln('second php Author: ' . $phpBookTwo->getAuthor());
    writeln('second php Title: ' . $phpBookTwo->getTitle());

    $mySqlBook = $bookFactoryInstance->makeMySQLBook();
    writeln('MySQL Author: ' . $mySqlBook->getAuthor());
    writeln('MySQL Title: ' . $mySqlBook->getTitle());
}

function writeln($line_in)
{
    echo $line_in . "<br/>";
}

/* kq:

testing SalahBookFactory
first php Author: Rasmus Lerdorf and Kevin Tatroe
first php Title: Programming PHP
second php Author: David Sklar and Adam Trachtenberg
second php Title: PHP Cookbook
MySQL Author: George Reese, Randy Jay Yarger, and Tim King
MySQL Title: Managing and Using MySQL

testing BobbyBookFactory
first php Author: Christian Wenz
first php Title: PHP Phrasebook
second php Author: George Schlossnagle
second php Title: Advanced PHP Programming
MySQL Author: Paul Dubois
MySQL Title: MySQL, 3rd Edition
