<!--头部-->
@section('header')
<header class="container clearfix">
    <div class="fr">
        <ul class="nav mr100">
            <li>
                <a href="#">体育百科</a>
            </li>
            <li>
                <a href="#">招贤纳士</a>
            </li>
            <li>
                <a href="#">联系我们</a>
            </li>
        </ul>
        <ul class="interfaces">
            <li>
                <a href="javascript:;">
                    <span class="icon-wx"></span>
                </a>
                <div class="erweima">
                    <img src="{{ asset('web/images/index/erweima.jpg')}}" width="54" height="54" alt="">
                </div>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="icon-wb"></span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <span class="icon-en"></span>
                </a>
            </li>
        </ul>
        <ul class="nav">
            <li>
                <a href="#">
                    <span class="icon-login"></span>
                    登录
                </a>
            </li>
            <li>
                <a href="#">注册</a>
            </li>
        </ul>
    </div>
</header>
    @show