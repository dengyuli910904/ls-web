var i=0;
var vue = new Vue({
    el:'#my-app',
    data:{
        userinfo:{
            user_id:1,
            user_name:'lily',
            user_avatar:''
        },
        uuid:$('#news_uuid').val(),
        is_newest: false,
        newslist:'',
        ishandle: false,
        newsdata:{
            content:'',
            uuid:$('#news_uuid').val(),
            user_id: 1,
            // parent_uuid:'',
            // level:'',
            // top_id:''
        },
        replaydata:{
            content:'',
            uuid:$('#news_uuid').val(),
            user_id:'',
            parent_uuid:'',
            level:'',
            top_id:''
        }
    },
    methods:{
        shownews:function(){
            var self = this;
            if(!self.is_newest){
                var uuid = $('#news_uuid').val();
                $.ajax({
                     headers: {
                        'Content-Type':'application/json',
                    },
                    xhrFields: {
                      withCredentials: true
                    },
                    type: "GET",
                    url: "api/comments/getmsg?uuid="+uuid+"&pageindex="+i,
                    // data: JSON.stringify({uuid: uuid}),
                    dataType: "json",
                    success: function(data){
                        if(data.code === 200){
                            if(i == 0){
                                data.data.forEach(function(val,index,arr){
                                    arr[index].class = arr[index].id;
                                });
                                self.newslist = data.data;
                            }else if(data.data.length>0){
                                data.data.forEach(function(val,index,arr){
                                    arr[index].class = arr[index].id;
                                    self.newslist.push(arr[index]);
                                });
                            }else{
                                self.is_newest = true;
                            }
                            i++;
                        }else{

                        }
                    } 
                });
            }
        },
        handle:function(is_like,id,i){
            var self = this;
            if(!self.ishandle){
                self.ishandle = true;
                var url = "api/comments/likes?uuid="+id;
                if(!is_like){
                    url = "api/comments/dislikes?uuid="+id;
                }
                $.ajax({
                     headers: {
                        'Content-Type':'application/json',
                    },
                    xhrFields: {
                      withCredentials: true
                    },
                    type: "POST",
                    url: url,
                    // data: JSON.stringify({uuid: uuid}),
                    dataType: "json",
                    success: function(data){
                        if(data.code === 200){
                            if(is_like){
                                self.newslist[i]['likes_count'] ++;
                            }else{
                                self.newslist[i]['dislike_count'] ++;
                            }
                        }else{

                        }
                    } 
                });
            }
        },
        doreplay:function(i){
            var self = this;
            // alert(self.replaydata.user_id);
            // return false;
            $('.'+self.newslist[i].id+' .faceDiv').hide();
            self.replaydata.content = $('.'+self.newslist[i].id+' .Input_Box .Input_text').html();
            
            $.ajax({
                     headers: {
                        'Content-Type':'application/json',
                    },
                    xhrFields: {
                      withCredentials: true
                    },
                    type: "POST",
                    url: "api/comments/replay",
                    data: JSON.stringify(self.replaydata),
                    dataType: "json",
                    success: function(data){
                        if(data.code === 200){
                            self.replaydata.content = "";
                            $('.'+self.newslist[i].id+' .Input_Box .Input_text').html('');
                            // console.log(self.newslist[i].replaylist);
                            // self.newslist[i].replaylist
                            self.newslist[i].replaylist.push(data.data);
                            // $('.Main2').myEmoji();
                            // console.log(self.newslist[i].replaylist);
                        }else{

                        }
                    } 
                });
        },
        replay:function(e,i){
            var self = this;
            //user_id,comments_id,top_id,level,
            self.replaydata.user_id = self.newslist[i].user_id;
            self.replaydata.parent_uuid = self.newslist[i].id;
            self.replaydata.level = parseInt(self.newslist[i].level)+1;
            self.replaydata.top_id = self.newslist[i].top_id;

            var a = $(e.currentTarget);
            if(a.attr('data-handle') === "0"){
                a.html('评论数&nbsp;<span class="cai">['+self.newslist[i].commnets_count+']</span>');
                a.attr('data-handle',1);
                a.parent().parent().parent('.msg-item').parent().find('.comment').addClass('none');
            }else{
                $('.'+self.newslist[i].id).myEmoji({emojiconfig : emojiconfig});
                self.getreplay(i,self.newslist[i].top_id);
                a.html('收起评论');
                a.attr('data-handle',0);
                a.parent().parent().parent('.msg-item').parent().find('.comment').removeClass('none');
                // rootdiv.append(tpl);
            }
        },
        getreplay:function(i,top_id){
            //getreplay
            var self = this;
            $.ajax({
                 headers: {
                    'Content-Type':'application/json',
                },
                xhrFields: {
                  withCredentials: true
                },
                type: "GET",
                url: "api/comments/getreplay"+'?uuid='+self.uuid+'&top_id='+top_id,
                // data: JSON.stringify({uuid: uuid}),
                dataType: "json",
                success: function(data){
                    if(data.code === 200){
                        self.newslist[i].replaylist = data.data;
                        // $('.Main2').myEmoji();
                    }else{

                    }
                } 
            });
        },
        docomments:function(){
            var self = this;
            $('.Main3 .faceDiv').hide();
            self.newsdata.content = $('.Main3 .Input_Box .Input_text').html();
            $.ajax({
                 headers: {
                    'Content-Type':'application/json',
                },
                xhrFields: {
                  withCredentials: true
                },
                type: "POST",
                url: "api/comments/add",
                data: JSON.stringify(self.newsdata),
                dataType: "json",
                success: function(data){
                    if(data.code === 200){
                        self.newsdata.content = "";
                        $('.Main3 .Input_Box .Input_text').html('');
                        self.newslist.push(data.data);
                        // $('.Main2').myEmoji({emojiconfig : emojiconfig});
                    }else{

                    }
                } 
            });
        },
        collect:function(){
            var self = this;
            console.log(JSON.stringify({'news_id':self.uuid,'users_id':self.userinfo.user_id}));
            $.ajax({
                 headers: {
                    'Content-Type':'application/json',
                },
                xhrFields: {
                  withCredentials: true
                },
                type: "POST",
                url: "api/collect/add",
                data: JSON.stringify({'news_id':self.uuid,'users_id':self.userinfo.user_id}),
                dataType: "json",
                success: function(data){
                    if(data.code === 200){

                    }else{

                    }
                } 
            });
        }
        // replay:function(e,user_id,comments_id,top_id,level){
        //     var self = this;
        //     self.replaydata.user_id = user_id;
        //     self.replaydata.parent_uuid = comments_id;
        //     self.replaydata.level = parseInt(level)+1;
        //     self.replaydata.top_id = top_id;

        //     var a = $(e.currentTarget);
        //     if(a.attr('data-handle') === "0"){
        //         a.find('span').html('回复');
        //         a.attr('data-handle',1);
        //         a.parent().parent().parent('.msg-item').find('#newplay').remove();
        //     }else{
        //         var rootdiv = a.parent().parent().parent('.msg-item');
        //         a.find('span').html('取消');
        //         a.attr('data-handle',0);
        //         var tpl = $('#tpl_replay').clone(true)
        //         .attr('id','newplay')
        //         // .attr('data-uid',a.attr('data-uid'))
        //         // .attr('data-pid',a.attr('data-pid'))
        //         // .attr('data-level',parseInt(a.attr('data-level'))+1)
        //         // .attr('data-tid',a.attr('data-tid'))
        //         .removeClass('none');
        //         rootdiv.append(tpl);
        //     }
        // }
    }
});
$(window).scroll(function () {  
   if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 10) {
    // console.log(scrollTop +","+windowHeight+","+scrollHeight);
      //异步加载数据的方法  
       vue.shownews(i);
   }  
});  
vue.shownews(i);

