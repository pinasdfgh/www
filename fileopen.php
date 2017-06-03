<?php
    $dirname='./Download';
    if(isset($_POST['path'])) {

        $dirname = $_POST['path'];

        //check path
//        if(preg_match('/[.*]$/', $_POST['path']) == 1){
//            $dirname=substr("$dirname", 0,strlen("$dirname")-3);
//            $indx=strripos("$dirname", '/');
//            $dirname=substr("$dirname", 0,"$indx");
//        }

//        if (preg_match('/^.\/Download\/../', $dirname) < 1) {
//            header("Location:filesystem.php");
//        }
    }

    class node{
        var $dirname='';    //----php to javascript relation table
        var $path='';       //php             JS
        var $file='';       //$path     ->    id        for location in html
        var $size='';       //$file     ->    text      for content in html
        var $type='';       //$size     ->    size      for location in html
        var $next=null;     //$type     ->    class     for event recognize dir or file

        function __construct($dirname){
            $this->dirname=$dirname;

        }
        function getpath($file){
            //path
            $this->path="{$this->dirname}/{$file}";
            //size
            if(filesize($this->path)>1000000){
                $sPos=filesize($this->path)/1000000;
                $this->size=$sPos.'MB';
            }
            else if(filesize($this->path)>1000){
                $sPos=filesize($this->path)/1000;
                $this->size=$sPos.'KB';
            }else{
                $this->size=filesize($this->path).'Byte';
            }
            //file name
            $this->file=$file;
            //type
            if(is_dir("{$this->dirname}/{$this->file}")){
                $this->type='dir';
            }else{
                $this->type='file';
            }
        }
        function getResult(){
            echo "$this->path.<br>";
        }
    }

    $fp=@opendir($dirname);
        if(!$fp){
            header("Location:404");
        }
//link list pass data json to html
    $head=new node(null);
    $cur=$head;
    $per=$head;
    $p=null;
    $first=true;
    while($file=readdir($fp)){
        if(preg_match('/^\./',$file)>0){continue;}
        $cur=new node($dirname);
        $cur->getpath($file);
        if(is_dir($cur->path) && $first){
            $p=$head->next;
            $per=$head;
            $first=false;
        }
        $per->next=$cur;
        $per=$cur;
//        $cur->getResult();
    }
    $cur->next=$p;

    echo json_encode($head);
