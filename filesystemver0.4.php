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
<!--    <script src="./libs/ckeditor/ckeditor.js"></script>-->
<!--    <script src="./libs/ckeditor/samples/js/sample.js"></script>-->
<!--    <link rel="stylesheet" href="./libs/ckeditor/samples/css/samples.css">-->
<!--    <link rel="stylesheet" href="./libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">-->
    <style>
        body{
            font-family: Arial,Times New Roman,serif;
            font-size: medium;
        }
        ul{
            padding-left:20px;
        }

        li{
            height: 50px;

        }
        article{
            height: 100%;
        }
        /*hef image*/
        .imageIn{
            height: 100vh;
            width: 100vw;
        }

        .list-group-item{
            position: relative;
            padding-left: 10px;
        }

        /*remove button */
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
        li:hover{
            border: 3px solid gainsboro;
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
        <ul class="list-group" id="here">
            <li class="list-group-item">本機</li>

        </ul>
    </aside>

    <article class="col-lg-10 container" >


        <ul class="nav nav-tabs" id="page">

        </ul>

        <div class="tab-content" id="pageContext">

    </article>


<!--<div class="well" style="position:fixed; bottom: 0px;width:100% ;margin:0px">upload</div>-->
<!--<IFRAME src='test.jpg' width='100%' height='100%'></IFRAME>-->
<script src="filesystem.js"></script>
<script>
    //----php to javascript relation table
    //php             JS
    //$path     ->    id        for location in html
    //$file     ->    text      for content in html
    //$size     ->    size      for location in html
    //$type     ->    class     for event recognize dir or file

    var inHead=null;
    var inPer=null;
    var inCur=null;
    $(function(){
        //first login
        var posData='#here';
        var posPath="./Download";
        getlist(posData,posPath);

        //dir open
        $('body'). on('click','.dir',function(){
            var dirPath=$(event.target).attr('id');
            var dirfile=$(event.target).text();
            var classStat=$(event.target).attr('class');
            //using pattern to recognize open or close
            var classAction=(/glyphicon-triangle-right/i).test(classStat)

            if(classAction){
                //add
                var $ul=$('<ul></ul>').addClass(dirfile);
                getlist($ul,dirPath);
                var $li=$('<li></li>').append($ul);
                $(event.target).after($ul);
                //li transform pattern
                $(event.target).removeClass('glyphicon-triangle-right');
                $(event.target).addClass('glyphicon-triangle-bottom');
            }else{
                //remove
                var posClass='.'+dirfile;
//                console.log(posClass);
                $(posClass).remove();
                $(event.target).removeClass('glyphicon-triangle-bottom');
                $(event.target).addClass('glyphicon-triangle-right');

            }
            event.cancelBubble=true;
        });


        //get file and dir list using post
        function getlist(string,dirPath) {
            $.ajax({url:"fileopen.php",type:'post',
                data:{path:dirPath},success:function (data){
                    inHead=JSON.parse(data);
                    inCur=inHead.next;
                    inPer=inCur;
//                    var posData='#'+ dirPath;
//                    console.log(posData);
                    while(inCur!=null){
                        var $li=$('<li></li>')
                            .attr('id',inCur.path)
                            .addClass(inCur.file.replace('.','')+'P')
                            .addClass("list-group-item")
                            .addClass(inCur.type)
                            .text(inCur.file)

                        if(inCur.type=='dir'){
                            $li.addClass('glyphicon').addClass('glyphicon-triangle-right');
                        }else if((/.(jpg|gif)$/i).test(inCur.file)){
                            $li.addClass('glyphicon').addClass('glyphicon-picture');
                        }else{
                            $li.addClass('glyphicon').addClass('glyphicon-file');
                        }

                        $(string).append($li);
                        inCur=inPer.next;
                        inPer=inCur;
                    }
                }})
        };

        //data sturct link list
        var head=new Page();
        var per=head;
        var cur=null;
        $('body').on('click','.file',function(){

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

            //check have repeat
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
            //lost one after while
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

        //using append elemet can't use envent ,only on

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

//

//     cancel right mouse cilck list (key point event contextmenu)add self identity list
        var targetId;
        var targetClass;
        $('#here').contextmenu(function(event) {
            event.preventDefault();
            if(event.which==3) {
                $('#option').remove();
                console.log(event.clientX);
                console.log(event.clientY);
                targetId=$(event.target).attr('id');
                targetClass=$(event.target).text();
                console.log(targetId);
                if(targetId!=null){
                    appendOpt();
                }
            }
            event.cancelBubble=true;
        });

        $('body').mouseup(function(event) {
            $('#option').css('visibility','hidden');

        });

//     self identity list create
        function appendOpt(){
            var $ul=$('<ul></ul>').addClass('list-group');
            var dataOpt=['Download','Upload','Delete'];
            dataOpt.forEach(function(cur){
                var $li=$('<li></li>')
                    .attr('id',cur)
                    .text(cur)
                    .addClass('list-group-item list-group-item-info');
                $ul.append($li);
            });
            var $div=$("<div></div>")
                .attr('id','option')
                .addClass('panel panel-warning')
                .html('<span class="glyphicon glyphicon-object-align-left">option</span>')
                .append($ul)
                .css({'position':'fixed','top':event.clientY+'px','left':event.clientX+'px'})
                .css('z-index','9999');
            $("body").prepend($div);
        };


        $('body').on('click','#Download',function(){
            var path=location.protocol+'//'+location.hostname+targetId.replace('.','');
            window.open(targetId);

        });
        $('body').on('click','#Upload',function(){
            console.log('ok');
            $.ajax()
        });
        $('body').on('click','#Delete',function(){
            var r = confirm("del file?");
            if(r){
                var targetIdP='.'+targetClass.replace('.','')+"P";
                console.log(targetIdP);
//            targetIdP.replace('\n','')
                $(targetIdP).remove();

                $.ajax({url:"fileopen.php",type:'post',
                    data:{delpath:targetId},success:function(data){
                        alert(data);
                    }});
            }
        });

    });

</script>

</body>

</html>
