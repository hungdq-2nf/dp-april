<?php

class Playlist
{
    private $__songs;

    public function __construct()
    {
        $this->__songs = array();
    }

    public function addSong($location, $title)
    {
        $song = array('location' => $location, 'title' => $title);
        $this->__songs[] = $song;
    }

    public function getM3U()
    {
        $m3u = '#EXTM3U\n\n';

        foreach ($this->__songs as $song) {
            $m3u .= "#EXTINF:-1,{$song['title']}\n";
            $m3u .= "{$song['location']}\n";
        }
        return $m3u;
    }

    public function getPLS()
    {
        $pls = "[playIist]\nNumberOfEntries=" . count($this->__songs) . "\n\n";

        foreach ($this->__songs as $songCount => $song) {
            $counter = $songCount + 1;
            $pls .= "File{$counter}={$song['location']}\n";
            $pls .= "Title{$counter}={$song['title']}\n";
            $pls .= "Length{$counter}=-1\n\n";
        }
        return $pls;
    }
}

class newPlaylist
{
    private $__songs;
    private $__typeObject;

    public function __construct($type)
    {
        $this->__songs = array();
        $object = "{$type}PlaylistDelegate";
        $this->__typeObject = new $object;
    }

    public function addSong($location, $title)
    {
        $song = array('location' => $location, 'title' => $title);
        $this->__songs[] = $song;
    }

    public function getPlaylist()
    {
        $playlist = $this->__typeObject->getPlaylist($this->__songs);
        return $playlist;
    }
}

class m3uPlaylistDelegate
{
    public function getPlaylist($songs)
    {
        $m3u = "#EXTM3U\n\n";

        foreach ($songs as $song) {
            $m3u .= "#EXTINF:-1,{$song['title']}\n";
            $m3u .= "{$song['location']}\n";
        }

        return $m3u;
    }
}

class plsPlaylistDelegate
{
    public function getPlaylist($songs)
    {
        $pls = "[playIist]\nNumberOfEntries=" . count($songs) . "\n\n";

        foreach ($songs as $songCount => $song) {
            $counter = $songCount + 1;
            $pls .= "File{$counter}={$song['location']}\n";
            $pls .= "Title{$counter}={$song['title']}\n";
            $pls .= "Length{$counter}=-1\n\n";
        }

        return $pls;
    }
}

$playlist = new Playlist();
$playlist->addSong('http://allaravel/music/song_1.mp3', 'Song 1');
$playlist->addSong('http://allaravel/music/song_2.mp3', 'Song 2');

$externalRetrievedType = 'pls';

$playlist = new newPlaylist($externalRetrievedType);
$playlist2 = new Playlist();

$playlistContent = $playlist->getPlaylist();

if ($externalRetrievedType == 'pls') {
    $playlistContent = $playlist2->getPLS();
} else {
    $playlistContent = $playlist2->getM3U();
}

class Delegate
{
    protected $_closures = array();

    public function add($closures)
    {
        if (is_array($closures)) {
            if (get_class($closures[0]) != 'Closure') {
                $this->setClosure($closures);
            } else {
                foreach ($closures as $closure) {
                    $this->setClosure($closure);
                }
            }
        } else {
            $this->setClosure($closures);
        }
    }

    public function setClosure($closure)
    {
        if (!in_array($closure, $this->_closures)) {
            $this->_closures[] = $closure;
        }
    }

    public function execute()
    {
        foreach ($this->_closures as $closure) {
            call_user_func($closure);
        }
    }
}


function test()
{
    echo "testing";
}

class Dog
{
    protected $_name = 'Jonh';

    public function bark()
    {
        echo $this->_name;
    }
}

$mydog = new Dog();

$processruns = new Delegate();
$processruns->add(function () {
    echo "hello";
});
$processruns->add(function () {
    echo "world";
});

$processruns->add(array($mydog, 'bark'));
$processruns->add('test');

// Hoặc có thể add vào bằng mảng
// $processruns->add(array(function() { echo "hello"; }, function() { echo "world"; }, array($mydog, 'bark'), 'test'));
echo '<br> execute() <br>';
$processruns->execute();


echo '<br><br>  <br>';


echo '<br><br>  <br>';




