<?php
//https://allaravel.com/tutorials/composite-pattern-tu-khai-niem-den-thuc-hanh/

//composite - tích hợp      < Creational

#------------ ĐỊNH NGHĨA CLASS ----------------------#
/* Định nghĩa class WorkUnit sử dụng Composite pattern
 * Lớp có 2 thuộc tính: tasks, name.
 * Lớp có 6 phương thức: __construct(), getName(), add(), remove(), assignTask(), completeTask().
 */
abstract class WorkUnit
{
    // Các tác vụ cần làm
    protected $tasks = [];

    // Lưu tên nhân viên hoặc tên nhóm
    protected $name = NULL;

    function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    // Các phương thức trìu tượng cần thực hiện
    abstract function add(Employee $e);
    abstract function remove(Employee $e);
    abstract function assignTask($task);
    abstract function completeTask($task);
}

/* Lớp Team mở rộng từ lớp WorkUnit.
 * Lớp có 1 thuộc tính: _employees.
 * Lớp có 1 phương thức: getCount().
 */
class Team extends WorkUnit
{
    // Lưu các thành viên của nhóm
    private $_employees = [];

    // Thực hiện các phương thức trìu tượng
    function add(Employee $e)
    {
        $this->_employees[] = $e;
        echo "<p>{$e->getName()} gia nhập nhóm "
            ."{$this->getName()}.</p>";
    }

    function remove(Employee $e)
    {
        $index = array_search($e, $this->_employees);
        unset($this->_employees[$index]);
        echo "<p>{$e->getName()} bị đuổi khỏi nhóm "
            ."{$this->getName()}.</p>";
    }

    function assignTask($task)
    {
        $this->tasks[] = $task;
        echo "<p>Một tác vụ được gán cho nhóm "
            ."{$this->getName()}
            . Nó có thể hoàn thành dễ dàng với "
            ."{$this->getCount()} thành viên.</p>";
    }

    function completeTask($task)
    {
        $index = array_search($task, $this->tasks);
        unset($this->tasks[$index]);
        echo "<p>Nhiệm vụ '$task' đã hoàn thành bởi nhóm "
            ."{$this->getName()}.</p>";
    }

    // Phương thức trả về số thành viên trong nhóm
    function getCount()
    {
        return count($this->_employees);
    }
}

/* Lớp Employee mở rộng từ lớp WorkUnit
 * Lớp không có thuộc tính và phương thức nào
 */
class Employee extends WorkUnit {
    // Empty functions
    function add(Employee $e)
    {
        return false;
    }

    function remove(Employee $e)
    {
        return false;
    }

    // Thực hiện phương thức trìu tượng
    function assignTask($task)
    {
        $this->tasks[] = $task;
        echo "<p>Một tác vụ được gán cho {$this->getName()}
            . Tác vụ này phải được hoàn thành bởi một mình "
            ."{$this->getName()}.</p>";
    }

    function completeTask($task)
    {
        $index = array_search($task, $this->tasks);
        unset($this->tasks[$index]);
        echo "<p>Nhiệm vụ '$task' được hoàn thành bởi "
            ."{$this->getName()}. </p>";
    }

}
#------------ KẾT THÚC ĐỊNH NGHĨA CLASS ----------------------#

// Tạo đối tượng
$fontend    = new Team('Fontend');
$kulit      = new Employee('Kulit');
$evan       = new Employee('Evan You');
$taylor     = new Employee('Taylor Otwell');

// Gán nhân viên vào nhóm fontend
$fontend->add($kulit);
$fontend->add($evan);
$fontend->add($taylor);

// Gán các tác vụ cho nhóm và nhân viên
$fontend->assignTask('Xây dựng website');
$evan->assignTask('Xây dựng fontend');
// Hoàn thành một tác vụ
$fontend->completeTask('Xây dựng website');

// Chuyển Taylor Otwell sang nhóm backend
$fontend->remove($taylor);

// Xóa các đối tượng
unset($fontend, $kulit, $evan, $taylor);
