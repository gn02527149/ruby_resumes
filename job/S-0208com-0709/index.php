<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('IN_GD', true);
require_once dirname(__FILE__) . '/includes/init.php';
$info = $db->get($prefix . "sys", "*", array('id' => '1'));

$myip = $_SERVER['REMOTE_ADDR'];
$ip = $db->get($prefix . "ip", "*", array('ip' => $myip));
if (! $ip) {
	exit;
}

$login = 0;
if (isset($_COOKIE['frontend_agency_user_id'])) {
	$login = 1;
}

// 初始 (有進首頁的判斷)
$_SESSION['init'] = 1;
?>


<!DOCTYPE html>
<html lang="zh-Hans">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="澳门银河VIP线路中心">
    <meta name="description" content="澳门银河VIP线路中心">
    <title>代理首页</title>
    <?php include './index/metadata.php'; ?>
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
        <div id="jquery_jplayer"></div>
        <div id="jp_container" class="player">
            <a class="jp-play" href="#"></a>
            <a class="jp-pause" href="#"></a>
        </div>

        <div id="banner"><?php include './index/banner.php'; ?></div>

        <!--代理查詢-->
        <div class="test_msg wow fadeInUp">
            <div class="test_msg_box">
                <div class="process">
                    <img src="images/process.png" alt="" srcset="">
                    <div class="process_content">
                        <div class="process_content_box">
                            <img class="box_img_1" src="images/process1.png" alt="">
                            <img class="box_img_1 Dnone" src="images/process01.png" alt="">
                            <h6>开 通 代 理</h6>
                            <p>REGISTERED Agent</p>
                        </div>
                        <div class="process_content_box">
                            <img class="box_img_2" src="images/process2.png" alt="">
                            <img class="box_img_2 Dnone" src="images/process02.png" alt="">
                            <h6>查询推广网址</h6>
                            <p>Promote the website</p>
                        </div>
                        <div class="process_content_box">
                            <img class="box_img_3" src="images/process3.png" alt="">
                            <img class="box_img_3 Dnone" src="images/process03.png" alt="">
                            <h6>开 始 推 广</h6>
                            <p>start marketing</p>
                        </div>
                        <div class="process_content_box">
                            <img class="box_img_4" src="images/process4.png" alt="">
                            <img class="box_img_4 Dnone" src="images/process04.png" alt="">
                            <h6>佣金自动派送</h6>
                            <p>commission to send</p>
                        </div>
                    </div>
                </div>
                <div class="inquire" style="display: <?=$login == 1 ? 'none' : 'block'?>;"><input type="text" name="username1" value="" placeholder="请输入代理帐号" onfocus="this.placeholder=''" onblur="this.placeholder='请输入代理帐号'"><button class="login"></button></div>
                <div class="leaderboard">
                    <div class="title"><img src="images/leaderboardTitle.png" alt="" srcset=""></div>
                    <div class="board">
                        <div id="marquee2">
                            <ul>
                                <li><span class="num">1</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">2</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">3</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">4</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">5</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">6</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">7</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">8</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">9</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">10</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">11</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">12</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">13</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">14</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">15</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">16</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">17</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">18</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">19</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">20</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">21</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">22</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">23</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">24</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">25</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">26</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">27</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">28</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">29</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">30</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">31</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">32</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">33</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">34</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">35</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">36</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">37</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">38</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">39</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">40</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">41</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">42</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">43</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">44</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">45</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">46</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">47</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">48</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">49</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">50</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">51</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">52</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">53</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">54</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">55</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">56</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">57</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">58</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">59</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">60</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">61</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">62</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">63</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">64</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">65</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">66</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">67</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">68</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">69</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">70</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">71</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">72</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">73</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">74</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">75</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">76</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">77</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">78</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">79</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">80</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">81</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">82</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">83</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">84</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">85</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">86</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">87</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">88</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">89</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">90</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">91</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">92</span>
                                    <p class="name">fsh***</p>
                                    <span class="price">代理日收入佣金总额: 8550.25 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">93</span>
                                    <p class="name">dmy***</p>
                                    <span class="price">代理日收入佣金总额: 6531.22 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">94</span>
                                    <p class="name">w55***</p>
                                    <span class="price">代理日收入佣金总额: 4562.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">95</span>
                                    <p class="name">vip***</p>
                                    <span class="price">代理日收入佣金总额: 2215.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">96</span>
                                    <p class="name">yh1***</p>
                                    <span class="price">代理日收入佣金总额: 5510.00 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">97</span>
                                    <p class="name">dca***</p>
                                    <span class="price">代理日收入佣金总额: 3155.20 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">98</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                                <li><span class="num">100</span>
                                    <p class="name">a16***</p>
                                    <span class="price">代理日收入佣金总额: 2562.66 元</span>
                                    <p>佣金已到帐</p>
                                </li>
                            </ul>
                        </div>
                        <p>截止至<span class="time">2018年6月19日 20时55分23秒</span>为止 已有 <span class="people">381358</span> 人加入代理</p>
                    </div>
                </div>
            </div>
        </div>

        <!--银河代理-->
        <div class="main wow fadeInRight">
            <div class="main_box">
                <div class="main_dl wow fadeInRight">
                    <div class="dream">
                        <img src="images/dream.png" alt="" srcset="">
                        <div class="diamond">
                            <div class="diamond-modal">
                                <h3>代理商拥有会员越多，日佣金越多</h3>
                                <p>代理线下会员总存款<span class="red">（500000×0.3%）</span>+代理线下会员打码量<span class="red">（500000×0.3%）</span>=<span class="red">3000元</span><br> 代理线下会员总存款<span class="red">（1000000×0.3%）</span>+代理线下会员打码量<span class="red">（1000000×0.3%）</span>=
                                    <span class="red">6000元</span>
                                    <br> <span class="darkred">【努力不止于此，加油】</span>
                                </p>
                            </div>
                        </div>
                        <div class="member">
                            <div class="member-modal">
                                <h3>会员享有澳门银河VIP优越会福利待遇</h3>
                                <p>每周三<span class="red">周工资</span>自动派送 每月8号<span class="red">月薪水</span>自动派送<br> <span class="red">节日礼金、生日礼金 积分商城</span>无限兑换豪礼<br> 1元存取款 投注1元天天超高返水无上限</p>
                            </div>
                        </div>
                    </div>
                    <div class="mode">
                        <div class="title"><img src="images/modeTitle.png" alt="" srcset=""></div>
                        <div class="board">
                            <div class="fl_box">
                                <div class="box box01">
                                    <img src="images/modeboard01.png" alt="" srcset="">
                                    <h3>零资金 零风险 高回报</h3>
                                    <p>成为澳门银河代理商无须负担任何费用，就可以开始无上限的收入，无论您拥有的是网络资源，或是人脉资源，不管您是在家还是出差在外，随时随地都可以轻松赚大钱。</p>
                                </div>
                                <div class="box"></div>
                                <div class="box box02">
                                    <img src="images/modeboard02.png" alt="" srcset="">
                                    <h3>双重收益</h3>
                                    <p>澳门银河和其他单一的返佣方式不同，推出的独家全新版升级模式让客户真正享受到丰厚的回报；代理线下会员每日存款×0.3%+有效投注×0.3%，存款、流水越高佣金越多。</p>
                                </div>
                            </div>
                            <div class="fl_box">
                                <div class="box box03">
                                    <img src="images/modeboard03.png" alt="" srcset="">
                                    <h3>独家最高返佣方式</h3>
                                    <p>澳门银河全新推出的升级版代理模式堪称全网最高返佣模式，例如：代理线下当日存款50万并且有效投注达1000万，次日即可获得50万×0.3%+1000万×0.3%=31500元，因此，月收入轻松超百万不再是梦。</p>
                                </div>
                                <div class="box box04">
                                    <img src="images/modeboard04.png" alt="" srcset="">
                                    <h3>佣金日结算</h3>
                                    <p>每日收益结算时间，澳门银河以每日中午12：00-18：00（美东时间）进行流水佣金结算【当日结算】结算完成会自动转到您的账户里面，您可以直接取款或者放在账户里面继续娱乐赚钱。</p>
                                </div>
                                <div class="box box05">
                                    <img src="images/modeboard05.png" alt="" srcset="">
                                    <h3>深度合作</h3>
                                    <p>澳门银河代理诚邀各路精英的加盟，优秀代理还可以升级为总代理，如您有更好的合作建议方案，请您联系澳门银河代理专员进行咨询了解，我们真诚期待与您合作。</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--代理支持-->
                <div class="main_jc wow lightSpeedIn">
                    <div class="support">
                        <div class="title"><img src="images/supportTitle.png" alt=""></div>
                        <div class="board">
                            <p>澳门银河Ⅰ提供24小时客服专员服务，当您有任何疑问欢迎随时与我们联系，免除您的后顾之忧。</p>
                            <div class="QRcode">
                                <div>
                                    <a href="http://shang.qq.com/email/stop/email_stop.html?qq=61259765 &sig=a1c657365db7e82805ea4b2351081fc3ebcde159f8ae49b1&tttt=1" target="_blank">
                                        <img src="images/QQ.png" alt="" sizes="" srcset="">
                                        <p>61259765</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="#" class="wechat">
                                        <img src="images/wecat.png" alt="" sizes="" srcset="">
                                        <p>dl0208com</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="mailto:0208dlcom@gmail.com">
                                        <img src="images/mail.png" alt="" sizes="" srcset="">
                                        <p>0208dlcom@gmail.com</p>
                                    </a>
                                </div>
                            </div>
                            <img src="images/supportTitle2.png" alt="">
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
    <div class="service">
        <button class="close"></button>
        <div class="portrait"><img src="images/portrait.png" alt="" srcset=""></div>
        <h6>欢迎咨询</h6>
        <p>当前专员在线,点击即可咨询</p>
        <a class="message"><img src="images/message.png" alt=""></a>
        <a class="message QQmessage"><img src="images/QQmessage.png" alt=""></a>
        <div class="bshare-custom icon-medium share">
            <a title="分享到QQ空间" class="bshare-qzone shareIcon S-star-z" style="padding: 0;"></a>
            <a title="分享到新浪微博" class="bshare-sinaminiblog shareIcon S-weibo" style="padding: 0;"></a>
            <a title="分享到微信" class="bshare-weixin shareIcon S-wechat" style="padding: 0;" href="javascript:void(0);"></a>
            <a title="分享到QQ好友" class="bshare-qqim shareIcon S-QQ" style="padding: 0;" href="javascript:void(0);"></a>
        </div>
    </div>
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
                        <a><button class="closeBtn login login" type="button"></button></a>
                        <a href=""><button class="closeBtn forget" type="button" data-dismiss="modal" aria-label="Close"></button></a>
                        <a href=""><button class="closeBtn pass" type="button" data-dismiss="modal" aria-label="Close"></button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function() {
            var my_jPlayer = $("#jquery_jplayer");
            var first_track = true;

            my_jPlayer.jPlayer({
                ready: function() {
                    my_jPlayer.jPlayer("setMedia", {
                        mp3: "/fighting.mp3"
                    }).jPlayer("play");

                    first_track = false;
                    $(this).blur();
                    return false;
                },
                swfPath: "/js",
                cssSelectorAncestor: "#jp_container",
                supplied: "mp3",
                autoPlay: true
            });

            setTimeout(function() {
                $('.loading').hide();
            }, 4000);
        });

        //判断手机还是PC
        function browserRedirect() {
            var sUserAgent = navigator.userAgent.toLowerCase();
            var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
            var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
            var bIsMidp = sUserAgent.match(/midp/i) == "midp";
            var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
            var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
            var bIsAndroid = sUserAgent.match(/android/i) == "android";
            var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
            var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
            if (!(bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM)) {

            } else {
                window.location.href = 'mobile/index.php';
            }
        }
        browserRedirect();

    </script>
    <script>
    wow = new WOW({
        animateClass: 'animated',
        offset: 200,
        callback: function(box) {
            //console.log("WOW: animating < " + box.tagName.toLowerCase() + ">");
        }
    });
    wow.init();
</script>
<script>
    var timeOutEven = 0;
    $(function() {
        $(".fl_box .box").on({
            touchstar: function(e) {
                timeOutEvent = setTimeout(function() {
                    $('.fl_box .box').css("opacity", "0.3");
                    timeOutEvent = 0;
                }, 1000);
                e.preventDefault();
            },
            touchmove: function() {
                clearTimeout(timeOutEvent);
                timeOutEvent = 0;
            }
        })

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
        $('.wechat').click(function(){
            swal({
            title : '',
            text : '请使用微信扫QRcode',
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定!",
            closeOnConfirm: false
            });
        });
    });
</script>
</body>

</html>


