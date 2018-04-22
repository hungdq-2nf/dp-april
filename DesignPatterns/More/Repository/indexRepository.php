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
    private $lastId = 0;

    public function persist(array $data)
    {
        $this->lastId++;

        $data['id'] = $this->lastId;
        $this->data[$this->lastId] = $data;

        return $this->lastId;
    }

    public function retrieve(int $id)
    {
        if (!isset($this->data[$id])) {
            throw new \OutOfRangeException(sprintf('No data found for ID %d', $id));
        }

        return $this->data[$id];
    }

    public function delete(int $id)
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
    public function __construct($id, string $title, string $text)
    {
        $this->id = $id;
        $this->text = $text;
        $this->title = $title;
    }

    public function setId(int $id)
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

    public function findById(int $id)
    {
        $arrayData = $this->persistence->retrieve($id);

        if (is_null($arrayData)) {
            throw new \InvalidArgumentException(sprintf('Post with ID %d does not exist', $id));
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


echo '<br><br> MemoryStorage <br>';
$memoryStorage = new MemoryStorage();

echo '<br> $memoryStorage->persist([1, 5, 2]) <br>';
echo $memoryStorage->persist([1, 5, 2]);

echo '<br> $memoryStorage->retrieve(5) <br>';
echo $memoryStorage->retrieve(5);

echo '<br><br> Post <br>';
$post = new Post(1, 'Title 1', 'Text 1');

echo '<br> Post::fromState([]) <br>';
$arrayState = [
    'id' => 1,
    'title' => 'Title 1',
    'text' => 'Text 1'
];
echo Post::fromState($arrayState);
$post->setId(6);

echo '<br> $post->getId() <br>';
echo $post->getId();

echo '<br> $post->getText() <br>';
echo $post->getText();

echo '<br> $post->getTitle() <br>';
echo $post->getTitle();

echo '<br><br> PostRepo <br>';
$postRepo = new PostRepository($memoryStorage);

echo $postRepo->findById(1);

echo '<br> $postRepo->save($post) <br>';
$postRepo->save($post);

echo '<br><br>  <br>';




