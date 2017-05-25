<?php
$img=imagecreate(400,40);
$yellow=imagecolorallocate ( $img , 255 , 255 , 0 );
$red=imagecolorallocate ( $img , 255 , 0 , 0 );

imagefilledrectangle ( $img ,
0 , 0 , 400 , 40 , $yellow);
imagefilledrectangle ( $img ,
    0 , 0 , 200 , 40 , $red);
header("Content-Type:image/jpeg");
imagejpeg($img);
imagedestroy($img);

?>