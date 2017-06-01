<?php
$img=imagecreatefromjpeg('./upload/test.jpg');
//var_dump($img);
$red=imagecolorallocate($img,255,0,0);
imagettftext ( $img , 45 ,
    -45 , 10 , 10 , $red ,
    './libs/front/YuNaFont.ttf' , "123456789" );
//    header('Content-Type: image/jpeg');
//    imagejpeg($img);

//4.realse memoy
imagedestroy($img);
$img=imagecreatefromjpeg('./upload/test.jpg');
    header('Content-Type: image/jpeg');
    imagejpeg($img);
imagedestroy($img);