<?php
//https://allaravel.com/tutorials/decorator-design-pattern-trong-php/

//decorator - nhà trang trí     < Creational

interface Car
{
    function cost();

    function description();
}

class Suv implements Car
{
    function cost()
    {
        return 30000;
    }

    function description()
    {
        return "Xe SUV";
    }
}

abstract class CarFeature implements Car
{
    protected $car;

    function __construct($car)
    {
        $this->car = $car;
    }

    abstract function cost();

    abstract function description();
}

class SunRoof extends CarFeature
{
    function cost()
    {
        return $this->car->cost() + 1500;
    }

    function description()
    {
        return $this->car->description() . ",  cửa sổ trời";
    }
}

class LeatherSeats extends CarFeature
{
    function cost()
    {
        return $this->car->cost() + 1000;
    }

    function description()
    {
        return $this->car->description() . ",  ghế bọc da";
    }
}

class GPSNavigation extends CarFeature
{
    function cost()
    {
        return $this->car->cost() + 800;
    }

    function description()
    {
        return $this->car->description() . ",  định vị toàn cầu GPS";
    }
}

// Tạo ra một xe cơ bản chưa có tùy chọn
$basicCar = new Suv();

// Truyền obj này vào class mới thêm tùy chọn
$carWithSunRoof = new SunRoof($basicCar);

// Kiểm tra các tính năng trên xe đã có tùy chọn
echo $carWithSunRoof->description() . '<br>';
echo " giá " . $carWithSunRoof->cost() . '<br>';

// 1. Tạo một xe cơ bản
$basicCar = new Suv();

// 2. Thêm tùy chọn cửa sổ trời
$carWithSunRoof = new SunRoof($basicCar);

// 3. Thêm tùy chọn ghế bọc da
$carWithSunRoofAndLeatherSeats = new LeatherSeats($carWithSunRoof);

// 4. Thêm tùy chọn GPS
$carFullOption = new GPSNavigation($carWithSunRoofAndLeatherSeats);

// 5. Kiểm tra xe với tùy chọn đầy đủ
echo $carFullOption->description() . '<br>';
echo " giá " . $carFullOption->cost() . '<br>';

echo '<br> Suv <br>';
$suv = new Suv();
echo $suv->cost() . '<br>';
echo $suv->description() . '<br>';


echo '<br> SunRoof';
$sunRoof = new SunRoof($suv);

echo '<pre>';
print_r($sunRoof->cost());
echo '</pre>';

echo '<pre>';
print_r($sunRoof->description());
echo '</pre>';


echo 'LeatherSeats <br>';
$leatherSeats = new LeatherSeats($suv);

echo '<pre>';
print_r($leatherSeats->cost());
echo '</pre>';

echo '<pre>';
print_r($leatherSeats->description());
echo '</pre>';






