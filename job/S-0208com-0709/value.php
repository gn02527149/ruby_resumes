<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('IN_GD', true);
require dirname(__FILE__) . '/includes/init.php';
// $info = $db->get($prefix . "sys", "*", array('id' => '1'));

$login = 0;
if (isset($_COOKIE['frontend_agency_user_id'])) {
	$login = 1;

}
?>


<!DOCTYPE html>
<html lang="zh-Hans">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="澳门银河VIP线路中心">
    <meta name="listBox-contentcription" content="澳门银河VIP线路中心">
    <title>代理价值</title>
    <?php include './index/metadata.php'; ?>
    <link rel="stylesheet" href="css/value.css">
</head>

<body style="overflow-x: hidden;min-width: 1250px;">
    <div class="loading">
        <img src="images/loadingTitle.png" alt="">
        <div id="progressBar">
            <div>
                <span></span>
            </div>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--头部-->
    <div class="top">
        <div class="test_msg_bg test_msg_bg_l" style="overflow: hidden;">
            <div class="test_msg_bg01"></div>
            <div class="test_msg_bg02"></div>
        </div>
        <div class="test_msg_bg test_msg_bg_r" style="overflow: hidden;">
            <div class="test_msg_bg01"></div>
            <div class="test_msg_bg02"></div>
        </div>

        <div id="header"><?php include './index/header.php'; ?></div>

        <!--banner-->
        <div id="banner"><?php include './index/banner.php'; ?></div>

        <!--代理查詢-->
        <div class="test_msg">
            <div class="test_msg_box">
                <span  style="display: <?=$login == 1 ? 'none' : 'block'?>;">
                    <div class="inquire" style="display: none;"><input type="text" name="username1" value="" placeholder="请输入代理帐号" onfocus="this.placeholder=''" onblur="this.placeholder='请输入代理帐号'"><button class="login"></button></div>
                </span>
                <div class="listBox program">
                    <div class="listBoxTitle programTitle"><img src="images/programTitle.jpg" alt=""></div>
                    <div class="listBox-content">
                        <table class="table wow flipInX" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr class="Fline">
                                    <th>有效投注/天</th>
                                    <th>活跃会员/天</th>
                                    <th>佣金比例</th>
                                </tr>
                                <tr>
                                    <td>1元+</td>
                                    <td>1个或以上</td>
                                    <td>0.20%</td>
                                </tr>
                                <tr>
                                    <td>100万+</td>
                                    <td>10个或以上</td>
                                    <td>0.25%</td>
                                </tr>
                                <tr>
                                    <td>500万+</td>
                                    <td>20个或以上</td>
                                    <td>0.30%</td>
                                </tr>
                                <tr>
                                    <td colspan="7">注:请谨记使用任何不诚实方式骗取代理佣金者将取消代理资格并永久冻结账号.佣金一律不予派发！</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="listBox worth">
                    <div class="listBoxTitle worthTitle"><img src="images/worthTitle.jpg" alt=""></div>
                    <div class="listBox-content ">
                        <p>1.加入澳门银河尊尚代理团队，晋级更高职位，越晋升越优越，即刻享受您的专属超级特权；
                            <br>2.从2017年7月1日起，您在澳门银河获得的每一笔佣金都将永久累积，当累积到一定标准，即可晋级为更高级别的代理合伙人；
                            <br>3.代理等级越高，能参与更多的优惠活动和收获更多的彩金，我们将不断推出更多的优惠活动回馈新老代理！</p>
                        <table class="table wow flipInX" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr class="Fline">
                                    <th style="width:160px;">晋级标准</th>
                                    <th>LV1</th>
                                    <th>LV2</th>
                                    <th>LV3</th>
                                    <th>LV4</th>
                                    <th>LV5</th>
                                    <th>LV6</th>
                                    <th>LV7</th>
                                    <th>LV8</th>
                                    <th>LV9</th>
                                    <th>LV10</th>
                                </tr>
                                <tr>
                                    <td class="tbl-th">累计佣金</td>
                                    <td>1+</td>
                                    <td>1万+</td>
                                    <td>10万+</td>
                                    <td>50万+</td>
                                    <td>100万+</td>
                                    <td>200万+</td>
                                    <td>500万+</td>
                                    <td>800万+</td>
                                    <td>1000万+</td>
                                    <td>1500万+</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">每月有效会员</td>
                                    <td>1+</td>
                                    <td>10+</td>
                                    <td>30+</td>
                                    <td>50+</td>
                                    <td>100+</td>
                                    <td>200+</td>
                                    <td>300+</td>
                                    <td>500+</td>
                                    <td>800+</td>
                                    <td>1000+</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">晋级彩金</td>
                                    <td>--</td>
                                    <td>388</td>
                                    <td>888</td>
                                    <td>1888</td>
                                    <td>3888</td>
                                    <td>8888</td>
                                    <td>18888</td>
                                    <td>38888</td>
                                    <td>88888</td>
                                    <td>188888</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">每月薪水</td>
                                    <td colspan="12"><span class="fc-red">升级代理等级达到要求即可获得相应的奖金！</span></td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">代理专属二维码</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">代理专属链接</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">24小时服务</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                    <td>√</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="listBox directions">
                    <div class="listBoxTitle directionsTitle"><img src="images/directionsTitle.jpg" alt=""></div>
                    <div class="listBox-content">
                        <p>1、如何查询代理等级？ <br>我们会在北京时间每天18:00之前派发佣金并且更新您的代理等级, 您可点击"等级查询"进行自助查询佣金、代理等级等明细；
                            <br>2、如何申请晋级彩金？
                            <br>晋级彩金无需申请, 我们会在北京时间每周一15:00~20:00期间发放,因彩金数目众多,并非每个代理都会及时到账,若未及时到账请您耐心等待，晋级彩金一倍流水即可提现；
                            <br>3、每月的代理薪水如何计算？
                            <br>代理每月奖金无需申请, 我们会在北京时间每月6号15:00~20:00点期间发放，每月奖金无需流水即可自由提现！</p>
                        <p class="strong"><strong>依照代理等级，每月达到相应的要求即可获得相应的代理薪水！</strong></p>
                        <table class="table wow flipInX" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr class="Fline">
                                    <th>月累积佣金</th>
                                    <th>有效会员人数</th>
                                    <th>代理薪水</th>
                                    <th>代理等级</th>
                                </tr>
                                <tr>
                                    <td>500+</td>
                                    <td>1+</td>
                                    <td>88元</td>
                                    <td>LV1-LV10</td>
                                </tr>
                                <tr>
                                    <td>1万+</td>
                                    <td>10+</td>
                                    <td>188元</td>
                                    <td>LV2-LV10</td>
                                </tr>
                                <tr>
                                    <td>3万+</td>
                                    <td>30+</td>
                                    <td>388元</td>
                                    <td>LV3-LV10</td>
                                </tr>
                                <tr>
                                    <td>10万+</td>
                                    <td>50+</td>
                                    <td>588元</td>
                                    <td>LV4-LV10</td>
                                </tr>
                                <tr>
                                    <td>20万+</td>
                                    <td>100+</td>
                                    <td>888元</td>
                                    <td>LV5-LV10</td>
                                </tr>
                                <tr>
                                    <td>50万+</td>
                                    <td>150+</td>
                                    <td>1888元</td>
                                    <td>LV6-LV10</td>
                                </tr>
                                <tr>
                                    <td>100万+</td>
                                    <td>200+</td>
                                    <td>5888元</td>
                                    <td>LV7-LV10</td>
                                </tr>
                                <tr>
                                    <td>200万+</td>
                                    <td>300+</td>
                                    <td>8888元</td>
                                    <td>LV8-LV10</td>
                                </tr>
                                <tr>
                                    <td>500万+</td>
                                    <td>400+</td>
                                    <td>18888元</td>
                                    <td>LV9-LV10</td>
                                </tr>
                                <tr>
                                    <td>800万+</td>
                                    <td>500+</td>
                                    <td>38888元</td>
                                    <td>LV10-LV10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="listBox treaty">
                    <div class="listBoxTitle treatyTitle"><img src="images/treatyTitle.jpg" alt=""></div>
                    <div class="listBox-content">
                        <p>以下情况不诚实方法骗取佣金将会永久冻代理账户，所有佣金一概不予发放。
                            <br> A. 代理线下会员产生作弊、对赌等违规行为。
                            <br> B. 代理线下会员出现频繁入款后1倍/2倍流水出款，如严重刷水者将取消代理资格。
                            <br> C. 恶意引导现有玩家进行重新注册至自己代理账号。<br>
                            <strong> 备注：澳门银河有权要求代理伙伴及其下线玩家提供有效证明文件。</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <div id="footer"><?php include './index/footer.php'; ?></div>

    <div class="modal fade" id="vipModal" tabindex="-1" role="dialog" aria-labelledby="vipModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    <img src="images/logo.png">
                </div>
                <div class="modal-body">
                    <div class="keyaccount">代理账号: <input type="text" name="username2"></div>
                    <div class="keyverification">验&nbsp; 证&nbsp; 码: <span class="passcode"><img class="imgcode" src="includes/imgcode.php" /></span><input type="text" name="imgcode"></div>
                    <div class="keyverificationWrong">错误的账号或验证码</div>
                </div>
                <div class="modal-footer">
                    <div>
                        <a><button class="closeBtn login SubmitBtn" type="button"></button></a>
                        <a href="http://shang.qq.com/email/stop/email_stop.html?qq=61259765
                                        &sig=a1c657365db7e82805ea4b2351081fc3ebcde159f8ae49b1&tttt=1" target="_blank"><button class="closeBtn forget" type="button"></button></a>
                        <a href="http://shang.qq.com/email/stop/email_stop.html?qq=61259765
                                        &sig=a1c657365db7e82805ea4b2351081fc3ebcde159f8ae49b1&tttt=1" target="_blank"><button class="closeBtn pass" type="button"></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="TOP" style="display: none;">
        <a><img src="images/top.png" alt="" srcset="" style="width:50px;"></a>
    </div>
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 200,
            callback: function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();

		$('.footer_content img').attr("src", "images/footer_6.jpg");
        $('body').css("background", "linear-gradient(to right, rgb(31, 28, 36), rgb(40, 33, 35), rgb(54, 54, 56))");


        $(window).scroll(function() {
            var scrollVal = $(this).scrollTop();

            if (scrollVal > 500) {
                $('.TOP').css("display", "block");
                $(".inquire").css({
                    "position": "fixed",
                    "top": "0",
                    "left": "50%",
                    "transform": "translateX(-50%)",
                    "width": "1000px",
                    "z-index": "999",
                    "display": "block"
                });
            } else {
                $('.TOP').css("display", "none");
                $('.inquire').css("display", "none");
            }
        });

        $('.TOP').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });

        $('.inquire .login').click(function() {
            var account = $('.inquire input').val();
            $('.keyaccount input').val(account);
        });

        $('#vipModal .closeBtn').click(function() {
            $('.login').parent().css("display", "block");
        });

        setTimeout(function() {
            $('.loading').hide();
        }, 3800);
    </script>

