<?php
$a[0]=12;
$a[7]=555;

echo gettype($a);
var_dump($a);
echo count($a);
echo "<hr>";
$b[]=123;
$b[]=12.3;
$b[]=true;
var_dump($b);
echo count($b);

echo "<hr>";
$brad[]=1;
$brad["age"]=51;
$brad["weight"]=81;
$brad["grand"]=true;
$brad[]=2;

var_dump($brad);
echo count($brad);


