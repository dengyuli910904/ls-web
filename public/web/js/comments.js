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
            user_id: self.userinfo.user_id,
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
                            console.log(i);
                            if(i == 0){
                                self.newslist = data.data;
                            }else if(data.data.length>0){
                                data.data.forEach(function(val,index,arr){
                                    self.newslist.push(arr[index]);
                                });
                            }else{
                                self.is_newest = true;
                            }
                            console.log(self.newslist);
                            // for(var i=0;i<self.newslist.length;i++){
                            //     // self.newslist[i].replaylist = "";
                            // }
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
                            // console.log(self.newslist[i].replaylist);
                            // self.newslist[i].replaylist
                            self.newslist[i].replaylist.push(data.data);
                            console.log(self.newslist[i].replaylist);
                        }else{

                        }
                    } 
                });
        },
        replay:function(e,i){
            var self = this;
            //user_id,comments_id,top_id,level,
            self.replaydata.user_id = self.newslist[i].user_id;
            self.replaydata.parent_uuid = self.newslist[i].comments_id;
            self.replaydata.level = parseInt(self.newslist[i].level)+1;
            self.replaydata.top_id = self.newslist[i].top_id;

            var a = $(e.currentTarget);
            if(a.attr('data-handle') === "0"){
                a.html('评论数&nbsp;<span class="cai">['+self.newslist[i].commnets_count+']</span>');
                a.attr('data-handle',1);
                a.parent().parent().parent('.msg-item').parent().find('.comment').addClass('none');
            }else{
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
                    }else{

                    }
                } 
            });
        },
        docomments:function(){
            var self = this;
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
                        self.newslist.push(data.data);
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
        i++;
       vue.shownews(i);
   }  
});  
vue.shownews(i);
     // function replay(e){
     //    //data-uid='item.user_id' data-pid="item.comments_id" data-level = "item.level" data-tid="item.top_id"
     //    if($(e).attr('data-handle') === "0"){
     //        $(e).find('span').html('回复');
     //        $(e).attr('data-handle',1);
     //        $(e).parent().parent().parent('.msg-item').find('#newplay').remove();
     //    }else{
     //        var rootdiv = $(e).parent().parent().parent('.msg-item');
     //        $(e).find('span').html('取消');
     //        $(e).attr('data-handle',0);
     //        var tpl = $('#tpl_replay').clone(true)
     //        .attr('id','newplay')
     //        .attr('data-uid',$(e).attr('data-uid'))
     //        .attr('data-pid',$(e).attr('data-pid'))
     //        .attr('data-level',parseInt($(e).attr('data-level'))+1)
     //        .attr('data-tid',$(e).attr('data-tid'))
     //        .removeClass('none');
     //        rootdiv.append(tpl);
     //    }
     // }
     // window.onload = function(){
     //    getcomments();
     // }
     // getcomments();
     // function docomments(){
     //    var content = $('#content').val(),uuid = $('#news_uuid').val();
     //    $.ajax({ 
     //         headers: {
     //            'Content-Type':'application/json',
     //        },
     //        xhrFields: {
     //          withCredentials: true
     //        },
     //        type: "POST",
     //        url: "{{url('api/comments/add')}}",
     //        data: JSON.stringify({uuid: uuid,content:content}),
     //        dataType: "json",
     //        success: function(data){
     //            if(data.code === 200){
     //                getcomments();
     //            }else{

     //            }
     //        } 
     //    });
     // }
     // function getcomments(){
     //    var content = $('#content').val(),uuid = $('#news_uuid').val();
     //    $.ajax({
     //         headers: {
     //            'Content-Type':'application/json',
     //        },
     //        xhrFields: {
     //          withCredentials: true
     //        },
     //        type: "GET",
     //        url: "{{url('api/comments/getmsg?uuid=')}}"+uuid,
     //        // data: JSON.stringify({uuid: uuid}),
     //        dataType: "json",
     //        success: function(data){
     //            if(data.code === 200){
     //                // getcomments();
     //            }else{

     //            }
     //        } 
     //    });
     // }

// var str = '';
// //        if(page=="") page='1';
// var page = 1;
// var stop=true;//触发开关，防止多次调用事件
// $(window).scroll( function(event){
// //当内容滚动到底部时加载新的内容 100当距离最底部100个像素时开始加载.
//     if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 10) {
// //if(stop==true){
// //stop=false;
// //var canshu="page/"+page+";
//         var url = "/topics";
//         var parm = {'page': page};
//         page = page + 1;//当前要加载的页码
// //加载提示信息
//         $("#newslist").append("<li class='ajaxtips'><div style='font-size:2em'>Loding…..</div><>");
//         $.get(url, parm, function(data){
//             if( data.data.length == 0 ) {
//                 $('.topics-bottom-center').html('已全部加载完');
//                 return;
//             }
//             $.each(data.data, function(data, val) {
//                 //console.log(val);
//                 var str = '';
//                 str += '<div class="new-item col-md-6 row">';
//                 str += '<div class="pd-b-10"><img src="' + val.cover + '"></div>';
//                 str += '<h3 class=" text-center">' + val.title + val.id + '</h3>';
//                 str += '<h4 class=" text-center">' + val.created_at + '</h4>';
//                 str += '</div>';
//                 $(".newslist").append(str);//把新的内容加载到内容的后面
//             });
//             stop=true;
//         },'JSON')
//     }
// });
