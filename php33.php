<?php
class Bike{
    //封裝
    private $speed=0;
    function upspeed(){
        $this->speed=($this->speed<1)?1:$this->speed*1.2;
    }
    function dnspeed(){
        $this->speed=($this->speed<1)?0:$this->speed*0.8;
    }
    function getSpeed(){
        return $this->speed;
    }
}
$myBike=new Bike();
$myBike->upspeed();
//echo $myBike->getSpeed();
$myBike->upspeed();
$myBike->upspeed();
$myBike->upspeed();
echo $myBike->getSpeed();