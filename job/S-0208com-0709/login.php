<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('IN_GD', true);
session_start();
require dirname(__FILE__) . '/includes/init.php';
if (!isset($_COOKIE['frontend_agency_user_id'])) {
	header("Location:index.php");
} else {
	$agent_id = $_COOKIE['frontend_agency_user_id'];
	$info = $db->get($prefix . "agent", "*", array('id' => $agent_id));
	if (!$info) {
		header("Location:ajax.php?act=logout");
		exit;
	}
}
$day_get = $db->query("select SUM(day_get) AS total_day_get FROM " . $prefix . "day_commission WHERE (add_time BETWEEN " . strtotime(date("Y-m-d") . " 00:00:00") . " AND " . strtotime(date("Y-m-d") . " 00:00:00 +1 day") . ") AND agent_user = '" . $_COOKIE['frontend_agency_user'] . "'")->fetchAll();
$total_day_get = $day_get[0][0] ? $day_get[0][0] : 0;

$level_id = $info['level_id'];

$levels = $db->query(" select * from " . $prefix . "level ORDER BY total_bet ")->fetchAll();
$level = array();
$level_next_id = 0;
$level_next_commission = 0;
foreach ($levels as $v) {
	$level[$v['id']] = $v;
	if ($info['total_commission'] < $v['total_bet'] && $level_next_id == 0) {
		$level_next_id = $v['id'];
		$level_next_commission = $v['total_bet'] - $info['total_commission'];
	}
}

$posters = $db->query(" select * from " . $prefix . "poster ORDER BY id ")->fetchAll();
$poster_div = '';
foreach ($posters as $v) {
	$poster_div .= '<li><a><img src="' . $v['img_url'] . '" alt="" data-id="' . $v['id'] . '"></a></li>';
}

$ads = $db->query(" select * from " . $prefix . "sys ORDER BY id ")->fetchAll();
$ad_div = '';
foreach ($ads as $k => $v) {
	$ad_div .= '<div class="terminology">
                    <div id="terminology' . ($k + 1) . '">' . $v['ad'] . '</div>
                    <button class="copy" id="copy" data-clipboard-target="#terminology' . ($k + 1) . '">点击复制</button>
                </div>';
}

$banners = $db->query(" select * from " . $prefix . "banner ORDER BY id ")->fetchAll();
$banner_div = '';
foreach ($banners as $v) {
	$banner_div .= '<li>
                        <a href="' . $v['img_url'] . '" download="banner1"><img src="' . $v['img_url'] . '" alt=""></a>
                    </li>';
}

$tactics = $db->query(" select * from " . $prefix . "tactics ORDER BY id ")->fetchAll();
$tactics_div = '';
$tactics_content_div = '';
$tactic = array();
foreach ($tactics as $v) {
	$tactic[$v['id']] = $v;
	$str = mb_substr(strip_tags($v['content']), 0, 100, 'UTF-8') . (strlen($v['content']) > 100 ? '.......' : '');
	$tactics_div .= '<li>
                        <img src="' . $v['img_url'] . '" alt="">
                        <div class="marketContent">
                            <h3>' . $v['title'] . '</h3>
                            <p>' . $str . '
                            </p>
                            <div><span class="time">' . $v['created_at'] . '</span><span class="more" data-id="' . $v['id'] . '">点击查看</span></div>
                        </div>
                    </li>';
	$tactics_content_div .= '<div class="marketContents marketContent-' . $v['id'] . '">
                                    <p class="goBack"><span class="Back">Back</span> >> <span class="title">' . $v['title'] . '</span></p>
                                    <h1 class="title">' . $v['title'] . '</h1>
                                    <span class="time">' . $v['created_at'] . '</span>
                                    <img src="' . $v['img_url'] . '" alt="">
                                    <div>' . $v['content'] . '</div>
                                </div>';
}

$banners = $db->query(" select * from " . $prefix . "banner ORDER BY id ")->fetchAll();
$banner_div = '';
foreach ($banners as $v) {
	$banner_div .= '<li>
                        <a href="' . $v['img_url'] . '" download="banner1"><img src="' . $v['img_url'] . '" alt=""></a>
                    </li>';
}

