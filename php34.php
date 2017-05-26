<?php

include "pinasdapi.php";
$n=twid::checkId('A123456789');
echo $n;
if(twid::checkid('A123456789')==1){
    $myid=new twid('A123456789');
    echo $myid->getGender()?"M":"F";
}else{
    echo 'XX';
}
