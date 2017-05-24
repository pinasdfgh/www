<?php
$account=$_REQUEST["account"];
$password=$_REQUEST["password"];
$date=$_REQUEST["date"];
$area=$_REQUEST["area"];
$gerder=$_REQUEST["gerder"];
$like=$_REQUEST["like"];
echo $account."<br>";
echo $password."<br>";
echo $date."<br>";
echo $area."<br>";
echo $gerder."<br>";
foreach ($like as $value){
    echo "{$value}<br>";
}