<?php
if(!is_null($_GET['filename']))header("Location: php26.php");
//if($_GET['filename']==null)header("Location: php26.php");
$filename=$_GET['filename'];
$cont=$_GET['cont'];

$fp=fopen($filename,'w+');
fwrite($fp,$cont);
fclose($fp);
header("Location: $filename");