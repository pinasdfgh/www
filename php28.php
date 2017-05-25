<?php
$data = file('tex.txt');
foreach ($data as $value){
    $kkk=strlen($value);
    echo "{$kkk}==>{$value}<br>";
}
echo "<hr>";
$data=file_get_contents('tex.txt');

echo "$data";