
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-hns">
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                @foreach($data["navbar"] as $nav)
                    <li class="nav-item "><a class="nav-link " href="/">{{$nav['title']}} <span class="sr-only">(current)</span></a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#schedule">赛程安排</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news-pic">精彩图说</a></li>
                    <li class="nav-item"><a class="nav-link" href="#news-video">独家视频</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contest-area">高端旅游</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">往届回顾</a></li> -->
                @endforeach
                </ul>
            </div>
        </nav>
    </div>

</div>