$comments = $db->query(" select * from " . $prefix . "comment ORDER BY created_at")->fetchAll();
$comment_div_array = array();
$limit = 500;
foreach ($comments as $v) {

	if ($v['reply_id'] == 0) {
		$content = preg_replace("/\[em_([0-9]{2})\]/", '<img src="arclist/$1.gif" border="0" />', $v['content']);
		$content = preg_replace("/\[em_([0-9])\]/", '<img src="arclist/$1.gif" border="0" />', $content);
		$comment_div_array[$v['id']][0] = '
        <div class="contents">
            <div class="userPic"><img src="' . $v['face_img'] . '"></div>
            <div class="content">
                <div class="userName"><a href="javascript:;">' . ($v['show_name'] == 1 ? substr($v['name'], 0, 2) . str_pad('', strlen(substr($v['name'], 2, -2)), '*') . substr($v['name'], -2) : '匿名') . '</a></div>
                <div class="msgInfo">' . $content . '</div>
                <div class="times"><span>' . date('m月d日 H:i', strtotime($v['created_at'])) . '</span></div>
            </div>
        </div>';
		if (count($comment_div_array) > $limit) {
			array_pop($comment_div_array);
			break;
		}
	} elseif ($v['reply_id'] != 0) {

		$comment_div_array[$v['reply_id']][] = '
            <div class="answer">
                <div class="managerPic"><img src="images/managerPic.jpg"></div>
                <div class="content">
                    <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                    <div class="msgInfo">' . $content . '</div>
                    <div class="times">' . date('m月d日 H:i', strtotime($v['created_at'])) . '</div>
                </div>
            </div>';
	}
}

$comment_one_page_count = 20;
$comment_max_show_page = 7;
$comment_div = '';
$comment_count = 0;
$comment_page_count = 1;
$comment_page = '<li class="comment_page" data-id="1">' . $comment_page_count . '</li>';
$last_page = array();
foreach ($comment_div_array as $v) {

	$str = '';
	foreach ($v as $k => $w) {
		if ($k == 0) {
			$str .= '<li>' . $w . '<div class="answers">';
		} else {
			$str .= $w;
		}
	}

	// if ($page_count % 100 == 1 && $page_count != 1) {
	// 	$comment_div .= '</ul><ul>';
	// }
	if ($comment_count % $comment_one_page_count == 0 && $comment_count != 0) {
		$comment_page_count++;
		$str .= '</ul><ul class="comment" id="comment_page_' . ($comment_page_count) . '" style="display: none;">';
		// array_shift($last_page);
		// array_push($last_page, '<li class="comment_page" data-id="' . $comment_page_count . '">' . $comment_page_count . '</li>');
		// if ($comment_page_count >= $comment_max_show_page + 1) {
		// 	if ($comment_page_count == $comment_max_show_page + 1) {
		// 		$comment_page .= '<li class="dot">......</li>';
		// 	}
		// } else {
		$comment_page .= '<li class="comment_page" data-id="' . $comment_page_count . '">' . $comment_page_count . '</li>';
		// }
	} else {
		$str .= '';
	}
	$comment_count++;
	$comment_div = $str . $comment_div;

}
if ($comment_page_count >= $comment_max_show_page + 1) {
	foreach ($last_page as $v) {
		$comment_page .= $v;
	}
}
?>


