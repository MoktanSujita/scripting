<?php

class Fruit{

    //properties or //fields
    private $name;
    private $color;
    public $taste;

    //constructor


    //automatically called when instance is created
    //here the value of $color is optional
    public function __construct($name,$color = "none")
    {
        $this->name = $name; 
        $this->color = $color; 
    }

   //automatically called at the end the script 
    public function __destruct()
    {
        echo "The fruit is {$this->name}.";
        echo "The color of the fruit is {$this->color}.";
    }

}

//instances of class/object
$fruit01 = new Fruit("orange" , "orange");
$fruit02 = new Fruit("banana" , "");

//directly passing the value/assigning vlaue
$fruit02->taste = "sweet\n"; 
echo $fruit02->taste;
?>