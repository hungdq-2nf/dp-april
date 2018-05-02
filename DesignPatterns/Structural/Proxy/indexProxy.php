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
            echo 'Invalid name given';
        } else {
            return $this->data[$name];
        }
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

echo 'Record <br>';
$data = [
    'name1' => 'Audi 1',
    'name2' => 'Audi 2',
    'name3' => 'Audi 3'
];
$name1 = 'name1';
$value1 = 'Audi 1';

$record = new Record($data);
$record->__set($name1, $value1);

echo '<pre>';
print_r($record->__get($name1));
echo '</pre>';


echo '-- RecordProxy <br>';
$dataEmpty = [];
$name4 = 'name 4';
$value4 = 'Audi 4';

echo '<br>RecordProxy __construct have data <br>';
$recordProxy = new RecordProxy($data);
echo $recordProxy->isDirty();

echo '<br>RecordProxy __construct not data <br>';
$recordProxy = new RecordProxy($dataEmpty);
echo $recordProxy->isDirty();

echo '<br>RecordProxy not __set data <br>';
echo $recordProxy->isDirty();

echo '<br>RecordProxy have __set data <br>';
$recordProxy->__set($name4, $value4);
echo $recordProxy->isDirty();