<!DOCTYPE html>
<html lang="zh-Hans">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="澳门银河VIP线路中心">
    <meta name="listBox-contentcription" content="澳门银河VIP线路中心">
    <title>代理登入</title>
    <?php include './index/metadata.php'; ?>
    <link rel="stylesheet" href="css/messageboard.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/messageboard.js"></script>
    <script type="text/javascript" src="js/jquery.qrcode.js"></script>
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
                <div class="information">
                    <a class="logout" href="ajax.php?act=logout">退出登录</a>
                    <div class="memberinfo"><img src="images/person.png" alt="">尊敬的<span class="account" id="userName"><?=$info['agent_name']?></span></div>
                    <div class="marquee">
                        <marquee style="color: #000;background-color: #fff;">澳门银河2018年实力打造新会员三重礼包：①注册自动送28元；②存18送18元，最高1888元；③完成指定有效投注，可获5次新人奖；当日注册次日还可以抢红包！5月15日-【澳门银河7周年盛典】：彰显注册年份价值、彰显历史存款价值、彰显VIP账号价值，更多回馈内容火热筹备中！现在注册、存款在周年庆期间皆可领钱，错过再等一年！</marquee>
                    </div>
                </div>
                <div id="abgne-block" class="content_box">
                    <div class="bd contentAll">
                        <div class="content_list">
                            <ul>
                                <li class="on">
                                    <a>数据中心</a>
                                </li>
                                <li>
                                    <a>推广海报</a>
                                </li>
                                <li>
                                    <a>推广术语</a>
                                </li>
                                <li>
                                    <a>广告横幅</a>
                                </li>
                                <li>
                                    <a>营销策略</a>
                                </li>
                                <li>
                                    <a>留言板</a>
                                </li>
                            </ul>
                        </div>
                        <div class="info info1 on">
                            <div class="contentPush">
                                <ul>
                                    <li>推广链接：<span id="link"><?=$info['agent_url']?></span><button class="copy" id="copy" data-clipboard-target="#link">复制</button></li>
                                    <li class="QRli">推广二维码<span class="QR"><img src="images/QRcode.jpg"></span></li>
                                    <li>代理等级：<span class="level"><?=$level[$level_id]['level_name']?></span></li>
                                    <li>距下次晋级需获取<span class="nextmoney"><?=$level_next_commission?></span>佣金</li>
                                </ul>
                            </div>
                            <div class="datasheets">
                                <ul>数据列表 快捷选时：
                                    <li class="today active" onclick="toDay()">今天</li>
                                    <li class="yesterday" onclick="yesterDay()">昨天</li>
                                    <li class="thisweek" onclick="thisWeek()">本周</li>
                                    <li class="lastweek" onclick="lastWeek()">上周</li>
                                    <li class="thismon" onclick="thisMon()">本月</li>
                                    <li class="lastmon" onclick="lastMon()">上月</li>
                                </ul>
                                <p class="dateRange">开始日期：<span class="STdate"><input type="text" name="STdate" value="2018-07-03 00:00:00"></span>结束日期：<span class="EDdate"><input type="text" name="EDdate" value="2018-07-03 23:59:59"></span><a class="searchBtn">提交</a></p>
                                <table cellpadding="0" cellspacing="0" border="0">
                                    <tbody>
                                        <tr>
                                            <th>存款金额</th>
                                            <th>有效投注</th>
                                            <th>总注单量</th>
                                            <th>总盈利金额</th>
                                        </tr>
                                        <tr>
                                            <td class="save_gold"><?=$info['total_save_gold']?></td>
                                            <td class="bind_user"><?=$info['total_user_bet']?></td>
                                            <td class="valid_num"><?=$info['total_user_num']?></td>
                                            <td class="user_win"><?=$info['total_win']?></td>
                                        </tr>
                                        <tr>
                                            <td>可获佣金</td>
                                            <td>累计佣金</td>
                                            <td>累计晋级金</td>
                                            <td>累计好运金</td>
                                        </tr>
                                        <tr>
                                            <td class="day_get"><?=$total_day_get?></td>
                                            <td><?=$info['total_commission']?></td>
                                            <td><?=$info['total_up_gold']?></td>
                                            <td><?=$info['total_lucky_gold']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="downloadQR">
                                <a class="QRcode" href="images/QRcode.jpg" download="QRcode"><img csrc="images/QRcode.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="info info2">
                            <h3></h3>
                            <ul class="poster">
                                <?=$poster_div?>
                                <!-- <li>
                                    <a><img src="images/poster1-1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster1-2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster1-3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster1-4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster1-5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster1-6.jpg" alt=""></a>
                                </li> -->
                            </ul>
                            <!-- <ul class="poster">
                                <li>
                                    <a><img src="images/poster2-1.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster2-2.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster2-3.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster2-4.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster2-5.jpg" alt=""></a>
                                </li>
                                <li>
                                    <a><img src="images/poster2-6.jpg" alt=""></a>
                                </li>
                            </ul> -->
                            <div class="downloadPoster">
                                <a><img src="" alt=""></a>
                                <div class="data">
                                    <span>联系方式：<input type="text" name="poster_connect" placeholder="您的联系方式"></span>
                                    <span>如： QQ:785190000</span>
                                    <span>推广网址：<input type="text" name="poster_net" placeholder="您的推广链接"></span>
                                    <span>如： 0208.com</span>
                                    <a class="downloadA" href="" download="poster"><button>开始制作</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="info info3">
                            <?=$ad_div?>
                            <!-- <div class="terminology">
                                <p id="terminology1">澳门银河2018年实力打造新会员三重礼包：①注册自动送28元；②存18送18元，最高1888元；③完成指定有效投注，可获5次新人奖；当日注册次日 还可以抢红包！5月15日-【澳门银河7周年盛典】：彰显注册年份价值、彰显历史存款价值、彰显VIP账号价值，更多回馈内容火热筹备中！现在注 册、存款在周年庆期间皆可领钱，错过再等一年！
                                    <br> ★★★★贵宾注册网址： （加上您的推广链接即可）★★★★</p>
                                <button class="copy" id="copy" data-clipboard-target="#terminology1">点击复制</button>
                            </div>
                            <div class="terminology">
                                <p id="terminology2">澳门银河 ღ 优秀玩家的首选平台
                                    <br>1.新会员注册自动送28元圆梦金，次日还可免费抢红包；
                                    <br>2.首存18元送18元，最高可获1888元，还可获得5次新人奖；
                                    <br>2.投注1元自动晋级VIP，升级可领取高达88888元晋级彩金；
                                    <br> 3.一日会员，终身有钱，周工资、月薪水无条件准时派送；
                                    <br>4.六合彩49倍，PK10、时时彩9.88倍，承诺只升倍不降倍；
                                    <br> 5.五大电子平台，12大电子游艺专题，百万彩金天天赠送；
                                    <br> 6.八大视讯平台，返水1.1%起，更有多项视讯彩金等您尊享！
                                    <br> ★★★★贵宾注册网址： （加上您的推广链接即可）★★★★</p>
                                <button class="copy" id="copy" data-clipboard-target="#terminology2">点击复制</button>
                            </div> -->
                        </div>
                        <div class="info info4">
                            <ul class="posterbanner">
                                <?=$banner_div?>
