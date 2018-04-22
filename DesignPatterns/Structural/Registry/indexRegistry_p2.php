<?php
//https://allaravel.com/tutorials/register-pattern-tao-va-su-dung-danh-ba-doi-tuong/

//register - đăng ký      < Structural

class Registry
{
    protected $_objects = array();

    function set($name, &$object)
    {
        $this->_objects[$name] = &$object;
    }

    function &get($name)
    {
        return $this->_objects[$name];
    }
}

// Tạo ra đối tượng kết nối database và đối tượng registry
$db = new DatabaseConnection();
$registry = new Registry();

// Đưa đối tượng $db vào danh bạ
$registry->add("database", $db);

// Sử dụng $registry
$user = new User($registry);
$admin = new Admin($registry);

// Hoặc có thể lấy đối tượng $db để thực hiện các công việc khác
$databaseObj = $registry->get("database");
$databaseObj->query("SELECT username FROM users" . " WHERE id=$userId");



echo '<br><br> Registry <br>';
$registry = new Registry();
$registry->set('name', 'obj');
echo $registry->get('name');


echo '<br><br>  <br>';



