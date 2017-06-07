<form  method="post" enctype="multipart/form-data">
    <input type="text" name='dirPath' value="./Download">
    <input type="file" name="files">
    <input type="submit" value="sumbit">
</form>
<?php
$dirPath=$_POST['dirPath'];
$upload=$_FILES['files'];
$dirPath='./Download';
var_dump($dirPath);
var_dump($upload);


if($upload['error']==0){
    if(move_uploaded_file($upload["tmp_name"] ,"{$dirPath}/{$upload ['name']}")){
        echo 'upload ok';

    }else{
        echo 'copy fail';
    }
}else{
    echo "upload fail";
}