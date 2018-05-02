<?php
//https://allaravel.com/tutorials/adapter-pattern-cam-la-choi/

//adapter - bộ nạp      < Strutural

interface SmartLink
{
    function addItem($itemName);

    function addFund($itemAmount);
}

class BanknetTransfer
{
    public function addOneItem($name)
    {
        echo "1 item added: " . $name;
    }

    public function addItemAmount($amount)
    {
        echo "1 item added with amount: " . $amount;
    }

    // Một phương thức khác không tương đồng với SmartLink
    public function addItemAndAmount($name, $amout)
    {
        $this->addOneItem($name);
        $this->addItemAmount($amout);
    }
}

class BanknetToSmartLinkAdapter implements SmartLink
{
    // Thuộc tính này tham chiếu đến class BanknetTransfer
    private $payObj;

    // Thiết lập tham chiếu thông qua phương thức khởi tạo
    function __construct(BanknetTransfer $payObj)
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
        $this->payObj->addItemAmount($itemAmount);
    }
}

class Customer
{
    private $pay;

    function __construct(BanknetToSmartLinkAdapter $pay)
    {
        $this->pay = $pay;
    }

    function transfer($itemName, $itemAmount)
    {
        $this->pay->addItem($itemName);
        $this->pay->addFund($itemAmount);
    }
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

$BanknetTransfer = new BanknetTransfer();
$pay = new BanknetToSmartLinkAdapter($BanknetTransfer);
$customer = new Customer($pay);
$customer->transfer("Chuyển tiền thuê hosting", 2000000);
echo '<br> --- <br>';



$banknetTransfer = new BanknetTransfer();

echo '<br> $banknetTransfer->addOneItem(\'itemName 2\') <br>';
$banknetTransfer->addOneItem('itemName 2');

echo '<br> $banknetTransfer->addItemAmount(200) <br>';
$banknetTransfer->addItemAmount(200);

echo '<br> $banknetTransfer->addItemAndAmount(\'itemName 3\', 300) <br>';
$banknetTransfer->addItemAndAmount('itemName 3', 300);


echo '<br> $smatLinkTransfer <br>';
$smatLinkTransfer = new SmartLinkTransfer();

echo '<br> $smatLinkTransfer->addItem(\'itemName 4\') <br>';
$smatLinkTransfer->addItem('itemName 4');

echo '<br> $smatLinkTransfer->addFund(400) <br>';
$smatLinkTransfer->addFund(400);

echo '<br> $banknetToSmartLinkAdapter <br>';
$banknetToSmartLinkAdapter = new BanknetToSmartLinkAdapter($banknetTransfer);

echo '<br> $banknetToSmartLinkAdapter->addItem(\'itemName 5\') <br>';
$banknetToSmartLinkAdapter->addItem('itemName 5');

echo '<br> $banknetToSmartLinkAdapter->addFund(500) <br>';
$banknetToSmartLinkAdapter->addFund(500);

echo '<br> $customer <br>';
$customer = new Customer($banknetToSmartLinkAdapter);

echo '<br> $customer->transfer(\'itemName 1\', 100) <br>';
$customer->transfer('itemName 1', 100);

echo '<br>  <br>';


