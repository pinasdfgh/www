<?php
$upload=$_FILES['upload'];
var_dump($upload);
if($upload['error']==0){
    if(move_uploaded_file($upload["tmp_name"],"D:/test1/{$upload ['name']}")){
        echo 'upload ok';
    }else{
        echo 'copy fail';
    }
}else{
    echo "upload fail";
}
