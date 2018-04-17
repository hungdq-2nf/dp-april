<?php
//https://allaravel.com/tutorials/adapter-pattern-cam-la-choi/

//adapter - bộ nạp      < Strutural

class Customer
{
    private $pay;

    function __construct($pay)
    {
        $this->pay = $pay;
    }

    function transfer($itemName, $itemAmount)
    {
        $this->pay->addItem($itemName);
        $this->pay->addFund($itemAmount);
    }
}

class BanknetTransfer
{
    public function addOneItem($name)
    {
        echo "1 item added: " . $name;
    }

    public function addItemAmount($amount)
    {
        echo "1 item added with amount: " . $price;
    }

    // Một phương thức khác không tương đồng với SmartLink
    public function addItemAndAmount($name, $amout)
    {
        $this->addOneItem($name);
        $this->addItemAmount($amout);
    }
}

interface SmartLink
{
    function addItem($itemName);

    function addFund($itemAmount);
}

class SmartLinkTransfer implements SmartLink
{
    function addItem($itemName)
    {
        echo "1 item added: " . $itemName;
    }

    function addFund($itemAmount)
    {
        echo "1 item added with amount: " . $itemAmount;
    }
}

class BanknetToSmartLinkAdapter implements SmartLink
{
    // Thuộc tính này tham chiếu đến class BanknetTransfer
    private $payObj;

    // Thiết lập tham chiếu thông qua phương thức khởi tạo
    function __construct($payObj)
    {
        $this->payObj = $payObj;
    }

    // Thêm phương thức với tên là tên phương thức bên class cũ
    // và gọi đến phương thức tương ứng bên class mới
    function addItem($itemName)
    {
        $this->payObj->addOneItem($itemName);
    }

    function addFund($itemAmount)
    {

    }
}

$BanknetTransfer = new BanknetTransfer();
$pay = new BanknetToSmartLinkAdapter($BanknetTransfer);
$customer = new Customer($pay);
$customer->transfer("Chuyển tiền thuê hosting", 2000000);