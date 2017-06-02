<?php
include "SQLmember.php";
$pdo=new pdo($dsn,$user,$passwd,$opt);
if(!isset($_REQUEST['account']))
    header("Location:loginV2.php");

$account=$_REQUEST['account'];
$rname=$_REQUEST['realname'];
$passwd1=password_hash($_REQUEST['passwd'],PASSWORD_DEFAULT);
$sql="INSERT INTO member (account,passwd,rname) VALUES (?,?,?)";
$stmt=$pdo->prepare($sql);
$stmt->execute([$account,$passwd1,$rname]);
header("Location:loginV2.php");
