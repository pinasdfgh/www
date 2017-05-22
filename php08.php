<?php
$i=0;
for(test1();$i<10;test2()){
    echo $i++ .'<br>';
}
function test1(){
    echo "123456789 <br>";
}
function test2(){
    echo "----------<br>";
}
