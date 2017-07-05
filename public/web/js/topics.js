var str = '';
//        if(page=="") page='1';
var page = 1;
var stop=true;//触发开关，防止多次调用事件
$(window).scroll( function(event){
//当内容滚动到底部时加载新的内容 100当距离最底部100个像素时开始加载.
    if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 10) {
//if(stop==true){
//stop=false;
//var canshu="page/"+page+";
        var url = "/topics";
        var parm = {'page': page};
        page = page + 1;//当前要加载的页码
//加载提示信息
        $("#newslist").append("<li class='ajaxtips'><div style='font-size:2em'>Loding…..</div><>");
        $.get(url, parm, function(data){
            if( data.data.length == 0 ) {
                $('.topics-bottom-center').html('已全部加载完');
                return;
            }
            $.each(data.data, function(data, val) {
                //console.log(val);
                var str = '';
                str += '<div class="new-item col-md-6 row">';
                str += '<div class="pd-b-10"><img src="' + val.cover + '"></div>';
                str += '<h3 class=" text-center">' + val.title + val.id + '</h3>';
                str += '<h4 class=" text-center">' + val.created_at + '</h4>';
                str += '</div>';
                $(".newslist").append(str);//把新的内容加载到内容的后面
            });
            stop=true;
        },'JSON')
    }
});