<!--                                 <li>
                                    <a href="images/banner1.gif" download="banner1"><img src="images/banner1.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href="images/banner2.gif" download="banner2"><img src="images/banner2.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href="images/banner3.gif" download="banner3"><img src="images/banner3.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href="images/banner4.gif" download="banner4"><img src="images/banner4.gif" alt=""></a>
                                </li>
                                <li>
                                    <a href="images/banner5.gif" download="banner5"><img src="images/banner5.gif" alt=""></a>
                                </li> -->

                            </ul>
                            <p><span class="red">温馨提示：</span>以上图片仅供参考，您可以联系代理专员定制您的专属广告横幅，一切以代理专员提供的广告横幅为准。</p>
                        </div>
                        <div class="info info5">
                            <div class="info5Content">
                                <img src="images/markeBanner.png" alt="" srcset="">
                                <ul>
                                    <?=$tactics_div?>
<!--                                     <li>
                                        <img src="images/fruitShop.jpg" alt="">
                                        <div class="marketContent">
                                            <h3>人性营销：水果店用微信轻松实现创富</h3>
                                            <p>我今天给大家分享一个案例：我们小区的水果店是怎么用一年突破150万营业额的。这<br>
                                                <br> 人性是需要思考，需要不断感受的。如果是学习专业户，看过之后就会觉得明白了，.......
                                            </p>
                                            <div><span class="time">2017-07-07 13:17:15</span><span class="more" data-id="1">点击查看</span></div>
                                        </div>
                                    </li> -->
                                    <!-- <li>
                                <img src="images/fruitShop.jpg" alt="">
                                <div class="marketContent">
                                    <h3>人性营销：水果店用微信轻松实现创富</h3>
                                    <p>我今天给大家分享一个案例：我们小区的水果店是怎么用一年突破150万营业额的。这<br>
                                        <br> 人性是需要思考，需要不断感受的。如果是学习专业户，看过之后就会觉得明白了，.......
                                    </p>
                                    <div><span class="time">2017-07-07 13:17:15</span><span class="more" data-id="2">点击查看</span></div>
                                </div>
                            </li> -->
                                </ul>
                            </div>
                            <div class="info5More">
                                <?=$tactics_content_div?>
                                <!-- <div class="marketContents marketContent-1">
                                    <p class="goBack"><span class="Back">Back</span> >> <span class="title">人性营销：水果店用微信轻松实现创富</span></p>
                                    <h1 class="title">人性营销：水果店用微信轻松实现创富</h1>
                                    <span class="time">2017-07-07 13:17:15</span>
                                    <img src="images/fruitShop.jpg" alt="">
                                    <p>我今天給大家分享一个案例：我们小区的水果店是怎么用一年突破150万营业额的。这个案例是我亲自策划指导，所以我就可以把里面的原理给大家详细分析。看看“人性”是怎么在营销逻辑中起作用的，我们又是怎么利用“人性”来实现年营业额突破150万的。<br> 人性是需要思考，需要不断感受的。如果是学习专业户，看过之后就会觉得明白了，但是实际操作中仍然会自动进入“利己”的漩涡，至少导致某个环节失效，引起连锁性方案失败。
                                        <br> 当你理解了人性，就可以在营销的每个环节、每个互动、每个话术中使用它，而不是我、我们怎样怎样，如果总是强调你自己，没有人会理你，因为没有人关心你是谁，除非你能帮到他。
                                    </p>
                                </div> -->
                                <!-- <div class="marketContents marketContent-2">

                        </div> -->
                            </div>
                        </div>
                        <div class="info info6">
                            <div id="msgBox">
                                <p class="littletitle">发表您的留言 </p>
                                <form>
                                    <div class="textBox">
                                        <span class="emotionList">
                                            <span class="emotion"><img src="images/smail.png" alt="" srcset=""> 表情 v</span>
                                            <span class="head">變更頭像 v</span>
                                            <div id="headbox" style="position: absolute; z-index: 1000; top: 29px; left: 10px;">
                                                <table border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                        <tr>
                                                            <td><img src="images/head_1.jpg"></td>
                                                            <td><img src="images/head_2.jpg"></td>
                                                            <td><img src="images/head_3.jpg"></td>
                                                            <td><img src="images/head_4.jpg"></td>
                                                            <td><img src="images/head_5.jpg"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="images/head_6.jpg"></td>
                                                            <td><img src="images/head_7.jpg"></td>
                                                            <td><img src="images/head_8.jpg"></td>
                                                            <td><img src="images/head_9.jpg"></td>
                                                            <td><img src="images/head_10.jpg"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="images/head_11.jpg"></td>
                                                            <td><img src="images/head_12.jpg"></td>
                                                            <td><img src="images/head_13.jpg"></td>
                                                            <td><img src="images/head_14.jpg"></td>
                                                            <td><img src="images/head_15.jpg"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="images/head_16.jpg"></td>
                                                            <td><img src="images/head_17.jpg"></td>
                                                            <td><img src="images/head_18.jpg"></td>
                                                            <td><img src="images/head_19.jpg"></td>
                                                            <td><img src="images/head_20.jpg"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="images/head_21.jpg"></td>
                                                            <td><img src="images/head_22.jpg"></td>
                                                            <td><img src="images/head_23.jpg"></td>
                                                            <td><img src="images/head_24.jpg"></td>
                                                            <td><img src="images/head_25.jpg"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><img src="images/head_26.jpg"></td>
                                                            <td><img src="images/head_27.jpg"></td>
                                                            <td><img src="images/head_28.jpg"></td>
                                                            <td><img src="images/head_29.jpg"></td>
                                                            <td><img src="images/head_30.jpg"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </span>
                                        <textarea id="conBox" class="input f-text" name="conBox">评论有你更精彩！</textarea>
                                        <div class="tr">
                                            <button type="button" id="sendBtn" title="快捷键 Ctrl+Enter" class="" data-id="<?=$info['id']?>">发布</button>
                                            <input type="checkbox" name="noname" id="noname"> 匿名留言
                                        </div>
                                    </div>
                                </form>
                                <div class="list">

                                    <ul class="comment" id="comment_page_1">
                                        <?=$comment_div?>
                                        <!--<li class="">

                                            <div class="contents">
                                                <div class="userPic"><img src="images/face625.png"></div>
                                                <div class="content">
                                                    <div class="userName"><a href="javascript:;">幸福就好</a></div>
                                                    <div class="msgInfo">朋友介绍过来澳门银河的，感觉还不错</div>
                                                    <div class="times"><span>06月28日 21:14</span></div>
                                                </div>
                                            </div>
                                            <div class="answers">
                                                <div class="answer">
                                                    <div class="managerPic"><img src="images/managerPic.jpg"></div>
                                                    <div class="content">
                                                        <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                                                        <div class="msgInfo"><img src="arclist/1.gif" border="0" class=""></div>
                                                        <div class="times"><span>06月28日 21:14</span></div>
                                                    </div>
                                                </div>
                                                <div class="answer">
                                                    <div class="managerPic"><img src="images/managerPic.jpg"></div>
                                                    <div class="content">
                                                        <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                                                        <div class="msgInfo">谢谢信任</div>
                                                        <div class="times"><span>06月28日 21:14</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="">
                                            <div class="contents">
                                                <div class="userPic"><img src="images/face628.png"></div>
                                                <div class="content">
                                                    <div class="userName"><a href="javascript:;">幸福就好</a></div>
                                                    <div class="msgInfo">世界杯买那个队呀，那个高手给点意见。</div>
                                                    <div class="times"><span>06月28日 21:13</span></div>
                                                </div>
                                            </div>
                                            <div class="answers">
                                                <div class="answer">
                                                    <div class="managerPic"><img src="images/managerPic.jpg"></div>
                                                    <div class="content">
                                                        <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                                                        <div class="msgInfo"><img src="arclist/1.gif" border="0" class=""></div>
                                                        <div class="times"><span>06月28日 21:14</span></div>
                                                    </div>
                                                </div>
                                                <div class="answer">
                                                    <div class="managerPic"><img src="images/managerPic.jpg"></div>
                                                    <div class="content">
                                                        <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                                                        <div class="msgInfo">谢谢信任</div>
                                                        <div class="times"><span>06月28日 21:14</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="contents">
                                                <div class="userPic"><img src="images/face628.png"></div>
                                                <div class="content">
                                                    <div class="userName"><a href="javascript:;">幸福就好</a></div>
                                                    <div class="msgInfo">银河平台信誉有保障，在银河做代理放心。介绍朋友来玩，不怕被黑。</div>
                                                    <div class="times"><span>06月27日 20:08</span></div>
                                                </div>
                                            </div>
                                            <div class="answers">
                                                <div class="answer">
                                                    <div class="managerPic"><img src="images/managerPic.jpg"></div>
                                                    <div class="content">
                                                        <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                                                        <div class="msgInfo"><img src="arclist/1.gif" border="0" class=""></div>
                                                        <div class="times"><span>06月28日 21:14</span></div>
                                                    </div>
                                                </div>
                                                <div class="answer">
                                                    <div class="managerPic"><img src="images/managerPic.jpg"></div>
                                                    <div class="content">
                                                        <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                                                        <div class="msgInfo">谢谢信任</div>
                                                        <div class="times"><span>06月28日 21:14</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="page">
                                    <div class="_page">
                                        <ul id='comment_page_space'>
                                            <?=$comment_page?>
