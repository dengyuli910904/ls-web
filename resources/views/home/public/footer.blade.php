@section('footer')
<footer>
    <div class="footer-area pt80 pb50">
        <div class="container w1000">
            <div class="row">
                <div class="col-md-10">
                    <div class="row cr">
                        <div class="col-md-4">
                            <img src="{{ asset('images/logo_foot.png') }}" alt="">
                        </div>
                        <div class="col-md-4 text-center">
                            <h3>海南体育赛事频道</h3>
                        </div>
                        <div class="col-md-4" style="border-right: none;">
                            <div class="add" style="margin-top: -1px; margin-left: 10px">
                                <p>
                                    地址：海南省海口市滨海大道32号复兴城A1区A5002<br>
                                    邮编：570100<br>
                                    热线：0898-68583161
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <!-- <img src="{{ asset('images/qr_code.png') }}" alt=""> -->
                    <img class="qrcode" src="/images/common/qrcode.png" />
                </div>
            </div>
            <div class="row text-center" style="height:80px; line-height: 80px; color: #fff; padding-top: 30px">

                    2017-2018 海南体育赛事 版权所有
                    <a href="">关于海南体育</a> |
                    <a href="">联系我们</a> |
                    <a href="">合作模式</a> | 琼ICP备17001101号

            </div>
        </div>
    </div>
</footer>
@show
