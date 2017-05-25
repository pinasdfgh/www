<?php
$img=imagecreatefromjpeg('test.jpg');


$blue=imagecolorallocate($img,0,0,255);

imagettftext ( $img , 14 ,
0 , 100 , 100 , $blue ,
'fireflysung.ttf' , 'Hello' );

header("Content-Type:$img");
imagejpeg($img);

imagedestroy($img);

