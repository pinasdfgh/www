<?php
//@抑制錯誤訊息    or die('')當沒檔案時送出字串
$fp = @fopen('tex.txt','r') or die("server Down");
if($fp){
    echo 'OK';
}else{
    echo 'XX';
}
echo '<hr>';
while($line=fgets($fp)){
    //windos 換行/r/n
    $len=strlen($line);
    echo "{$len}:{$line}".'<br>';
}

fclose($fp);