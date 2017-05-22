<?php
$poker=array();
for($i=0;$i<52;$i++) $check[]=false;
for($i=0;$i<52;$i++){
    do{
        $temp=rand(0,51);
        $isRepeat=false;
        if(!$check[$temp]){
            $poker[$i]=$temp;
            $check[$temp]=true;
        }else{
            $isRepeat=true;
        }
    }while($isRepeat);

    echo $poker[$i] ."<br>";
}