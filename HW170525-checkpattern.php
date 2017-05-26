<?php
//$checkCilen=$_POST['check'];
//1.set pattern
$imgSrc=imagecreatefromjpeg('./test.jpg');
$imgDst=imagecreatetruecolor(200,200);

$imgSrcW=imagesx($imgSrc);
$imgSrcH=imagesy($imgSrc);

if($imgSrcW>$imgSrcH){
    $imgDstW=200;
    $imgDstH=$imgSrcH*200/$imgSrcW;
    $dsty=(200-$imgDstH)/2;
    $dstx=0;
}else{
    $imgDstH=200;
    $imgDstW=$imgSrcW*200/$imgSrcH;
    $dstx=(200-$imgDstW)/2;
    $dsty=0;
}
//2.darw
$bg=imagecolorallocate($imgDst,255,255,255);
imagefill($imgDst,0,0,$bg);

imagecopyresized ( $imgDst , $imgSrc ,
$dstx, $dsty , 0, 0 ,
    $imgDstW, $imgDstH , $imgSrcW , $imgSrcH );
$setChar='0123456789abcdefghijklmnopqrxyzABCDEDFGHJKLPOIUY';
$chkChar=[];
//echo strlen($setChar);
for($i=0;$i<5;$i++){
    $chkChar[]=$setChar[rand(0,strlen($setChar)-1)];
//    echo $chkChar[$i];
}

$x=0;
$y=0;
foreach($chkChar as $value){
    $chkCharColor=imagecolorallocate($imgDst,255,150,0);

    imagettftext ( $imgDst , 45 ,
        rand(-30,30) , 10+$x , 100+$y , $chkCharColor ,
        './libs/front/YuNaFont.ttf' , "$value" );
    $x+=rand(15,40);
    $y+=rand(-10,10);
}
$check=implode("",$chkChar);

//var_dump($check);

//
//3.output
header('Content-Type: text/plain');
imagejpeg($imgDst);

//4.realse memoy
imagedestroy($imgSrc);
imagedestroy($imgDst);