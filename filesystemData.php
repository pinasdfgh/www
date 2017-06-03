
<?php
$dirname='./Download';

if(isset($_GET['path'])) {

    $dirname = $_GET['path'];
//    echo $_GET['path'];

    if(preg_match('/[.*]$/', $_GET['path']) == 1){
        $dirname=substr("$dirname", 0,strlen("$dirname")-3);
//        var_dump($dirname);
        $indx=strripos("$dirname", '/');
//        var_dump($indx);
        $dirname=substr("$dirname", 0,"$indx");
//        var_dump($dirname);
//        $dirname = './Download';
    }

    if (preg_match('/^.\/Download\/../', $dirname) < 1) {
        header("Location:filesystemData.php");
    }
}

        $i=0;
        echo "<ul class=\"list-group\">\n";
        $fp=@opendir($dirname);

        if(!$fp){
            $dirname='./Download';
            $fp=@opendir($dirname);
            var_dump($fp);
            echo '<script>alert("File No Found")</script>';
        }

        //          read file
        while($file=readdir($fp)){
            if(preg_match('/^\.(?!.)/',$file)>0){continue;}
            $size=filesize("{$dirname}/{$file}");
            $path="{$dirname}/{$file}";
            $id='path'.$i++;
            if(is_dir("{$dirname}/{$file}")){
                echo "<form id=\"$id\"  hidden>\n";
                echo "<input type=\"text\" name=\"path\" value=\"$path\">";
                echo "</form>";
                echo "<li class=\"list-group-item\" onclick=\"$id.submit();\">\n";
                echo "<span class=\"glyphicon glyphicon-folder-open\">\n";
                echo "{$file}"."</span>";
                echo "\n<span class=\"badge\" style=\"float:right;\">";
                echo filesize("{$dirname}/{$file}");
                echo "KB\n</span>";
                echo "</li>\n";
            }else{
                continue;
            }
        }
        $fp=opendir($dirname);
        while($file=readdir($fp)){
            $size=filesize("{$dirname}/{$file}");
            if(is_file("{$dirname}/{$file}")){
                $fpath="{$dirname}/{$file}";
                $id='fpath'.$i++;
                echo "<form id=\"$id\" hidden>\n";
                echo "<input type=\"text\" name=\"fpath\" value=\"$fpath\">";
                echo "</form>";
                echo "<li class=\"list-group-item file\">\n";
                echo "<span class=\"glyphicon glyphicon-file\">\n";
                echo "{$file}"."</span>";
                echo "\n<span class=\"badge\" style=\"float:right;\">";
                echo filesize("{$dirname}/{$file}");
                echo "KB\n</span>";
                echo "</li>";

            }else{
                continue;
            }

        }

        ?>
        <li class="list-group-item">文件結尾</li>
        <li class="list-group-item" style="background-color: orangered"></li>

        </ul>

        <!----------------------------------li樣板---------------------------------------------------------------------->
        <!--        <form id="myForm" action="filesystem.php"></form>-->
        <!--        <form id="t1" hidden action="filesystem.php">-->
        <!--            <input type="text" name="path" value="./Download">-->
        <!--        </form>-->
        <!--        <li onclick="t1.submit()" ('./Download');" class="list-group-item">-->
        <!--                <span class="glyphicon glyphicon-folder-open">-->
        <!--                Cras </span>-->
        <!--                <span class="badge" style="float:right;">'.12345").'KB</span>-->
        <!--        <li onclick="t1.submit()" ('./Download');" class="list-group-item">-->
        <!--        <span class="glyphicon glyphicon-folder-open">-->
        <!--                Cras </span>-->
        <!--        <span class="badge" style="float:right;">'.12345").'KB</span>-->

        <!----------------------------------li樣板--------------------------------------------------------------------->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filesystem</title>
    <link rel="stylesheet" href="./libs/css/bootstrap.css">
    <script src="libs/js/jquery.js"></script>
    <script src="libs/js/bootstrap.min.js"></script>
    <script src="./libs/ckeditor/ckeditor.js"></script>
    <script src="./libs/ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="./libs/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="./libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
    <style>
        li{
            height: 50px;
        }
        article{
            height: 100%;
        }
    </style>
</head>
