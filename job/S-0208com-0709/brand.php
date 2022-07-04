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
    <title>品牌效应</title>
    <?php include './index/metadata.php'; ?>
    <link rel="stylesheet" href="css/brand.css">
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
                <div class="introduction wow fadeInUp">
                    <div class="introduction_img">
                        <img src="images/introduction-2.png" alt="">
                    </div>
                    <div class="introduction_content">
                        <div class="introduction_title"><img src="images/introduction_title.png" alt="" srcset=""></div>
                        <p>澳门银河注册于澳门,并且拥有澳门实地赌场牌照,是亚洲最具规模、运营最成功的在线娱乐场巨头之一,提供刺激好玩的彩票游戏、真人荷官娱乐,体育博彩,赌场老虎机,虚拟游戏,和扑克游戏等,以迎合每个人的娱乐需求。我们与领先行内的平台提供商合作如PT、MG、BBIN、AG、OG、AB、VG、SG、AB、BG、DS、YG、HB、PTS、沙巴体育等,为您提供终极游戏体验。澳门银河的最高宗旨就是让广大客户享受最优质的博彩娱乐及服务,加入澳门银河您将会有意想不到的收获！</p>
                    </div>
                </div>
                <div class="spread  wow fadeInUp">
                    <div class="_spread spread1">
                        <img src="images/spread1.png" alt="">
                        <div class="overlay"></div>
                        <div class="figcaption">
                            <p>联系代理专员了解协议<br>免费开通代理账号</p>
                        </div>
                    </div>
                    <div class="_spread spread2">
                        <img src="images/spread2.png" alt="">
                        <div class="overlay"></div>
                        <div class="figcaption">
                            <p>获取代理链接和推广海报<br>进行推广赚取佣金</p>
                        </div>
                    </div>
                    <div class="_spread spread3">
                        <img src="images/spread3.png" alt="">
                        <div class="overlay"></div>
                        <div class="figcaption">
                            <p>每日下午18:00之前<br>佣金到账至会员账户</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--银河代理-->
    <div class="main">
        <div class="main_box wow fadeInRight">
            <div class="content_box">
                <div class="content_box_img">
                    <img src="images/main2-01.jpg" alt="">
                    <div class="hover">
                        <a href="" class="enter1" target="_blank">VIP优越会</a>
                        <a href="" class="testplay" target="_blank">点击进入</a>
                    </div>
                </div>
                <div class="box_content">
                    <div class="content_box_title">无上优越●无尽奖赏</div>
                    <p>澳门银河作为线上娱乐唯一官网,斥巨资打造全民VIP王国,超低门槛,1元即可入驻,每周三自动派送周工资,每月8号自动派送月薪水,“一元入驻-终身有礼”</p>
                    <div class="content_btn">
                        <a href="">
                            <div class="more">查看更多</div>
                        </a>
                        <a href="">
                            <div class="join">立即加入</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content_box">
                <div class="content_box_img">
                    <img src="images/main2-02.jpg" alt="">
                    <div class="hover">
                        <a href="" class="enter1" target="_blank">VIP优越会</a>
                        <a href="" class="testplay" target="_blank">点击进入</a>
                    </div>
                </div>
                <div class="box_content">
                    <div class="content_box_title">亚洲最专业老虎机品牌</div>
                    <p>澳门银河拥有PT、MG、BBIN、PTS、YG、HB六大老虎机平台，上千款老虎机游戏给玩家更多选择。十二大电子游艺优惠专题，百万彩金天天派送，千万奖池一触即发。</p>
                    <div class="content_btn">
                        <a href="">
                            <div class="more">查看更多</div>
                        </a>
                        <a href="">
                            <div class="join">立即加入</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content_box">
                <div class="content_box_img">
                    <img src="images/main2-03.jpg" alt="">
                    <div class="hover">
                        <a href="" class="enter1" target="_blank">VIP优越会</a>
                        <a href="" class="testplay" target="_blank">点击进入</a>
                    </div>
                </div>
                <div class="box_content">
                    <div class="content_box_title">亚洲最具影响力真人视讯品牌</div>
                    <p>澳门银河囊括了东西方最全面的真人视讯平台，包括AG、BBIN、OG、SG、AB、DS、BG等，无论您是东方多玩法百家乐爱好者，还是西方传统游戏爱好者，您都能在澳门银河百家乐找到最受欢迎的平台。</p>
                    <div class="content_btn">
                        <a href="">
                            <div class="more">查看更多</div>
                        </a>
                        <a href="">
                            <div class="join">立即加入</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content_box">
                <div class="content_box_img">
                    <img src="images/main2-04.jpg" alt="">
                    <div class="hover">
                        <a href="" class="enter1" target="_blank">VIP优越会</a>
                        <a href="" class="testplay" target="_blank">点击进入</a>
                    </div>
                </div>
                <div class="box_content">
                    <div class="content_box_title">亚洲最具规模的线上彩投机构</div>
                    <p>澳门银河包含全亚洲最全彩种以及提供业内超高赔率，六合彩特码49倍、时时彩9.88倍、北京赛车9.88倍，无论您是六合彩民还是时时彩爱好者，您都能在澳门银河好到自己喜爱的彩种。</p>
                    <div class="content_btn">
                        <a href="">
                            <div class="more">查看更多</div>
                        </a>
                        <a href="">
                            <div class="join">立即加入</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content_box">
                <div class="content_box_img">
                    <img src="images/main2-05.jpg" alt="">
                    <div class="hover">
                        <a href="" class="enter1" target="_blank">VIP优越会</a>
                        <a href="" class="testplay" target="_blank">点击进入</a>
                    </div>
                </div>
                <div class="box_content">
                    <div class="content_box_title">亚洲最受欢迎棋牌系列游戏</div>
                    <p>澳门银河整合所有最好玩，最新潮的棋牌游戏，斗地主、炸金花、牛牛、德州扑克、三公、二八杠、二十一点、欢乐红包等全民老少皆宜的游戏，不仅在PC电脑端，在手机网页版、手机APP版更容易操作，真正的随时随地，想玩就玩。</p>
                    <div class="content_btn">
                        <a href="">
                            <div class="more">查看更多</div>
                        </a>
                        <a href="">
                            <div class="join">立即加入</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content_box">
                <div class="content_box_img">
                    <img src="images/main2-06.jpg" alt="">
                    <div class="hover">
                        <a href="" class="enter1" target="_blank">VIP优越会</a>
                        <a href="" class="testplay" target="_blank">点击进入</a>
                    </div>
                </div>
                <div class="box_content">
                    <div class="content_box_title">亚洲最全面赛事投注机构</div>
                    <p>澳门银河作为2018年世界杯指定投注平台，拥有顶级的盘房操盘，投入大量的人力以及资源，提高完整赛事，丰富玩法和超高的水位给热爱体育的玩家。</p>
                    <div class="content_btn">
                        <a href="">
                            <div class="more">查看更多</div>
                        </a>
                        <a href="">
                            <div class="join">立即加入</div>
                        </a>
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

		$('.footer_content img').attr("src", "images/footer_2.jpg");
        $('body').css("background", "linear-gradient(to right, rgb(24, 21, 25), rgb(34, 27, 31), rgb(31, 24, 24))");


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