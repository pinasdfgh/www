<?php
//@抑制錯誤訊息    or die('')當沒檔案時送出字串
$fp = @fopen('iii.txt','w+') or die("server Down");
fputs($fp,'Hello word');

fclose($fp);