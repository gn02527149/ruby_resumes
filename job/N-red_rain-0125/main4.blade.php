<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{ asset("/css/sweetalert2.min.css") }}">
    <title>{{$title}}</title>
    <script src="{{ asset("/js/sweetalert2.min.js") }}"></script>

</head>

<body style="overflow-x:hidden;">
    <div class="redtop" id="redtop">
        <div class="top_Center clearfix">
            <a href="#">
                <img src="images/logo.gif" alt="澳门新葡京">
            </a>
            <ul>
                <li><a href="https://0615002.com/" target="_blank">官网首页</a></li>
                <li><a href="http://www.0625b.com/" target="_blank">线路检测</a></li>
                <li><a href="http://65122.com/" target="_blank">一键入款</a></li>
                <li><a href="http://vip0652.com/#a1" target="_blank">vip查询</a></li>
                <li><a href="https://messenger.providesupport.com/messenger/0zvr5ttd6x00n0ll5ozxvwmj4o.html" target="_blank">在线客服</a></li>
                <li><a data-toggle="modal" data-target="#redBagDemand">红包查询</a></li>
            </ul>
        </div>
    </div>

    <div class="redhead">
        <form action="">
            <p class="showp showp-title">活动正在进行中</p>
            <p class="showp" id="hb_for"><span id="div_title">距离结束还有: </span><span id="left_d" class="digit">0</span>天<span id="left_h" class="digit">0</span>时<span id="left_m" class="digit">0</span>分<span id="left_s" class="digit">0</span>秒</p>
            <p class="showp" id="hb_end" style="display:none;"><span>抢红包活动已结束，感谢您的参与!!!</span></p>
            <div class="clearfix inall"></div>
        </form>
        <div class="notice">
            <div class="w1000 clearfix">
                <h2 class="fl">最新公告：</h2>
                <div id="demo" class="qimo8">
                    <marquee onmouseover="this.stop()" onmouseout="this.start()" id="news" scrollamount="3">
                        @foreach($annc as $k => $v)
                        @if($k == 0)
                            <span style="padding-left:2px;">
                                <a href="{{$v->link}}" target="_blank">{{$v->title}}</a>
                            </span>
                        @else
                        <span style="padding-left:910px;">
                            <a href="{{$v->link}}" target="_blank">{{$v->title}}</a>
                        </span>
                        @endif
                        @endforeach
