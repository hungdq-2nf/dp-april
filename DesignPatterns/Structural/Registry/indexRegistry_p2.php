<?php
//https://allaravel.com/tutorials/register-pattern-tao-va-su-dung-danh-ba-doi-tuong/

//register - đăng ký      < Structural

class Registry2
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

// Tạo ra obj kết nối database và obj registry
//$db = new DatabaseConnection();
//$registry = new Registry();
//
//// Đưa obj $db vào danh bạ
//$registry->add("database", $db);
//
//// Dùng $registry
//$user = new User($registry);
//$admin = new Admin($registry);
//
//// Hoặc có thể lấy obj $db để thực hiện các công việc khác
//$databaseObj = $registry->get("database");
//$databaseObj->query("SELECT username FROM users" . " WHERE id=$userId");



echo '<br><br> Registry2 <br>';
$registry = new Registry2();
$obj = 'obj';
$registry->set('name', $obj);
echo $registry->get('name');


echo '<br><br>  <br>';



