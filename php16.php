<?php

include 'pinasdapi.php';

$get=createLeooty();

foreach ($get as $value){
    echo $value .'<br>';
}