<!--                                             <li>1</li>
                                            <li>2</li>
                                            <li>3</li>
                                            <li>4</li>
                                            <li>5</li>
                                            <li class="dot">......</li>
                                            <li>19</li>
                                            <li>20</li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer-->
        <div id="footer"><?php include './index/footer.php'; ?></div>

    </div>
    <div class="TOP" style="display: none;">
        <a><img src="images/top.png" alt="" srcset="" style="width:50px;"></a>
    </div>
    <script>

        function generateQrcode(base64) {
            var options = {
                render: 'image',
                text: base64,
                size: 29,
                ecLevel: 'M',
                color: '#222222',
                minVersion: 1,
                quiet: 1,
                mode: 0
            };
            $(".QR").empty().qrcode(options);
            var options_big = {
                render: 'image',
                text: base64,
                size: 180,
                ecLevel: 'M',
                color: '#222222',
                minVersion: 1,
                quiet: 1,
                mode: 0
            };
            $(".QRcode").empty().qrcode(options_big);

        }

        $(function () {
            var base64 = 'http://<?=$info['agent_url']?>';
            generateQrcode(base64);

             setTimeout(function() {
                $('.loading').hide();
            }, 3800);

        })

        $('body').on('click', '.comment_page', function() {
            var page = $(this).attr('data-id');
            // var comment_max_show_page = '<?=$comment_max_show_page?>';
            // var comment_one_page_count = '<?=$comment_one_page_count?>';
            // var comment_page_count = '<?=$comment_page_count?>';
            // var comment_page_html = '';


            // for(var i = 1; i < comment_page_count; i++){
            //     if(i > page - 3 && i <= comment_max_show_page){
            //         if(i == comment_max_show_page){
            //             comment_page_html += '<li class="dot">......</li>'
            //         }else{
            //             comment_page_html += '<li class="comment_page" data-id="' + i + '">' + i + '</li>';
            //         }

            //     }
            // }

            // $('#comment_page_space').html(comment_page_html);
            $('.comment').hide();
            $('#comment_page_' + page).show();

        });

        $('.searchBtn').on('click', function(){
            var EDdate = $('input[name="EDdate"]').val();
            var STdate = $('input[name="STdate"]').val();
            $.ajax({
                type: 'post',
                url: 'ajax.php?act=search_commission',
                data: {
                    EDdate: EDdate,
                    STdate: STdate,
                },
                dataType: 'json',
                success: function(data) {
                    if(data.type == 'success'){
                        $('.save_gold').html('<span style="color:red">' + data.commission.save_gold + '</span>');
                        $('.bind_user').html('<span style="color:red">' + data.commission.bind_user + '</span>');
                        $('.valid_num').html('<span style="color:red">' + data.commission.valid_num + '</span>');
                        $('.user_win').html('<span style="color:red">' + data.commission.user_win + '</span>');
                        $('.day_get').html('<span style="color:red">' + data.commission.day_get + '</span>');

                        //swal('', data.commission, 'success');

                    }else if(data.type == 'fail'){
                        swal('', data.msg, 'error');
                    }

                }
            });
        });
        function replace_em(str) {
            str = str.replace(/\</g, '&lt;');
            str = str.replace(/\>/g, '&gt;');
            str = str.replace(/\n/g, '<br/>');
            str = str.replace(/\[em_([0-9]*)\]/g, '<img src="arclist/$1.gif" border="0" />');
            return str;
        }

        var headSrc = "images/face625.png";
        $('#headbox td img').click(function() {
            headSrc = $(this).attr("src");
            // $('#headbox').hide();
        });

        $('#sendBtn').on('click', function(){
            var conBox = $('#conBox').val();
            var agent = '<?=$info['id']?>';
            var show_name = $('#noname').attr('checked') ? 0 : 1;
            var face_img = headSrc;
            $.ajax({
                type: 'post',
                url: 'ajax.php?act=add_comment',
                data: {
                    face_img: face_img,
                    agent: agent,
                    conBox: conBox,
                    show_name: show_name,
                },
                dataType: 'json',
                success: function(data) {
                    if(data.type == 'success'){

                    }else if(data.type == 'fail'){
                        swal('', data.msg, 'error');
                    }

                }
            });
        });


		$('.footer_content img').attr("src", "images/footer_6.jpg");
        $('body').css("background", "linear-gradient(to right, rgb(31, 28, 36), rgb(40, 33, 35), rgb(54, 54, 56))");

        $(window).scroll(function() {
            var scrollVal = $(this).scrollTop();

            if (scrollVal > 200) {
                $('.TOP').css("display", "block");
            } else {
                $('.TOP').css("display", "none");
            }
        });

        $('.TOP').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 500);
            return false;
        });
    </script>
    <script>
        $(function() {
            //6欄顯示切換
            var $block = $('#abgne-block');
            $('#abgne-block .content_list ul li').click(function() {
                var $this = $(this);
                $this.add($('.bd div.info', $block).eq($this.index())).addClass('on').siblings('.on').removeClass('on');
            });

            //公佈欄內容切換
            $('.info5Content .more').click(function() {
                var id = $(this).attr("data-id");
                $('.info5More').show();
                $('.info5More .marketContent-' + id).css("display", "flex");
            });
            $('.info5More .Back').click(function() {
                $('.info5More').hide();
                $('.info5More .marketContents').hide();
            });


            //下載海報
            $('.poster li a').click(function(e) {
                $('.downloadPoster').show();
                e.stopPropagation();
                e.preventDefault();
                var src0 = $(this).find('img').attr('src');
                var id = $(this).find('img').data("id");
                var connect = $('input[name=poster_connect]').val();
                var net = $('input[name=poster_net]').val();
                var src = 'test.php?post_id=' + id + '&url=' + net + '&code=' + connect;



                $('.downloadPoster img').attr('src', src0);
                $('.downloadPoster .downloadA').attr('href', src);
                $('.downloadPoster .downloadA').attr('data-id', id);
            });

            $('.downloadPoster .data .downloadA').click(function() {
                var id = $('.downloadPoster .downloadA').attr('data-id');
                var connect = $('input[name=poster_connect]').val();
                var net = $('input[name=poster_net]').val();
                var src = 'test.php?post_id=' + id + '&url=' + net + '&code=' + connect;
                $('.downloadPoster .downloadA').attr('href', src);
                $('.downloadPoster').hide();
                $('.downloadPoster .data').hide();
            });

            $('.downloadPoster>a').click(function(e) {
                $('.downloadPoster .data').css("display", "flex");
                e.stopPropagation();
                e.preventDefault();
            });
            $(document).click(function() {
                $('.downloadPoster .data').hide();
                $('.downloadPoster').hide();
            });
            $('.downloadPoster .data').click(function(e) {
                e.stopPropagation();
            });


            //下載二維碼

            $('.downloadQR a').click(function() {
                $('.downloadQR').hide();
            });
            $("#conBox").focus(function() {
                if (this.value == this.defaultValue) {
                    this.value = '';
                }
            });

            $("#conBox").blur(function() {
                if (this.value == '') {
                    this.value = this.defaultValue;
                }
            });
            $('.downloadQR').hide();
            $('.QRli').click(function(e) {
                $('.downloadQR').show();
                e.stopPropagation();
                e.preventDefault();
            });
            $(document).click(function() {
                $('.downloadQR').hide();
            });
            $('.downloadQR').click(function(e) {
                e.stopPropagation();
            });
        });
    </script>
    <script>
        new Clipboard("#copy");
    </script>
    <script>
        //  日期查詢切換
        var nowyear = new Date().getUTCFullYear();
        var nowmon = parseInt(("0" + parseInt(new Date().getUTCMonth() + 1)).slice(-2));
        var nowDate = ("0" + new Date().getUTCDate()).slice(-2);
        var nowweek = new Date().getUTCDay();

        function toDay() {
            var today = nowyear + "-" + nowmon + "-" + nowDate;
            $('.STdate input').val(today + " 00:00:00");
            $('.EDdate input').val(today + " 23:59:59");
        }

        function yesterDay() {
            var yesterday = nowyear + "-" + nowmon + "-" + parseInt(nowDate - 1);
            $('.STdate input').val(yesterday + " 00:00:00");
            $('.EDdate input').val(yesterday + " 23:59:59");
        }

        function thisWeek() {
            var NdayF = parseInt(nowDate - nowweek + 1);
            var NdayL = parseInt(nowDate - nowweek + 7);
            var lastday, thisWeekF, thisWeekL, lastday2;
            if (nowmon == 2) {
                lastday = 28;
            } else if (nowmon == 4 || nowmon == 6 || nowmon == 9 || nowmon == 11) {
                lastday = 30;
            } else {
                lastday = 31;
            }
            if (NdayF > lastday) {
                if ((nowmon - 1) == 2) {
                    lastday2 = 28;
                } else if ((nowmon - 1) == 4 || (nowmon - 1) == 6 || (nowmon - 1) == 9 || (nowmon - 1) == 11) {
                    lastday2 = 30;
                } else {
                    lastday2 = 31;
                }
                var NNdayF = lastday + lastday2 - NdayF
                thisWeekF = nowyear + "-" + (nowmon - 1) + "-" + NNdayF;
            } else if (NdayF < 0) {
                if ((nowmon - 1) == 2) {
                    lastday2 = 28;
                } else if ((nowmon - 1) == 4 || (nowmon - 1) == 6 || (nowmon - 1) == 9 || (nowmon - 1) == 11) {
                    lastday2 = 30;
                } else {
                    lastday2 = 31;
                }
                var NNdayF = lastday2 + NdayF
                thisWeekF = nowyear + "-" + (nowmon - 1) + "-" + NNdayF;
            } else {
                thisWeekF = nowyear + "-" + nowmon + "-" + NdayF;
            }
            if (NdayL > lastday) {
                var NNdayL = NdayL - lastday;
                thisWeekL = nowyear + "-" + (nowmon + 1) + "-" + NNdayL;
            } else {
                thisWeekL = nowyear + "-" + nowmon + "-" + NdayL;
            }
            $('.STdate input').val(thisWeekF + " 00:00:00");
            $('.EDdate input').val(thisWeekL + " 23:59:59");
        }

        function lastWeek() {
            var NdayF = parseInt(nowDate - nowweek + 1 - 7);
            var NdayL = parseInt(nowDate - nowweek + 7 - 7);
            var lastday, lastWeekF, lastWeekL, lastday2;
            if (nowmon == 2) {
                lastday = 28;
            } else if (nowmon == 4 || nowmon == 6 || nowmon == 9 || nowmon == 11) {
                lastday = 30;
            } else {
                lastday = 31;
            }
            if (NdayF > lastday) {
                if ((nowmon - 1) == 2) {
                    lastday2 = 28;
                } else if ((nowmon - 1) == 4 || (nowmon - 1) == 6 || (nowmon - 1) == 9 || (nowmon - 1) == 11) {
                    lastday2 = 30;
                } else {
                    lastday2 = 31;
                }
                var NNdayF = lastday + lastday2 - NdayF
                lastWeekF = nowyear + "-" + (nowmon - 1) + "-" + NNdayF;
            } else if (NdayF < 0) {
                if ((nowmon - 1) == 2) {
                    lastday2 = 28;
                } else if ((nowmon - 1) == 4 || (nowmon - 1) == 6 || (nowmon - 1) == 9 || (nowmon - 1) == 11) {
                    lastday2 = 30;
                } else {
                    lastday2 = 31;
                }
                var NNdayF = lastday2 + NdayF
                lastWeekF = nowyear + "-" + (nowmon - 1) + "-" + NNdayF;
            } else {
                lastWeekF = nowyear + "-" + nowmon + "-" + NdayF;
            }
            if (NdayL > lastday) {
                var NNdayL = NdayL - lastday;
                lastWeekL = nowyear + "-" + (nowmon + 1) + "-" + NNdayL;
            } else {
                lastWeekL = nowyear + "-" + nowmon + "-" + NdayL;
            }

            $('.STdate input').val(lastWeekF + " 00:00:00");
            $('.EDdate input').val(lastWeekL + " 23:59:59");
        }

        function thisMon() {
            var lastday;
            if (nowmon == 2) {
                lastday = 28;
            } else if (nowmon == 4 || nowmon == 6 || nowmon == 9 || nowmon == 11) {
                lastday = 30;
            } else {
                lastday = 31;
            }
            var thisMonF = nowyear + "-" + nowmon + "-" + "01";
            var thisMonL = nowyear + "-" + nowmon + "-" + lastday;
            $('.STdate input').val(thisMonF + " 00:00:00");
            $('.EDdate input').val(thisMonL + " 23:59:59");
        }

        function lastMon() {
            var lastmon = parseInt(nowmon - 1);
            var lastday;
            if (lastmon == 2) {
                lastday = 28;
            } else if (lastmon == 4 || lastmon == 6 || lastmon == 9 || lastmon == 11) {
                lastday = 30;
            } else {
                lastday = 31;
            }
            var lastMonF = nowyear + "-" + ("0" + lastmon).slice(-2) + "-" + "01";
            var lastMonL = nowyear + "-" + ("0" + lastmon).slice(-2) + "-" + lastday;
            $('.STdate input').val(lastMonF + " 00:00:00");
            $('.EDdate input').val(lastMonL + " 23:59:59");
        }
        toDay();

        $('.datasheets ul li').click(function() {
            $(this).addClass('active').siblings().removeClass('active');
        });
    </script>

    <script>
        $(function() {
            for (var i = 0; i < $(".poster li").length; i++) {
                var num = ("0" + (i + 1)).substr(-2, 2);
                $(".poster li").eq(i).append("<span>" + num + "</span>");
            }
        });
    </script>

</html>

</html>