<?php

$datas = $db->select($prefix . "index_m", "*", array('ORDER' => array('order_id' => 'DESC')));

$sDiv = '';
foreach ($datas as $item) {

	$sDiv .= '<li data-transition="slide"><img src="/..' . $item['img_url'] . '" alt="" /><a data-type="link" href="' . $item['jump_url'] . '" target="_blank"></a></li>';
	// $sDiv .= '<div><a href="' . $item['jump_url'] . '" target="_blank"><img src="' . $item['img_url'] . '" /></a></div>';
}
$login = 0;
if (isset($_COOKIE['frontend_agency_user_id'])) {
	$login = 1;
}
?>

<header>
    <div class="top_center">
        <!-- <div class="inquire" style="display: <?=$login == 1 ? 'none' : 'block'?>;"><button class="login" data-toggle="modal" data-target="#vipModal"></button></div>
        <div class="inquirein" style="display: <?=$login == 1 ? 'block' : 'none'?>;"><a href="login.php"><button class="login"></button></a></div> -->
        <div class="hamburger"><img src="images/hamburger.png" alt=""></div>
    </div>
    <div class="banner" style="overflow-x: hidden;margin-top: 63px;">
        <div id="banner-example-1" class="light">
            <ul data-type="slides">
                <?=$sDiv?>
<!--                     <li data-transition="slide"><img src="images/slide_01.jpg" alt="" /></li>

                <li data-transition="slide"><img src="images/slide_02.jpg" alt="" /></li>

                <li data-transition="slide"><img src="images/slide_03.jpg" alt="" /></li>

                <li data-transition="slide"><img src="images/slide_04.jpg" alt="" /></li>

                <li data-transition="slide"><img src="images/slide_05.jpg" alt="" /></li> -->
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <ul class="nav_lf">
            <a href="index.php">
                <li class="index">
                    <span>
                        <img src="images/home.png" alt="" srcset="">
                    </span>代理首页
                </li>
            </a>
            <a onClick="<?=$login == 1 ? "window.location='login.php'" : "$('#vipModal').modal().css('display','flex')"?>">
                <li class="login">
                    <span>
                        <img src="images/login.png" alt="" srcset="">
                    </span>我的代理
                </li>
            </a>
            <a href="brand.php">
                <li class="brand">
                    <span>
                        <img src="images/brand.png" alt="" srcset="">
                    </span>品牌效应
                </li>
            </a>
            <a href="tool.php">
                <li class="tool">
                    <span>
                        <img src="images/tool.png" alt="" srcset="">
                    </span>营销工具
                </li>
            </a>
            <a href="question.php">
                <li class="question">
                    <span>
                        <img src="images/question.png" alt="" srcset="">
                    </span>常见问题
                </li>
            </a>
            <a href="value.php">
                <li class="value">
                    <span>
                        <img src="images/value.png" alt="" srcset="">
                    </span>代理方案
                </li>
            </a>
            <a href="index.php#support">
                <li class="SBservice">
                    <span>
                        <img src="images/service.png" alt="" srcset="">
                    </span>代理专员
                </li>
            </a>
            <a>
                <li class="commissioner">
                    <span>
                        <img src="images/commissioner.png" alt="" srcset="">
                    </span>在线客服
                </li>
            </a>
        </ul>
    </div>
    <div class="modal fade" id="vipModal" tabindex="-1" role="dialog" aria-labelledby="vipModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="keyaccount"><input type="text" placeholder="代理账号" name="username"></div>
                        <div class="keyverification"><input type="text" placeholder="验证码" name="imgcode"><span class="passcode"><img class="imgcode" src="../includes/imgcode.php" /></span></div>
                        <div class="keyverificationWrong">错误的账号或验证码</div>
                        <a class="forget" href="http://shang.qq.com/email/stop/email_stop.html?qq=61259765 &sig=a1c657365db7e82805ea4b2351081fc3ebcde159f8ae49b1&tttt=1" target="_blank">忘记账号？</a>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <a href="#"><button class="closeBtn login SubmitBtn" type="button"></button></a>
                            <a href="http://shang.qq.com/email/stop/email_stop.html?qq=61259765 &sig=a1c657365db7e82805ea4b2351081fc3ebcde159f8ae49b1&tttt=1" target="_blank"><button class="closeBtn pass" type="button"></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>

 <script type="text/javascript">
    $(function() {
        var WW = $(window).width();
        $('#banner-example-1').paradigm({
            width: WW,
            height: parseInt(WW / 750 * 356),

            thumbWidth: 90,
            thumbHeight: 50,
            thumbAmount: 6,
            thumbSpaces: 4,
            thumbPadding: 4,
            thumbStyle: "thumb",
            thumbVideoIcon: "on",
            bulletXOffset: 0,
            bulletYOffset: 0,

            shadow: 'true',

            parallaxX: 500,
            parallaxY: 10,
            captionParallaxX: -40,
            captionParallaxY: 2,

            touchenabled: 'on',

            timer: 3
        });
        $('#banner-example-1,.slide_mainmask').css({
            "width": WW,
            "height": parseInt(WW / 750 * 356)
        });
        $('#banner-example-1 img').css({
            "width": "100%",
            "height": "100%"
        });
        $('.slide_mainmask,.slide_container').css({
            "top": "0",
            "left": "0",
            "background": "#333"
        });
        $('.paradigm_thumb_container').hide();

        $('.hamburger img,.sidebar li').click(function() {
            $('.sidebar').toggleClass("block");
        });

    });
</script>
<script type="text/javascript">

    function listCookies() {
        var theCookies = document.cookie.split('; ');
        var aString = [];
        var a = '';
        for (var i = 1 ; i <= theCookies.length; i++) {

            a = theCookies[i-1].split('=');

            aString[a[0]] = a[1];
            //aString += i + ' ' + theCookies[i-1] + "\n";
        }
        //console.log(aString);
        return aString;
    }
    $('.login_connect').on('click', function(){
        var all_cookie = listCookies();
        var user = all_cookie['frontend_agency_user'];
        var user_id = all_cookie['frontend_agency_user_id'];
        if(user && user_id){
            location.href = 'login.php';
        }
    });

    $('.SubmitBtn').on('click', function(){
        $('.keyverificationWrong').hide();
        var username = $('input[name="username"]').val();
        var imgcode = $('input[name="imgcode"]').val();
        $.ajax({
            type: 'post',
            url: '../ajax.php?act=login_do',
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
                    $('input[name="imgcode"]').val('');
                }

            }
        });
    });
    $('body').on('click', '.imgcode', function(){
        $('.passcode').html('<img class="imgcode" src="../includes/imgcode.php" />');
    });
    $('.closeBtn,.close').click(function(){
        $('.keyverificationWrong').hide();
    });

</script>