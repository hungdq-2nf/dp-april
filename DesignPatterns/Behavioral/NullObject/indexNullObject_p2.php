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
            throw new BadMethodCallException("ID của người dùng rỗng!");
        }
        if (!is_int($id) || $id < 1) {
            throw new InvalidArgumentException("ID của người dùng sai định dạng.");
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
        if (strlen($name) < 10 || strlen($name) > 30) {
            throw new InvalidArgumentException("Tên người dùng phải có độ dài lớn hơn 10 và nhỏ hơn 30.");
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
            throw new InvalidArgumentException("Sai định dạng email.");
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

function createUser($row)
{
    if (!$row) {
        return new NullUser;
    }
    $user = new User($row["name"], $row["email"]);
    $user->setId($row["id"]);
    return $user;
}

//Nếu không sử dụng NullUser mỗi khi gọi các phương thức của User chúng ta cần kiểm tra xem có null hay không?

// Lấy người dùng có ID bằng 1 trong hệ thống
$user = $userMapper->fetchById(1);

if ($user !== null) {
    echo $user->getName() . " " . $user->getEmail();
}

//Sử dụng NullUser chúng ta không cần phải kiểm tra mỗi khi có các thao tác với class User:
$user = $userMapper->fetchById("ID phải là số, nhập chữ xem sao...");

echo $user->getName() . " " . $user->getEmail();