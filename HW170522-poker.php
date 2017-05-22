<?php
$max=6;
$poker[]=array();
for($i=0;$i<$max;$i++) $poker[$i]=$i;

for($i=$max-1;$i>=0;$i--){
    $indx=rand(0,$i);
    $temp=$poker[$indx];
    $poker[$indx]=$poker[$i];
    $poker[$i]=$temp;
//    echo $indx.' :';
//    echo $temp.' :';
//    echo $i .' <br>';
}

for($i=0;$i<$max;$i++) echo $poker[$i] ."<br>";