<!--                         <span style="padding-left:2px;">
                            <a href="" target="_blank">右侧即是线路检测表，排列在列表最顶端的就是当即检测到的最快速的网路最快速的网路右侧即是线路检测表，排列在列表最顶端的就是当即检测的最快速的网路</a>
                        </span>
                        <span style="padding-left:910px;">
                            <a href="" target="_blank">右侧即是线路检测表，排列在列表最顶端的就是当即检测到的最快速的网路最快速的网路右侧即是线路检测表，排列在列表最顶端的就是当即检测的最快速的网路</a>
                        </span> -->
                    </marquee>
                </div>
            </div>
        </div>
    </div>
    <div class="redheadmain">
        <img src="images/list_bg-xs.png" alt="获奖名单" class="wintitle">
        <div class="listname">
            <div class="listcon" id="marquee">
                <ul>
                    @foreach($list as $l)
                    <li>
                        <p class="_row">恭喜:&nbsp;<span class="yellow">{{$l->username}}</span></p>
                        <p class="_row">获得&nbsp;&nbsp;<span class="_row2"><span class="yellow">{{$l->win}}元</span>紅包</span></p>
                        <p class="_row">{{$l->win_time}}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="activmain">
            <img src="images/cont.png" alt="活动内容" class="evtiltle">
            <table class="tba">
                <tbody>
                    <tr>
                        <th>
                            <span>抢红包时间</span>
                        </th>
                        <th>
                            <span>有效投注</span>
                        </th>
                        <th>
                            <span>当天存款总额</span>
                        </th>
                        <th>
                            <span>抢红包次数</span>
                        </th>
                        <th>
                            <span>红包最高金额</span>
                        </th>
                        <th>
                            <span>流水限制</span>
                        </th>
                        <th>
                            <span>派送时间</span>
                        </th>
                    </tr>
                    <tr>
                        <td rowspan="10">
                            <div style="text-align:center;">
                                <span>每天<br />
                                15:00<br />
                                |<br />
                                21:00<br />
                                (北京时间)<br />
                            </span>
                            </div>
                        </td>
                        <td rowspan="10">
                            <span>3倍</span>
                        </td>
                        <td>
                            <span>新注册会员</span>
                        </td>
                        <td>
                            <span>1次</span>
                        </td>
                        <td>
                            <span>金额随机</span>
                        </td>
                        <td rowspan="10">
                            <span>一倍流水</span>
                        </td>
                        <td rowspan="10">
                            <span>抢完<br />
                            60分钟内<br />
                            派送至<br />
                            会员账号<br />
                            </span>
                        </td>
                    </tr>

                @if($quota)
                @foreach($quota as $k => $q)
                <tr class="tdnums">
                    <td><span>{{$q->quota}}+</span></td>
                    <td><span>{{$q->num}}次</span></td>
                    @if($k == '0')
                    <td rowspan="11">
                        <span>
                        每天随机爆出<br />
                        <span class="yellow">10名</span>幸运会员<br /> 将抢到
                        <br />
                        <span class="yellow">88888元</span>巨额红包<br /> （次数越多几率越大）
                        <br />
                        </span>
                    </td>
                    @endif
                </tr>
                @endforeach
                @endif<!-- 
                    <tr>
                        <td>
                            <span>10+</span>
                        </td>
                        <td>
                            <span>2次</span>
                        </td>
                        <td rowspan="11">
                            <span>
                            每天随机爆出<br />
                            <span class="yellow">10名</span>幸运会员<br /> 将抢到
                            <br />
                            <span class="yellow">88888元</span>巨额红包<br /> （次数越多几率越大）
                            <br />
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>100+</span>
                        </td>
                        <td rowspan="2">
                            <span>3次</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>1000+</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>10000+</span>
                        </td>
                        <td rowspan="2">
                            <span>4次</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>100000+</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>500000+</span>
                        </td>
                        <td rowspan="2">
                            <span>5次</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>1000000+</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>150万+</span>
                        </td>
                        <td>
                            <span>8次</span>
                        </td>
                    </tr> -->
                </tbody>
            </table>

            <img src="images/rule.png" alt="活动内容" class="tiphh">
            <p>即日起凡是注册于【澳门新葡京】会员，均享有（一次）抢红包资格，新注册会员抢红包网址：60722.com；</p>
            <p>1.新注册会员需在次日的15:00~21:00（北京时间）期间进入（60722.com）红包专区参与；期间未抽取将视为自动放弃；</p>
            <p>2.参加抢红包会员需绑定完整的会员资料；（未绑定完整资料抽取 的红包将不予派发）</p>
            <p>3.获得“现金红包”的会员无需申请，系统将在抢完红包后60分钟内自动添加到您的会员账户内，请耐心等待。</p>
            <p>4.获得“现金红包”的会员只需一倍流水，即可提款！</p>
            <p>5.每个IP只能一个账号参与抢红包活动，否则不予以派发所得红包，并取消活动资格。</p>
            <p>6.只要符合以上活动规则，每天15:00~21:00（北京时间）即可来抢，资格无需申请！</p>
            <img src="images/rule2.png" alt="活动内容" class="tiphh2">
            <p>1.所有优惠以人民币(CNY)为结算金额，以美东时间(EDT)为计时区间；</p>
            <p>2.每位玩家、每户﹑每一住址、每一电子邮箱地址﹑每一电话号码﹑相同支付方式(相同借记卡/信用卡/银行账户) 及IP地 址只能享有一次优 惠；若会员有重复申请账号行为，公司保留取消或收回会员优惠彩金的权利；</p>
            <p>3.澳门新葡京的所有优惠特为玩家而设，如发现任何团体或个人，以不诚实方式套取红利或任何威胁、滥用公司优惠等行 为，公司保留冻 结、取消该团体或个人账户及账户结余的权利；</p>
            <p>4.若会员对活动有争议时，为确保双方利益，杜绝身份盗用行为，澳门新葡京有权要求会员向我们提供充足有效的文件， 用以确认是否享有 该优惠的资质；</p>
            <p>5.当参与优惠会员未能完全遵守、或违反、或滥用任何有关公司优惠或推广的条款，又或我们有任何证据有任何团队或个 人投下一连串的关 联赌注，籍以造成无论赛果怎样都可以确保可以从该存款红利或其他推广活动提供的优惠获利，澳门 新葡京保留权利向此团队或个人停止 、取消优惠或索回已支付的全部优惠红利。此外，公司亦保留权利向这些客户扣取 相当于优惠红利价值的行政费用，以补偿我们的行政成本；</p>
            <p>6.澳门新葡京保留对活动的最终解释权，以及在无通知的情况下修改、终止活动的权利，适用于所有优惠。</p>
        </div>
    </div>
    <div class="rdfoot">澳门新葡京所提供的产品和服务，是由澳门特别行政区 The Macao Special Administrative Region.授权和监管<br /> 选择我们，您将拥有可靠的资金保障和优质的服务 Copyright © 澳门新葡京 Reserved<br /> E-mail：xinpujinglive@gmail.com 電話：0063-9077988888</div>
    <div class="top">
        <a href="https://messenger.providesupport.com/messenger/0zvr5ttd6x00n0ll5ozxvwmj4o.html" target="_blank">
            <div class="service"></div>
        </a>
        <a>
            <div class="turnTop"></div>
        </a>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="redBagRain" data-backdrop="static" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content redbagbox">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                              ×
                          </button>
                    <h4 class="modal-title" id="myModalLabel">请输入会员帐号</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="firstname" class="col-sm-2 control-label">帐号</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="firstname" placeholder="请输入帐号">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="gethongbao">登陆</button>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="redBagDemand" data-backdrop="static" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content redbagbox">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                  ×
                              </button>
                    <h4 class="modal-title" id="myModalLabel">请输入会员帐号查询</h4>

                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="qu_name" class="col-sm-2 control-label">会员帐号</label>
                        <div class="col-sm-10">
                            <input type="text" name="qu_name" class="form-control" id="qu_name" placeholder="请输入帐号">
                            <button type="button" class="btn btn-primary" id="send_qu">查询</button>
                        </div>
                        <div class="col-sm-12 cxbox_bd" style="color:#ffe681;">
                            <table width="480" style="width:95%" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr class="ad">
                                        <td>红包金额</td>
                                        <td>领取时间</td>
                                    </tr>
                                </tbody>
                                <tbody class="record_content">
                                    
                                </tbody>
                            </table>
                            <div class="quotes" style="padding:10px 0px;"></div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="redBagopen" data-backdrop="static" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-dialog-top" role="document">
                <div class="modal-content redbagbox">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                  ×
                              </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="ward_cont">
                                <p>澳门新葡京</p>
                                <p class=fz3>您还有<span class="y fee">＊＊</span>次机会</p>
                                <button class="open"></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Marquee.js"></script>
    <script src="js/snowfall.jquery.js" type="text/javascript"></script>
    <script src="js/red_rain.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>