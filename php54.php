<?php
include "SQLmember.php";
$pdo=new pdo($dsn,$user,$passwd,$opt);
$sql="SELECT * FROM member";
$stmt=$pdo->prepare($sql);
$stmt->execute();

while($row=$stmt->fetchObject()){
    echo "<tr>";
    echo "$row";
    echo "</tr>";
}