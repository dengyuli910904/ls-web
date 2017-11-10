<!--头部-->
@section('menu')
    <!--导航-->
    <div class="menu">
        <div class="container clearfix">
            <div class="logo">
                <img src="{{ asset('web/images/index/logo.png')}}" width="96" height="53" alt="">
            </div>
            <ul class="menu-list">
                <li>
                    <a href="#">首页</a>
                </li>
                <li>
                    <a href="http://www.hainansports.com/topics/4">亲水运动季</a>
                </li>
                <li>
                    <a href="#">海南公开赛</a>
                    <ul>
                        <li>
                            <a href="http://www.hainansports.com/europe">推广赛</a>
                        </li>
                        <li>
                            <a href="http://www.hainansports.com/golf">青少赛</a>
                        </li>
                        <li>
                            <a href="#">职业赛</a>
                        </li>
                        <li>
                            <a href="#">业余赛</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="http://www.hainansports.com/topics/1">国际马拉松赛</a>
                </li>
                <li>
                    <a href="http://www.hainansports.com/topics/3">全民健身</a>
                </li>
                <li>
                    <a href="#">环岛自行车赛</a>
                </li>
                <li>
                    <a href="#">大帆船赛</a>
                </li>
                <li>
                    <a href="#">关于我们</a>
                </li>
            </ul>
        </div>
    </div>
@show