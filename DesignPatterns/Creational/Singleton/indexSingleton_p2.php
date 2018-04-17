<?php
//https://allaravel.com/tutorials/singleton-pattern-tao-thuc-the-hieu-qua/

//singleton - đơn class     < Creational

/* The Config class.
 * The class contains two attributes: $_instance and $settings.
 * The class contains four methods:
 * - __construct()
 * - getInstance()
 * - set()
 * - get()
 */

class Config
{
    static private $_instance = NULL;
    private $_settings = array();

    // Private methods cannot be called
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    // Phương thức này trả về một thực thể của class
    static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new Config();
        }
        return self::$_instance;
    }

    // Phương thức này thiết lập cấu hình
    function set($index, $value)
    {
        $this->_settings[$index] = $value;
    }

    // Phương thức này lấy thiết lập cấu hình
    function get($index)
    {
        return $this->_settings[$index];
    }
}

// Tạo một đối tượng Config
$config = Config::getInstance();

// Thiết lập các giá trị trong thuộc tính cấu hình
$config->set('database_connected', 'true');

// In giá trị cấu hình
echo '<p>$config["database_connected"]: ' . $config->get('database_connected') . '</p>';

// Tạo một đối tượng thứ hai
$test = Config::getInstance();
echo '<p>$test["database_connected"]: ' . $test->get('database_connected') . '</p>';

// Xóa các đối tượng sau khi sử dụng
unset($config, $test);
