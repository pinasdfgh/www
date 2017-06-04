<?php
$path=$_GET['path'];
$pixel=400;
$imgSrc=imagecreatefromjpeg($path);
$imgDst=imagecreatetruecolor($pixel,$pixel);
$imgSW = imagesx($imgSrc);
$imgSH = imagesy($imgSrc);
if ($imgSW>$imgSH){
    $imgDW = $pixel;
    $imgDH = $imgSH * $pixel / $imgSW;
    $dst_x=0;
    $dst_y=($pixel-$imgDH)/2;
}else{
    $imgDH = $pixel;
    $imgDW = $imgSW * $pixel / $imgSH;
    $dst_x=($pixel-$imgDW)/2;
    $dst_y=0;
}

imagecopyresized (
    $imgDst , $imgSrc,
    $dst_x , $dst_y,
    0, 0,
    $imgDW , $imgDH ,
    $imgSW , $imgSH );
// 3
header('Content-Type: image/jpeg');
imagejpeg($imgDst);
// 4
imagedestroy ( $imgSrc );
imagedestroy ( $imgDst );