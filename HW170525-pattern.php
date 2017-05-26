<?php
date_default_timezone_set ( 'Asia/Taipei');
$dirname='.';
if(isset($_GET['path'])){
    $dirname=$_GET['path'];
    if(isset($_GET['filename'])){
        $delfile=$_GET['filename'];
        @unlink("{$dirname}/{$delfile}");
    }
}
?>
<form>
    <input type="text" name="path">
    <input type="submit" value="chdir">

</form>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="upload">
    <input type="submit" value="sumbit">
</form>

<table border="1" width="100%">
    <tr>
        <td>file</td>
        <td>type</td>
        <td>size</td>
        <td>mtime</td>
        <td>delete</td>
    </tr>
        <?php
        $fp=@opendir("$dirname") or die('Server Down');

        while($file=readdir($fp)){
            //echo "{$fp}";
            echo "<tr>";
            echo "<td>{$file}</td>";
            $type='';
            if(is_dir("{$dirname}/{$file}")){
                $type='dir';
            }else{
                $type='file';
            }
            echo "<td>"."{$type}"."</td>";
            echo "<td>".filesize("{$dirname}/{$file}")."</td>";
            echo "<td>".date('Y-m-d H:i:s' ,filemtime("{$dirname}/{$file}"))."</td>";
            echo "<td><a href='?&path={$dirname}&filename={$file}' onclick=\"return confirm('del?')\">delete</a></td>";
            echo "</tr>";

        }
        ?>
</table>

<?php
$upload=$_FILES['upload'];
if($upload['type']=="image/jpeg"){
    var_dump($upload);
}

if($upload['error']==0){
    if(@move_uploaded_file($upload["tmp_name"] ,"{$dirname}/{$upload ['name']}")){
        echo 'upload ok';

    }else{
        echo 'copy fail';
    }
}else{
    echo "upload fail";
}
if($upload['type']=="image/jpeg"){

    $img=imagecreatefromjpeg("{$dirname}/test.jpg");
    var_dump($img);
    $red=imagecolorallocate($img,255,0,0);
    imagettftext ( $img , 45 ,
        -45 , 10 , 10 , $red ,
        './libs/front/YuNaFont.ttf' , "123456789" );
//    header('Content-Type: image/jpeg');
    imagejpeg($img,"{$dirname}/test.jpg");

    //4.realse memoy
    imagedestroy($img);
}
