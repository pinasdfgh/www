<!DOCTYPE html>
<!--suppress ALL -->
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
        .imageIn{
            height: 75vh;
            width: 75vw;
        }
        #page{
            position: relative;
            padding: 0px;
        }
        .nav li{
            position: static;
            padding: 0px;
        }
        .nav-tabs {
            border-bottom: 2px solid #ddd;
        }
        .remove{
            position: absolute;
            top:0px;
            margin-top: 0px;
            cursor: pointer;
            opacity:0.2 ;
        }
        .remove:hover{
            opacity:0.6 ;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <form class="navbar-form navbar-left" role="search" id="path">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="./Download" name="path" id="pathVal">
        </div>
        <button type="submit" class="btn btn-default" >search</button>
    </form>
</nav>

<div class="row">
    <aside class="col-lg-2">

        <?php
        $dirname='./Download';

//以檔案為單位掃->final傳到html的資料
        class node{
            var $dirname='';
            var $path='';
            var $file='';
            var $size='';
            var $next=null;

            function __construct($dirname){
                $this->dirname=$dirname;

            }
            function getpath($file){
                $this->path="{$this->dirname}/{$file}";
                $this->size=filesize($this->path);
                $this->file=$file;
            }
            function getResult(){
                echo "$this->path.<br>";
            }
        }
        //以文件為單位掃描->主要做遞迴
        class data{
            protected $dirname;
            protected $fp;
            protected $file;
            protected $info;
            var $head;
            var $cur;
            var $per;

            function __construct($dirname){
                $this->dirname=$dirname;
                $this->fp=@opendir($dirname);
                if(!$this->fp){
                    header("Location:404");
                }
                $this->head=new node(null);
            }
            function getinfo(){

                $this->cur=$this->head;
                $this->per=$this->head;



                while($this->file=readdir($this->fp)){
//            echo var_dump($this->file)."<br>";
                    if(preg_match('/^\./',$this->file)>0){continue;}
                    $this->cur=new node($this->dirname);
                    $this->cur->getpath($this->file);
                    $this->per->next=$this->cur;
                    $this->per=$this->cur;
                    echo $this->cur->file .'<br>';

                    $this->cur->getResult().'<hr>';
                    if(is_dir($this->cur->path)){
//                        echo 'OK<br>';
                        $this->info=new data($this->cur->path);
                        $this->cur->next=$this->info->gethead();
                        $this->per=$this->info->getinfo();
                        $this->info=null;

                    }
                }

                return $this->per;
            }
            function gethead(){
//                var_dump($this->head);
                return $this->head;

            }
        }

        $info=new data($dirname);
        $info->getinfo();
        $head=$info->gethead();
        echo '<hr>';
//        var_dump($head);
        $cur=$head;
        $per=$head;
        while($cur!=null){
            echo '<hr>';
            echo "$cur->file";
            $cur=$per->next;
            $per=$cur;

        }



//        $fp=@opendir($dirname);
//            if(!$fp){
//                header("Location:404");
//            }
//
//        $head=new node(null);
//        $cur=$head;
//        $per=$head;
//        while($file=readdir($fp)){
////            echo var_dump($file)."<br>";
//            $cur=new node($dirname);
//            $cur->getpath($file);
//            $per->next=$cur;
//            $per=$cur;
//            $cur->getResult();
//        }











        ?>

    </aside>
    <article class="col-lg-10 container" >


        <ul class="nav nav-tabs" id="page">
            <li ><a data-toggle="tab" href="#home">Home</a></li>
            <li id="12"><a id="45" data-toggle="tab" href="#menu1">Menu 1</a></li>
            <li><a data-toggle="tab" href="#menu2">Menu 2
                </a></span></li>

        </ul>

        <div class="tab-content" id="pageContext">
            <div id="home" class="tab-pane fade in active">

                        <div id="home" class="tab-content" style="padding: 0px;margin: 0px">
                            <div class="grid-container">
                                <div class="grid-width-100" style="height: 100%">
                                    <div id="editor">

                                        <p>I'm an instance of CKEditor.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
            <div id="menu1" class="tab-pane fade">
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            <iframe src="test.jpg"></iframe>
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div id="menu3" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>

    </article>

</div>
<!--<div class="well" style="position:fixed; bottom: 0px;width:100% ;margin:0px">upload</div>-->
<!--<IFRAME src='test.jpg' width='100%' height='100%'></IFRAME>-->

<script>

    $("#path").submit(function(){
        var path=$("#pathVal").val();
        if(path.match(/^\.\/Download/i)===null){
            path="./Download/"+path;
            $("#pathVal").val(path);
        }
    });


    var Page=function(param){
        this.path='';
        this.name='';
        this.pageId='';
        this.pageA='';
        this.pageRm='';
        this.next=null;
    };

    Page.prototype={
        getid: function(){
            this.path=$(event.target).attr('id');
            this.name = $(event.target).text();
            this.name=this.name.slice(0,this.name.search("[/\./]"));
            this.pageId=this.name+'P';
            this.pageRm=this.name+'Rm';
            event.cancelBubble=true;
        },
        appear:function(){
          var idIn='#'+this.pageId+'A';
          idIn=idIn.replace('\n',"");
          $(idIn).trigger('click');
          event.cancelBubble=true;
        },
        addmeun: function(){
            var re=/.(jpg|gif)$/i;
            if(re.test(this.path)){
                var res = 'href="#'+this.name+'"';
                res=res.replace('\n',"");
                var resid = 'id="'+this.pageId+'"';
                resid=resid.replace('\n',"");
                var resA = 'id="'+this.pageId+'A"';
                resA=resA.replace('\n',"");
//               note:不管用什麼方式讓字串相加只要由' or "都會產生\n
                var temp='<a '+resA+' data-toggle="tab" '+res+'>'+this.name+'</a>';

//                console.log(temp);
                var creatli='<li '+resid+'>'+temp+'</li>';

                $('#page').append(creatli);

                var idIn='#'+this.pageId;
                idIn=idIn.replace('\n',"");
                var Rmid = 'id="'+this.pageRm+'"';
                Rmid=Rmid.replace('\n',"");
                var $span=$('<span></span>')
                    .addClass('class')
                    .addClass('remove glyphicon-remove-sign')
                    .addClass('glyphicon')
                    .attr('id',this.pageRm);

                $(idIn).append($span);

            }else{}
            event.cancelBubble=true;
        },
        addcontent: function(){
            var re=/.(jpg|gif)$/i;
            if(re.test(this.path)){
                var res = 'id="'+this.name+'"';
                res=res.replace('\n',"");
                var context='<div '+ res +
                    ' class="tab-pane fade"><iframe class="imageIn" src="'+this.path+
                    '"></iframe></div>';
//                console.log(context);
                $('#pageContext').append(context);

            }else{}
            event.cancelBubble=true;
        },
        remove:function(){
            var idIn='#'+this.pageId;
            idIn=idIn.replace('\n',"");
            var idOut='#'+this.name;
            idOut=idOut.replace('\n',"");
            $(idIn).remove();
            $(idOut).remove();
        }
    };

    //資料結構單向串列
    var head=new Page();
    var per=head;
    var cur=null;
    $('.file').click(function(){

        var reapt=false;
        p=new Page({
            path:'',
            name:'',
            pageId:'',
            next:null
        });
        cur=p;
        cur.getid();
//        console.log($(event.target).attr('id'));
//        console.log(cur.name);
//        console.log(cur.pageId);
        per=head;

        //判斷有無重複
        while(per.next!=null){
//          console.log(cur.path==per.path);
            if(cur.path==per.path){
                reapt=true;
                break;
            }else {
                reapt=false;
                per=per.next;
            }
        }
        //在最後一次沒有檢查,再檢查一次
        if(cur.path==per.path){
            reapt=true;
        }else {
            reapt=false;
        }

        if(reapt){
            per.appear();
        }else{
            per.next=cur;
            cur.addmeun();
            cur.addcontent();
            cur.appear();
        }
        delete p;
        event.cancelBubble=true;
    });

    //關掉視窗 動態添加時沒法用事件觸法只能用on方法

    $('body').on('click','.remove',function(){
        var rmItem=$(event.target).attr('id');
//        console.log(rmItem);
        per=head;
        cur=head.next;

        while(cur.pageRm!=rmItem){
            per=cur;
            cur=cur.next;
        }

        per.next=cur.next;
        cur.remove();
        var p=cur;
        delete p;
        per.appear();

    });




    //資料結構陣列

//    var arrPage=new Array();
//    var pageIdx=0;
//
////    $(".lifile").click(function(){
////        console.log('ok');
////        var temp=event.target+" span";
////        $(event.target).css("background-color", "red");
////    });
//
//    $('.file').click(function(){
//        arrPage[pageIdx]=new Page({
//            path:'',
//            name:'',
//            pageId:''
//        });
//        arrPage[pageIdx].getid();
//        console.log($(event.target).attr('id'));
//        console.log(arrPage[pageIdx].name);
//        console.log(arrPage[pageIdx].pageId);
//
//        arrPage[pageIdx].addmeun();
//        arrPage[pageIdx].addcontent();
//        arrPage[pageIdx].appear();
//
//        pageIdx++;
//
//
//    });



    initSample();


</script>

</body>

</html>
