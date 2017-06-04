/**
 * Created by pinas on 2017/6/3.
 */
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
        // var imgTest=/.(jpg|gif)$/i;
        // var officeTest=/.(docx|docm|dotm|dotx|xlsx|xlsb|xls|xlsm|pptx|ppsx|ppt|pps|pptm|potm|ppam|potx|ppsm)$/i;
        // if(imgTest.test(this.path)||officeTest.test(this.path)){
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


        event.cancelBubble=true;
    },
    addcontent: function(){
        var imgTest=/.(jpg|gif)$/i;
        var officeTest=/.(docx|docm|dotm|dotx|xlsx|xlsb|xls|xlsm|pptx|ppsx|ppt|pps|pptm|potm|ppam|potx|ppsm)$/i;
        if(imgTest.test(this.path)){
            var imgSrc='fimage.php?path='+this.path;

            var $div=$('<div></div>').attr('id',this.name).addClass('tab-pane fade');
            var $iframe=$('<iframe></iframe>').addClass('imageIn').attr('src',imgSrc);
            $div.append($iframe);
            $('#pageContext').append($div);

//             var $div=$('<div></div>')
//                 .attr('id',this.name)
//                 .addClass("tab-pane fade")
//                 .css('backgroundColor','#000000')
//                 .css('height','1000px')
//                 .css('width','1000px')
//                 .css({'display': 'table-cell','vertical-align':'middle','text-align':'center'});
// //                  圖片置中
//             var path=this.path;
//             var imgSrc='fimage.php?path='+this.path;
//
//             // var img=$('<a></a>').attr('href',imgScr);
//             var $img=$('<img/>')
//                 .attr('src',imgSrc);
//                 // .css('vertical-align','middle');
//
//             $div.append($img);
//
//             $('#pageContext').append($div);


        }else if(officeTest.test(this.path)){
            //開啟office 檔案用MS提供的轉換網站
            // console.log(location.protocol);
            // console.log(location.hostname);
            var fileSrc=location.protocol+'//'+location.hostname+this.path.replace('.','');
            var officeSrc='https://view.officeapps.live.com/op/view.aspx?src='+fileSrc;
            var $div=$('<div></div>').attr('id',this.name).addClass('tab-pane fade');
            // console.log(fileSrc);
            var $iframe=$('<iframe></iframe>').addClass('imageIn').attr('src',officeSrc);
            $div.append($iframe);
            $('#pageContext').append($div);
        }else {
            var $div = $('<div></div>').attr('id', this.name).addClass('tab-pane fade');

            var dirPath = this.path;
            $.ajax({
                url: "fhtml.php", type: 'post',
                data: {path: dirPath}, success: function (data) {
                    var content = data;
                    $div.html(content);
                }
            });

            $('#pageContext').append($div);

            // var $div=$('<div></div>').addClass("tab-pane fade").attr('id',this.name);
            // var $divEdit1=$('<div></div>').addClass("tab-content");
            // var $divEdit2=$('<div></div>').addClass("grid-container");
            // var $divEdit3=$('<div></div>').addClass("grid-width-100");
            // var $Edit=$('<div></div>').attr('id','editor').html("123344");
            // $divEdit3.append($Edit);
            // $divEdit2.append($divEdit3);
            // $divEdit1.append($divEdit2);
            // $div.append($divEdit1);
            // $('#pageContext').append($div);
            // initSample();


        }
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