<?php
include 'pinasdapi.php';
session_start();
if(!isset($_SESSION['cart'])){header('Location:php35.php');}

$cartObj=$_SESSION['cart'];
$var1=$_SESSION['var1'];

echo '<hr>';

$list = $cartObj->getList();
foreach($list as $pid => $qty){
    echo "{$pid} : {$qty}<br>";
}
?>
<hr>
<a href="logout.php">Logout</a>