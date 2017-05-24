<?php
$upload=$_FILES['upload'];
var_dump($upload);
if($upload['error']==0){
    if(copy($upload["tmp_name"],"./upload/{$upload ['name']}")){
        echo 'upload ok';
    }else{
        echo 'copy fail';
    }

}else{
    echo "upload fail";
}