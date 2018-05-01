<?php
//https://allaravel.com/tutorials/design-pattern-su-tien-hoa-trong-lap-trinh/

//strategy - chiến lược     < Behavioral

// Interface Sort định nghĩa phương thức sort()
interface iSort
{
    function sort(array $list);
}

// Lớp MultiAlphaSort sắp xếp mảng đa chiều chứa ký tự
class MultiAlphaSort implements iSort
{
    // Cách sắp xếp: tăng dần, giảm dần
    private $_order;

    // Sort index:
    private $_index;

    function __construct($index, $order = 'asc')
    {
        $this->_index = $index;
        $this->_order = $order;
    }

    // Phương thức thực hiện sắp xếp
    function sort(array $list)
    {
        // Change the algorithm to match the sort preference:
        if ($this->_order == 'asc') {
            uasort($list, [$this, 'ascSort']);
        } else {
            uasort($list, [$this, 'descSort']);
        }
        return $list;
    }

    // Phương thức so sánh hai giá trị
    function ascSort($x, $y)
    {
        return strcasecmp($x[$this->_index], $y[$this->_index]);
    }

    function descSort($x, $y)
    {
        return strcasecmp($y[$this->_index], $x[$this->_index]);
    }
}

// Class MultiNumberSort sắp xếp một mảng đa chiều
class MultiNumberSort implements iSort
{
    // Cách sắp xếp
    private $_order;

    // Sort index
    private $_index;

    function __construct($index, $order = 'asc')
    {
        $this->_index = $index;
        $this->_order = $order;
    }

    // Thực hiện sắp xếp
    function sort(array $list)
    {
        // Thay đổi thuật toán phù hợp với thiết lập
        if ($this->_order == 'asc') {
            uasort($list, [$this, 'ascSort']);
        } else {
            uasort($list, [$this, 'descSort']);
        }
        return $list;
    }

    // Phương thức so sánh hai giá trị
    function ascSort($x, $y)
    {
        return ($x[$this->_index] > $y[$this->_index]);
    }

    function descSort($x, $y)
    {
        return ($x[$this->_index] < $y[$this->_index]);
    }
}

/* Lớp StudentsList
 * Lớp có 1 thuộc tính: _students.
 * Lớp có 3 phương thức:
 * - __construct()
 * - sort()
 * - display()
 */

class StudentsList
{
    // Danh sách sinh viên được sắp xếp
    private $_students = [];

    function __construct($list)
    {
        $this->_students = $list;
    }

    // Thực hiện sắp xếp dùng một thực thi từ iSort
    function sorting(iSort $type)
    {
        $this->_students = $type->sort($this->_students);
    }

    // Hiển thị danh sách sinh viên dạng HTML
    function display()
    {
        echo '<ol>';
        foreach ($this->_students as $student) {
            echo "<li>{$student['last_name']} "
                ."{$student['first_name']} "
                .": {$student['grade']}</li>";
        }
        echo '</ol>';
    }

}

// Tạo mảng sinh viên, mỗi sinh viên có cấu trúc:
// studentID => ['first_name' => 'First Name', 'last_name' => 'Last Name', 'grade' => XX]
$students = [
    2 => [
        'first_name' => 'Hung',
        'last_name' => 'Audi',
        'grade' => 90
    ],
    5 => [
        'first_name' => 'Vu',
        'last_name' => 'Lambo',
        'grade' => 80
    ],
    1 => [
        'first_name' => 'Phu',
        'last_name' => 'Ferrari',
        'grade' => 60
    ],
];

// Tạo obj
$list = new StudentsList($students);

// Hiển thị mảng trước khi sắp xếp
echo '<h4>Danh sách gốc</h4>';
$list->display();

// Sắp xếp theo tên
$list->sorting(new MultiAlphaSort('first_name'));
echo '<h4>Danh sách sắp xếp theo tên</h4>';
$list->display();

// Sắp xếp theo điểm
//$list->sort(new MultiNumberSort('grade', 'desc'));
$list->sorting(new MultiNumberSort('grade', 'asc'));
echo '<h4>Danh sách sắp xếp theo điểm</h4>';
$list->display();

// Xóa obj
unset($list);