</html>
<script type="text/javascript">
    $(function(){
        $('.inquire .login').on('click', function(){
            $('.keyverificationWrong').hide();
            var username = $('input[name="username1"]').val();
            $.ajax({
                type: 'post',
                url: 'ajax.php?act=login_do',
                data: {
                    username: username,
                },
                dataType: 'json',
                success: function(data) {
                    if(data.type == 'success'){
                        location.href = 'login.php';
                    }else if(data.type == 'fail'){
                        $('#vipModal').modal('show');
                        $('.keyverificationWrong').show();
                        $('.passcode').html('<img class="imgcode" src="includes/imgcode.php" />');
                    }

                }
            });
        });
        $('#vipModal .login').on('click', function(){
            var username = $('input[name="username2"]').val();
            var imgcode = $('input[name="imgcode"]').val();
            if(username !== "" && imgcode !== ""){
                $('.keyverificationWrong').hide();
                $.ajax({
                    type: 'post',
                    url: 'ajax.php?act=login_do',
                    data: {
                        username: username,
                        imgcode: imgcode,
                    },
                    dataType: 'json',
                    success: function(data) {
                        if(data.type == 'success'){
                            location.href = 'login.php';
                        }else if(data.type == 'fail'){
                            $('.keyverificationWrong').show();
                            $('.passcode').html('<img class="imgcode" src="includes/imgcode.php" />');
                        }

                    }
                });
            }else{
                $('.keyverificationWrong').show();
                $('.passcode').html('<img class="imgcode" src="includes/imgcode.php" />');
            }
        });
        $('body').on('click', '.imgcode', function(){
            $('.passcode').html('<img class="imgcode" src="includes/imgcode.php" />');
        });
        $('.close').click(function(){
            $('.keyverificationWrong').hide();
        });
    });
</script>