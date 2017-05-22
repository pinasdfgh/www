<?php
$p=array(1=>0,0,0,0,0,0);
for($i=1;$i<100000;$i++){
    $temp=rand(1,9);
    $p[$temp>=7?$temp-3:$temp]++;
}
for($i=1;$i<count($p)+1;$i++){
    echo "piont {$i}={$p[$i]} <br>";
}