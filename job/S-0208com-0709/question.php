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
    <meta name="description" content="澳门银河VIP线路中心">
    <title>常见问题</title>
    <?php include './index/metadata.php'; ?>
    <link rel="stylesheet" href="css/question.css">
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
                <div class="listBox partner wow bounceInRight">
                    <div class="listBoxTitle partnerTitle"><img src="images/partnerTitle.png" alt=""></div>
                    <div class="listBox-content">
                        <p class="Q">什么是澳门银河代理？</p>
                        <p class="A">代理计划是澳门银河官网与网上有兴趣并且有一定资源与实力的代理展开的一种合作关系。当代理通过自己的运营推广方式为澳门银河带来新的客户，而这些客户一旦成为澳门银河的有效会员，澳门银河便会按照一定比例支付该代理特定金额的报酬。成为合作伙伴之后，代理商发展会员即可享受会员带来的入款返佣与有效投注额度返佣！只要推荐朋友、同学、同事、甚至您的领导都变成了您的下级，他们都在帮您赚钱！您便可以每月持续轻松地赚取利润！</p>
                        <p class="Q">如何成为代理合作伙伴？</p>
                        <p class="A">要加入成为亚洲城合营伙伴，您只需要拥有自己的推广方式。然后，按照我们的简易流程进行注册：<br> 一、加入澳门银河代理计划，点击这里注册亦或是联系代理专员
                            <br> 二、一旦您的申请通过后，您即可选择任何游戏产品进行推广，只需登录澳门银河代理中心0208dl.com挑选您需要的推广素材或联系代理专员所要横幅广告即可。
                        </p>
                        <p class="Q">加入澳门银河合营计划需要任何费用吗？</p>
                        <p class="A">澳门银河代理计划是一个完全免费的计划。整个合作计划是100％免费为联盟会员开通，合作伙伴靠自己的运营推广能力赚取佣金，您还等什麽？现在就加入！</p>
                        <p class="Q">我可以从澳门银河哪些产品赚取佣金？</p>
                        <p class="A">澳门银河涵盖有多种老虎机游戏，真人百家乐，龙虎斗，棋牌游戏，轮盘，彩票游戏，体育赛事，等各类娱乐游戏，您可以选择您擅长的产品进行推广，介绍玩家游戏从中赚取纯利润作为佣金回报。</p>
                    </div>
                </div>
                <div class="listBox management wow bounceInRight">
                    <div class="listBoxTitle managementTitle"><img src="images/managementTitle.jpg" alt=""></div>
                    <div class="listBox-content">
                        <p class="Q">如何引导客户通向澳门银河网站？</p>
                        <p class="A">代理申请成功后，系统会为您的代理账户产生一个专属的推广网址。把您的专属推广网址发给朋友或者投放到您所要推广的网站、博客、论坛、贴吧、QQ空间、微信朋友圈等地方，而当客户通过您的专属代理网址链接到澳门银河注册账户，他将自动标记为您的客户。</p>
                        <p class="Q">在哪查看我的代理推广网址/代理链接？</p>
                        <p class="A">要取得推广网址，您必须先申请成为澳门银河代理。一旦您的代理获得批准，您可以登录到澳门银河代理计划站(0208dl.com)，推广链接就是您的代理链接。登录代理网站后，即会看到您的代理推广网址以及推广二维码。</p>
                        <p class="Q">代理后台能查询什么？应该怎么登录呢？</p>
                        <p class="A">登录代理后台可以查询到代理线信息、线下总会员人数、当日新增会员人数，和代理线下会员的基本信息、账户余额明细、注册时间、登录日志以及下注情况等；代理后台登录需要在自己的推广链接前面加“agent.”即可登录，如代理推广链接为“0208.com”，那么代理后台登录网址即为“agent.0208.com”，也就是代理推广链接前面加“agent.”即可登录。</p>
                        <p class="Q">如果代理合作伙伴需要帮助 应该与谁联系？</p>
                        <p class="A">如果您在推广过程中有任何疑问或需要帮助，欢迎随时联系代理专员、在线客服等。</p>
                        <p class="Q">如何更改账户资料？</p>
                        <p class="A">您可以在我们的代理后台系统中随时更改您的账户密码。 如果需要更改注册资料信息，请您联系我们代理专员进行修改。</p>
                    </div>
                </div>
                <div class="listBox account wow bounceInRight">
                    <div class="listBoxTitle accountTitle"><img src="images/accountTitle.jpg" alt=""></div>
                    <div class="listBox-content">
                        <p class="Q">如何查看佣金和下线会员？</p>
                        <p class="A">登入代理后台后点击 "佣金报表"即可看到您的佣金记录，点击“会员信息”和“分红明细”可以查看每个会员的注册时间以及有效投注、所在的游戏场馆等玩家输赢情况。</p>
                        <p class="Q">如何计算佣金比例？</p>
                        <p class="A">将每日有效投注、活跃会员分为多个分段，然后按不同的佣金比例进行计算。当日有效投注达到要求，而活跃会员未达到要 求时，佣金按降一级计算；当活跃会员达到要求，而日有效投注额未达到要求，则按日有效投注额的佣金等级计算！
                            <br>例1：一天有效投注100万，活跃会员为10个，佣金计算方式为：1,000,000 * 0.25%=2500元。
                            <br>例2：一天有效投注100万，活跃会员为 8 个，佣金计算方式为：1,000,000 * 0.20%=2000元。</p>
                        <p class="Q">佣金会在什么时间派发以及如何派发？</p>
                        <p class="A">我们将在每天北京时间18:00前，结算您上一天的佣金所得；佣金会自动存入您在澳门银河注册的会员账户，您可以直接提款或继续娱乐赚钱！</p>
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

		$('.footer_content img').attr("src", "images/footer_4.jpg");
        $('body').css("background", "linear-gradient(to right, rgb(28, 25, 35), rgb(36, 29, 33), rgb(51, 49, 52))");


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