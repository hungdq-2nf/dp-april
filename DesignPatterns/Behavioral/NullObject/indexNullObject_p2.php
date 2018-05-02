<?php

//Chúng ta cùng xem xét ví dụ về quản lý người dùng trong hệ thống sau đây, đầu tiên chúng ta có một UserInterface.

interface UserInterface
{
    public function setId($id);

    public function getId();

    public function setName($name);

    public function getName();

    public function setEmail($email);

    public function getEmail();
}

//Khi đó class User sẽ implement UserInterface và định nghĩa các phương thức được nêu ra trong UserInterface:

class User implements UserInterface
{
    private $id;
    private $name;
    private $email;

    public function __construct($name, $email)
    {
        $this->setName($name);
        $this->setEmail($email);
    }

    public function setId($id)
    {
        if ($this->id !== null) {
            echo 'ID của người dùng rỗng!';
        }
        if (!is_int($id)
            || $id < 1
        ) {
            echo '<br>ID của người dùng sai định dạng.<br>';
        }
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        if (strlen($name) < 10
            || strlen($name) > 30
        ) {
            echo '<br>Tên người dùng phải có độ dài lớn hơn 10 và nhỏ hơn 30.<br>';
        }
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<br>Sai định dạng email.<br>';
        }
        $this->email = $email;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }
}

//Tiếp theo chúng ta có class NullUser cũng implement UserInterface nhưng các phương thức của nó là không làm gì.

class NullUser implements UserInterface
{
    public function setId($id)
    {
    }

    public function getId()
    {
        return "ID của NullUser";
    }

    public function setName($name)
    {
    }

    public function getName()
    {
        return "Name của NullUser";
    }

    public function setEmail($email)
    {
    }

    public function getEmail()
    {
        return "Email của NullUser";
    }
}

//Như vậy chúng ta có thể trả về một NullUser khi tạo người dùng mà các thông số nhập vào là null.

//function createUser($row)
//{
//    if (!$row) {
//        return new NullUser;
//    }
//    $user = new User($row["name"], $row["email"]);
//    $user->setId($row["id"]);
//    return $user;
//}

//Nếu không dùng NullUser mỗi khi gọi các phương thức của User chúng ta cần kiểm tra xem có null hay không?

// Lấy người dùng có ID bằng 1 trong hệ thống
//$user = $userMapper->fetchById(1);
//
//if ($user !== null) {
//    echo $user->getName() . " " . $user->getEmail();
//}

//dùng NullUser chúng ta không cần phải kiểm tra mỗi khi có các thao tác với class User:
//$user = $userMapper->fetchById("ID phải là số, nhập chữ xem sao...");

//echo $user->getName() . " " . $user->getEmail();

$name = 'name 00000001';
$email = 'a1@gmail.com';
$id = 1;

echo '<br> - User';
$user = new User($name, $email);

$user->setId($id);
echo '<br> $user->getId()<br>';
echo $user->getId();

$user->setName($name);
echo '<br> $user->getName()<br>';
echo $user->getName();

$user->setEmail($email);
echo '<br> $user->getEmail()<br>';
echo $user->getEmail();


echo '<br><br> -NullUser';
$nullUser = new NullUser();

$nullUser->setId($id);
echo '<br> $nullUser->getId()<br>';
echo $nullUser->getId();

$nullUser->setName($name);
echo '<br> $nullUser->getName()<br>';
echo $nullUser->getName();

$nullUser->setEmail($email);
echo '<br> $nullUser->getEmail()<br>';
echo $nullUser->getEmail();

function createUser($row)
{
    if (!$row) {
        return new NullUser;
    }
    $user = new User($row["name"], $row["email"]);
    $user->setId($row["id"]);
    return $user;
}

echo '<br><br>- User ok';
$row = [
    'id' => 2,
    'name' => 'name 00000002',
    'email' => 'a2@gmail.com'
];
echo '<pre>';
print_r(createUser($row));
echo '</pre>';

echo '- NullUser';
$rowNull = [];
echo '<pre>';
print_r(createUser($rowNull));
echo '</pre>';
