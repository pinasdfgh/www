<?php
include "pinasdapi.php";

$myBike=new Bike();
$myBike->upspeed();
//echo $myBike->getSpeed();
$myBike->upspeed();
$myBike->upspeed();
$myBike->upspeed();
echo $myBike->getSpeed();
echo '<hr>';
$myScooter=new Scooter();
$myScooter->upspeed();
echo $myScooter->getSpeed();