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
            // var res = 'id="'+this.name+'"';
            // res=res.replace('\n',"");
            // var context='<div '+ res +
            //     ' class="tab-pane fade"><iframe class="imageIn" src="'+this.path+
            //     '"></iframe></div>';
            // //                console.log(context);
            // $('#pageContext').append(context);

            var $div=$('<div></div>')
                .attr('id',this.name)
                .addClass("tab-pane fade")

            var imgScr=this.path;

            var $img=$('<img>').attr('src',imgScr);

            $div.append($img);

            $('#pageContext').append($div);

            // var $canvas=$('<canvas></canvas>')

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