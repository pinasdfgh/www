<?php

include "SQLapi.php";
$pdo = new pdo($dsn, $user, $passwd, $opt);
//$sql="select * from member";
$sql="insert into member (account,password,realname) values (?,?,?)";
$stmt=$pdo->prepare($sql);
$stmt->execute(['123','456','789']);