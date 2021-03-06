<?php

abstract class BridgeBook
{
    private $bbAuthor;
    private $bbTitle;
    private $bbImp;

    function __construct($author_in, $title_in, $choice_in)
    {
        $this->bbAuthor = $author_in;
        $this->bbTitle = $title_in;

        if ('STARS' == $choice_in) {
            $this->bbImp = new BridgeBookStarsImp();
        } else {
            $this->bbImp = new BridgeBookCapsImp();
        }
    }

    function showAuthor()
    {
        return $this->bbImp->showAuthor($this->bbAuthor);
    }

    function showTitle()
    {
        return $this->bbImp->showTitle($this->bbTitle);
    }
}

class BridgeBookAuthorTitle extends BridgeBook
{
    function showAuthorTitle()
    {
        return $this->showAuthor() . "'s " . $this->showTitle();
    }
}

class BridgeBookTitleAuthor extends BridgeBook
{
    function showTitleAuthor()
    {
        return $this->showTitle() . ' by ' . $this->showAuthor();
    }
}

abstract class BridgeBookImp
{
    abstract function showAuthor($author);

    abstract function showTitle($title);
}

class BridgeBookCapsImp extends BridgeBookImp
{
    function showAuthor($author_in)
    {
        return strtoupper($author_in);
    }

    function showTitle($title_in)
    {
        return strtoupper($title_in);
    }
}

class BridgeBookStarsImp extends BridgeBookImp
{
    function showAuthor($author_in)
    {
        return str_replace(" ", "*", $author_in);
    }

    function showTitle($title_in)
    {
        return str_replace(" ", "*", $title_in);
    }
}

writeln('');

writeln('test 1 - author title with caps');
$book = new BridgeBookAuthorTitle('Larry Truett', 'PHP for Cats', 'CAPS');
writeln($book->showAuthorTitle());
writeln('');

writeln('test 2 - author title with stars');
$book = new BridgeBookAuthorTitle('Larry Truett', 'PHP for Cats', 'STARS');
writeln($book->showAuthorTitle());
writeln('');

writeln('test 3 - title author with caps');
$book = new BridgeBookTitleAuthor('Larry Truett', 'PHP for Cats', 'CAPS');
writeln($book->showTitleAuthor());
writeln('');

writeln('test 4 - title author with stars');
$book = new BridgeBookTitleAuthor('Larry Truett', 'PHP for Cats', 'STARS');
writeln($book->showTitleAuthor());
writeln('');


function writeln($line_in)
{
    echo $line_in . "<br/>";
}

/* kq:

test 1 - author title with caps
LARRY TRUETT's PHP FOR CATS

test 2 - author title with stars
Larry*Truett's PHP*for*Cats

test 3 - title author with caps
PHP FOR CATS by LARRY TRUETT

test 4 - title author with stars
PHP*for*Cats by Larry*Truett
