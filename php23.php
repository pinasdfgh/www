<?php
$upload=$_FILES['upload'];
var_dump($upload);
echo "<br><hr>";

foreach ($upload['error'] as $index=>$error){
    if($error==0){
        if(move_uploaded_file($upload["tmp_name"][$index],"./upload/{$upload['name'][$index]}")){
            echo $upload['name'][$index].' upload ok<br>';
        }else{
            echo $upload['name'][$index].'copy fail';
        }
    }
}