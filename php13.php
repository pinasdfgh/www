<?php
$a=array(1,2,3);
$b[]=$a;  //$b[0]=>array(1,2,3)
$b[]=array(2,4);
foreach($b as $value){
    var_dump($value);
    echo "$value <br>";
}
var_dump($b);