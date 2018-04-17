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

    function __construct(Car $car)
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

// Truyền đối tượng này vào class mới thêm tùy chọn
$carWithSunRoof = new SunRoof($basicCar);

// Kiểm tra các tính năng trên xe đã có tùy chọn
echo $carWithSunRoof->description();
echo " giá " . $carWithSunRoof->cost();

// 1. Tạo một xe cơ bản
$basicCar = new Suv();

// 2. Thêm tùy chọn cửa sổ trời
$carWithSunRoof = new SunRoof($basicCar);

// 3. Thêm tùy chọn ghế bọc da
$carWithSunRoofAndLeatherSeats = new LeatherSeats($carWithSunRoof);

// 4. Thêm tùy chọn GPS
$carFullOption = new GPSNavigation($carWithSunRoofAndLeatherSeats);

// 5. Kiểm tra xe với tùy chọn đầy đủ
echo $carFullOption->description();
echo " giá " . $carFullOption->cost();
