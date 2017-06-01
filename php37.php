<?php
//$conn=@mysqli_connect(
//    '127.0.0.1',
//    'root',
//    'root','iii') or die("sever busy");
//1.建立mysqli物件
$db=@new mysqli('127.0.0.1','root','root','iii');

echo $db->error;

$sql="select * from member";
$result=$db->query($sql);
//echo $result;
while($row=$result->fetch_object()){
    echo "{$row->id}:{$row->account}:{$row->password} <br>";
}
