<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('IN_GD', true);
require dirname(__FILE__) . '/../includes/init.php';
// $info = $db->get($prefix . "sys", "*", array('id' => '1'));

$myip = $_SERVER['REMOTE_ADDR'];
$ip = $db->get($prefix . "ip", "*", array('ip' => $myip));
if (!$ip) {
	exit;
}
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1">
    <meta name="keywords" content="澳门银河VIP线路中心">
    <meta name="listBox-contentcription" content="澳门银河VIP线路中心">
    <title>代理价值</title>
    <?php include './metadata.php'; ?>
    <link rel="stylesheet" type="text/css" href="css/value.css">
</head>

<body style="overflow-x: hidden;">
    <!--头部-->
    <div class="top">
        <div id="header"><?php include './header.php'; ?></div>
        <!--代理查詢-->
        <div class="test_msg">
            <div class="test_msg_box">
                <div class="listBox program">
                    <div class="listBoxTitle programTitle"><img src="../images/programTitle.jpg" alt=""></div>
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
                    <div class="listBoxTitle worthTitle"><img src="../images/worthTitle.jpg" alt=""></div>
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
                                </tr>
                                <tr>
                                    <td class="tbl-th">累计佣金</td>
                                    <td>1+</td>
                                    <td>1万+</td>
                                    <td>10万+</td>
                                    <td>50万+</td>
                                    <td>100万+</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">每月有效会员</td>
                                    <td>1+</td>
                                    <td>10+</td>
                                    <td>30+</td>
                                    <td>50+</td>
                                    <td>100+</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">晋级彩金</td>
                                    <td>--</td>
                                    <td>388</td>
                                    <td>888</td>
                                    <td>1888</td>
                                    <td>3888</td>
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
                                </tr>
                                <tr>
                                    <td class="tbl-th">代理专属链接</td>
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

                                </tr>
                                <tr class="Fline">
                                    <th style="width:160px;">晋级标准</th>
                                    <th>LV6</th>
                                    <th>LV7</th>
                                    <th>LV8</th>
                                    <th>LV9</th>
                                    <th>LV10</th>
                                </tr>
                                <tr>
                                    <td class="tbl-th">累计佣金</td>
                                    <td>200万+</td>
                                    <td>500万+</td>
                                    <td>800万+</td>
                                    <td>1000万+</td>
                                    <td>1500万+</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">每月有效会员</td>
                                    <td>200+</td>
                                    <td>300+</td>
                                    <td>500+</td>
                                    <td>800+</td>
                                    <td>1000+</td>
                                </tr>
                                <tr>
                                    <td class="tbl-th">晋级彩金</td>
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
                                </tr>
                                <tr>
                                    <td class="tbl-th">代理专属链接</td>
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
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="listBox directions">
                    <div class="listBoxTitle directionsTitle"><img src="../images/directionsTitle.jpg" alt=""></div>
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
                    <div class="listBoxTitle treatyTitle"><img src="../images/treatyTitle.jpg" alt=""></div>
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
    <div id="footer"><?php include './footer.php'; ?></div>
    <script>
        wow = new WOW({
            animateClass: 'animated',
            offset: 200,
            callback: function(box) {
                console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
            }
        });
        wow.init();

        $(window).scroll(function() {
            var scrollVal = $(this).scrollTop();

            if (scrollVal > 600) {
                $(".inquire").css({
                    "position": "fixed",
                    "top": "50px",
                    "left": "50%",
                    "transform": "translateX(-50%)",
                    "width": "1000px",
                    "z-index": "999"
                });

            } else {
                $(".inquire").css({
                    "width": "100%",
                    "position": "relative",
                    "top": "0px"
                });
            }
        });
        $('#vipModal .closeBtn').click(function() {
            $('.login').parent().css("display", "block");
        });
    </script>

</html>