<?php
if(!isset($_GET['a'])) {
    echo 'F1';
    die();
}
include "SQLmember.php";
$pdo=new pdo($dsn,$user,$passwd,$opt);
$account=$_GET['a'];
$sql="SELECT account FROM member WHERE account=?";
$stmt=$pdo->prepare($sql);
$stmt->execute([$account]);
if($stmt->rowCount()>0){
    echo 'F2';
}else{
    echo 'ok';
}