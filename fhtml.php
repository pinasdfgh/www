<?php
$path=$_POST['path'];
$file=fopen($path,'r');
while (!feof($file)) {
    $buffer = fgets($file, 4096);
    if(preg_match('/\n$/',$buffer)){
        echo $buffer.'<br>';
    }else echo $buffer;
}
fclose($file);