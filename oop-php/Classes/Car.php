<?php

class Car
{
    // ass you know setting it to private simply means only this class has access to these properties if we were to use protected  over private it simply means child classes that extend this class and public means everyone has access to it 

    //properties /Fields
    private $brand;
    private $color;
    private $vehicleType = "car";

    // a constructor method which runs when you basically create an object based of this  class 

    // so now this allows ass to assign data from outside this class to the properties inside the class 
    public function __construct($brand, $color = "none")
    {
        $this->brand = $brand;
        $this->color = $color;
    }

    // Getter and setters 
    public function getBrands()
    {
        return $this->brand;
    }
    public function setBrands($brand)
    {
        $this->brand = $brand;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function setColors($color)
    {
        $allowedColors = ['red', 'blue', 'green', 'gray']; //benefit of a setter allowing constrained setting of values 
        if (in_array($color, $allowedColors)) {
            $this->color = $color;
        }
    }


    // a method 
    public function getCarInfo()
    {
        return "Brand: " . $this->brand . ", Color: " . $this->color;
    }
}

// Instantiating
// $car01 = new Car('Volvo', "Green");
// $car02 = new Car('BMW');
// $car03 = new Car('Audi', 'Red');
// $car04 = new Car('Toyota', 'Blue');
// $car05 = new Car('Ford', 'Black');
// $car06 = new Car('Mercedes');

// echo $car01->getCarInfo() . "\n";