<?php
echo '---- more > Repository <br><br>';

/* more > Repository
 *
 *
 */

class MemoryStorage
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var int
     */
    var $lastId = 0;

    public function persist(array $data)
    {
        $this->lastId++;

        $data['id'] = $this->lastId;
        $this->data[$this->lastId] = $data;

        return $this->lastId;
    }

    public function retrieve($id)
    {
        if (!isset($this->data[$id])) {
            echo '<br> No data found for ID <br>';
        }
        return $this->data[$id];
    }

    public function delete($id)
    {
        if (!isset($this->data[$id])) {
            throw new \OutOfRangeException(sprintf('No data found for ID %d', $id));
        }

        unset($this->data[$id]);
    }
}

class Post
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $text;

    public static function fromState(array $state)
    {
        return new self(
            $state['id'],
            $state['title'],
            $state['text']
        );
    }

    /**
     * @param int|null $id
     * @param string $text
     * @param string $title
     */
    public function __construct($id, $title, $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getTitle()
    {
        return $this->title;
    }
}

class PostRepository
{
    /**
     * @var MemoryStorage
     */
    private $persistence;

    public function __construct(MemoryStorage $persistence)
    {
        $this->persistence = $persistence;
    }

    public function findById($id)
    {
        $arrayData = $this->persistence->retrieve($id);

        if (is_null($arrayData)) {
            echo '<br> Post with ID does not exist <br>';
        }

        return Post::fromState($arrayData);
    }

    public function save(Post $post)
    {
        $id = $this->persistence->persist([
            'text' => $post->getText(),
            'title' => $post->getTitle(),
        ]);

        $post->setId($id);
    }
}

$data = [
    'id' => 1,
    'title' => 'Title 1',
    'text' => 'Text 1'
];

echo 'MemoryStorage <br>';
$memoryStorage = new MemoryStorage();
$idRetrieve = $memoryStorage->lastId;
$idRetrieve++;

echo '<br> $memoryStorage->persist($data) <br>';
echo $memoryStorage->persist($data);

echo '<br> $memoryStorage->retrieve(1) <br>';
echo '<pre>';
print_r($memoryStorage->retrieve($idRetrieve));
echo '</pre>';

echo 'Post <br>';
$post = new Post(2, 'Title 2', 'Text 2');

echo '<br> Post::fromState($arrayState) <br>';
$arrayState = [
    'id' => 3,
    'title' => 'Title 3',
    'text' => 'Text 3'
];
echo '<pre>';
print_r(Post::fromState($arrayState));
echo '</pre>';
$post->setId(2);

echo '<br> $post->getId() <br>';
echo $post->getId();

echo '<br> $post->getText() <br>';
echo $post->getText();

echo '<br> $post->getTitle() <br>';
echo $post->getTitle();

echo '<br><br> PostRepo <br>';
$postRepo = new PostRepository($memoryStorage);

echo '<pre>';
print_r($postRepo->findById($idRetrieve));
echo '</pre>';

echo '<br> $postRepo->save($post) <br>';
$postRepo->save($post);

echo '<br><br>  <br>';




