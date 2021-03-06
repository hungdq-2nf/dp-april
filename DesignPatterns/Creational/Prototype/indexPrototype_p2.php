<?php

abstract class Book2Prototype
{
    protected $title;
    protected $topic;

    abstract function __clone();

    function getTitle()
    {
        return $this->title;
    }

    function setTitle($titleIn)
    {
        $this->title = $titleIn;
    }

    function getTopic()
    {
        return $this->topic;
    }
}

class PHPBookPrototype extends Book2Prototype
{
    function __construct()
    {
        $this->topic = 'PHP';
    }

    function __clone()
    {
    }
}

class SQLBookPrototype extends Book2Prototype
{
    function __construct()
    {
        $this->topic = 'SQL';
    }

    function __clone()
    {
    }
}

writeln('');

$phpProto = new PHPBookPrototype();
$sqlProto = new SQLBookPrototype();

$book1 = clone $sqlProto;
$book1->setTitle('SQL For Cats');
writeln('Book 1 topic: ' . $book1->getTopic());
writeln('Book 1 title: ' . $book1->getTitle());
writeln('');

$book2 = clone $phpProto;
$book2->setTitle('Salah Learning PHP 5');
writeln('Book 2 topic: ' . $book2->getTopic());
writeln('Book 2 title: ' . $book2->getTitle());
writeln('');

$book3 = clone $sqlProto;
$book3->setTitle('Salah Learning SQL');
writeln('Book 3 topic: ' . $book3->getTopic());
writeln('Book 3 title: ' . $book3->getTitle());
writeln('');


function writeln($line_in)
{
    echo $line_in . "<br/>";
}

/* kq:

Book 1 topic: SQL
Book 1 title: SQL For Cats

Book 2 topic: PHP
Book 2 title: Salah Learning PHP 5

Book 3 topic: SQL
Book 3 title: Salah Learning SQL
