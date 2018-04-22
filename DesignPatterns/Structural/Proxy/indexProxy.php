<?php
echo '---- Structural > Proxy <br><br>';

/* Structural > Proxy
 *
 * ủy quyền:
 */

class Record
{
    private $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (!isset($this->data[$name])) {
            throw new \OutOfRangeException('Invalid name given');
        }

        return $this->data[$name];
    }
}

class RecordProxy extends Record
{
    private $isDirty = false;

    private $isInitialized = false;

    public function __construct(array $data)
    {
        parent::__construct($data);

        // when the record has data, mark it as initialized
        // since Record will hold our business logic, we don't want to
        // implement this behaviour there, but instead in a new proxy class
        // that extends the Record class
        if (count($data) > 0) {
            $this->isInitialized = true;
            $this->isDirty = true;
        }
    }

    public function __set($name, $value)
    {
        $this->isDirty = true;

        parent::__set($name, $value);
    }

    public function isDirty()
    {
        return $this->isDirty;
    }
}

echo '<br><br> Record <br>';
$record = new Record(['name' => 'Audi']);
$record->__set('name', 'Audi');
$record->__get('name');


echo '<br><br> RecordProxy <br>';
$recordProxy = new RecordProxy(['name2' => 'Audi 2']);
$recordProxy->__set('name3', 'Audi 3');
echo $recordProxy->isDirty();