var emojiconfig = {
    tieba: {
        name: "emoji",
        path: "web/img/emoji/tieba/",
        maxNum: 50,
        file: ".jpg",
        placeholder: ":{alias}:",
        alias: {
            1: "hehe",
            2: "haha",
            3: "tushe",
            4: "a",
            5: "ku",
            6: "lu",
            7: "kaixin",
            8: "han",
            9: "lei",
            10: "heixian",
            11: "bishi",
            12: "bugaoxing",
            13: "zhenbang",
            14: "qian",
            15: "yiwen",
            16: "yinxian",
            17: "tu",
            18: "yi",
            19: "weiqu",
            20: "huaxin",
            21: "hu",
            22: "xiaonian",
            23: "neng",
            24: "taikaixin",
            25: "huaji",
            26: "mianqiang",
            27: "kuanghan",
            28: "guai",
            29: "shuijiao",
            30: "jinku",
            31: "shengqi",
            32: "jinya",
            33: "pen",
            34: "aixin",
            35: "xinsui",
            36: "meigui",
            37: "liwu",
            38: "caihong",
            39: "xxyl",
            40: "taiyang",
            41: "qianbi",
            42: "dnegpao",
            43: "chabei",
            44: "dangao",
            45: "yinyue",
            46: "haha2",
            47: "shenli",
            48: "damuzhi",
            49: "ruo",
            50: "OK"
        },
        title: {
            1: "呵呵",
            2: "哈哈",
            3: "吐舌",
            4: "啊",
            5: "酷",
            6: "怒",
            7: "开心",
            8: "汗",
            9: "泪",
            10: "黑线",
            11: "鄙视",
            12: "不高兴",
            13: "真棒",
            14: "钱",
            15: "疑问",
            16: "阴脸",
            17: "吐",
            18: "咦",
            19: "委屈",
            20: "花心",
            21: "呼~",
            22: "笑脸",
            23: "冷",
            24: "太开心",
            25: "滑稽",
            26: "勉强",
            27: "狂汗",
            28: "乖",
            29: "睡觉",
            30: "惊哭",
            31: "生气",
            32: "惊讶",
            33: "喷",
            34: "爱心",
            35: "心碎",
            36: "玫瑰",
            37: "礼物",
            38: "彩虹",
            39: "星星月亮",
            40: "太阳",
            41: "钱币",
            42: "灯泡",
            43: "茶杯",
            44: "蛋糕",
            45: "音乐",
            46: "haha",
            47: "胜利",
            48: "大拇指",
            49: "弱",
            50: "OK"
        }
      },
    // AcFun:{
    //     name : "AcFun表情",
    //     path : "web/img/emoji/AcFun/",
    //     maxNum : 54,
    //     file : ".png"
    // }
  };
$('.Main').myEmoji({emojiconfig : emojiconfig});   
// $('.Main2').myEmoji({emojiconfig : emojiconfig});   

$('.Main3').myEmoji();