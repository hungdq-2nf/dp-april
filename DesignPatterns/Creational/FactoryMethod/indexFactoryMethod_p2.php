<?php
//https://allaravel.com/tutorials/factory-pattern-nha-may-tao-thuc-the/

//factory - nhà máy tạo thực thể    < Creational

#------------ ĐỊNH NGHĨA CLASS ----------------------#
/* Định nghĩa class ShapeFactory sử dụng Factory pattern
 * The class contains no attributes.
 * The class contains one method: Create().
 */

abstract class ShapeFactory
{
    // Phương thức static để tạo đối tượng
    static function Create($type, array $sizes)
    {
        // Xác định dạng đối tượng theo tham số nhận vào
        switch ($type) {
            case 'rectangle':
                return new Rectangle($sizes[0], $sizes[1]);
                break;
            case 'triangle':
                return new Triangle($sizes[0], $sizes[1], $sizes[2]);
                break;
        }
    }
}

/* Định nghĩa lớp trìu tượng Shape
 * Lớp Shape không có thuộc tính
 * Lớp Shape có 2 phương thức trìu tượng:
 * - getArea()
 * - getPerimeter()
*/

abstract class Shape
{
    abstract protected function getArea();

    abstract protected function getPerimeter();
}

/* Định nghĩa lớp Triangle
 * Lớp Triangle có 2 thuộc tính:
 * - private $_sides (array)
 * - private $_perimeter (number)
 * Lớp Triangle có 3 phương thức:
 * - __construct()
 * - getArea()
 * - getPerimeter()
 */

class Triangle extends Shape
{
    private $_sides = array();
    private $_perimeter = NULL;

    function __construct($s0 = 0, $s1 = 0, $s2 = 0)
    {
        $this->_sides[] = $s0;
        $this->_sides[] = $s1;
        $this->_sides[] = $s2;

        // Tính toán và thiết lập chu vi hình tam giác
        $this->_perimeter = array_sum($this->_sides);
    }

    // Phương thức tính diện tích hình tam giác từ chu vi và các cạnh
    public function getArea()
    {
        return (
            SQRT(
                ($this->_perimeter / 2)
                * (($this->_perimeter / 2) - $this->_sides[0])
                * (($this->_perimeter / 2) - $this->_sides[1])
                * (($this->_perimeter / 2) - $this->_sides[2])
            )
        );
    }

    // Phương thức lấy chu vi hình tam giác
    public function getPerimeter()
    {
        return $this->_perimeter;
    }
}

/* Định nghĩa class Rectangle
* Các thuộc tính của class:
* - width(chiều rộng),
* - height(chiều cao).
* Các phương thức của lớp:
* - setSize()
* - getArea()
* - getPerimeter()
* - isSquare()
*/

class Rectangle
{
    // Khai báo các thuộc tính
    public $width = 0;
    public $height = 0;

    // Hàm khởi tạo
    function __construct($w = 0, $h = 0)
    {
        $this->width = $w;
        $this->height = $h;
    }

    // Phương thức này thiết lập các kích thước của hình chữ nhật
    function setSize($w = 0, $h = 0)
    {
        $this->width = $w;
        $this->height = $h;
    }

    // Phương thức này tính diện tích hình chữ nhật
    function getArea()
    {
        return ($this->width * $this->height);
    }

    // Phương thức này tính chu vi hình chữ nhật
    function getPerimeter()
    {
        return (($this->width + $this->height) * 2);
    }

    // Phương thức này kiểm tra xem hình chữ nhật này có phải là hình vuông
    function isSquare()
    {
        if ($this->width == $this->height) {
            return true; // Hình chữ nhật
        } else {
            return false; // Không phải hình chữ nhật
        }
    }
}

#------------ KẾT THÚC ĐỊNH NGHĨA CLASS ----------------------#
echo '<br><br> rectangle <br>';

$_GET['shape'] = 'rectangle';
$_GET['dimensions'] = 100;

$_GET['s'] = 'rectangle';
$_GET['d'] = [10, 20, 30];

if (isset($_GET['shape'], $_GET['dimensions'])
    && $_GET['shape'] == 'rectangle'
) {
    // Tạo ra một đối tượng từ với thông số từ query string
    $obj = ShapeFactory::Create($_GET['s'], $_GET['d']);

    echo "<h4>Tạo ra hình {$_GET['shape']}:</h4>";
    echo '<p>Diện tích hình: ' . $obj->getArea() . '</p>';
    echo '<p>Chu vi hình: ' . $obj->getPerimeter() . '</p>';
} else {
    echo '<p>Cần cung cấp hình dạng và kích thước!</p>';
}

echo '<br> triangle <br>';

$_GET['shape'] = 'triangle';
$_GET['dimensions'] = 200;

$_GET['s'] = 'triangle';
$_GET['d'] = [10, 20, 30];

if (isset($_GET['shape'], $_GET['dimensions'])
    && $_GET['shape'] == 'triangle'
) {
    // Tạo ra một đối tượng từ với thông số từ query string
    $obj = ShapeFactory::Create($_GET['s'], $_GET['d']);

    echo "<h4>Tạo ra hình {$_GET['shape']}:</h4>";
    echo '<p>Diện tích hình: ' . $obj->getArea() . '</p>';
    echo '<p>Chu vi hình: ' . $obj->getPerimeter() . '</p>';
} else {
    echo '<p>Cần cung cấp hình dạng và kích thước!</p>';
}


