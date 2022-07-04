<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

define('IN_GD', true);
require dirname(__FILE__) . '/../includes/init.php';

$myip = $_SERVER['REMOTE_ADDR'];
$ip = $db->get($prefix . "ip", "*", array('ip' => $myip));
if (!$ip) {
	exit;
}

$login = 0;
if (isset($_COOKIE['frontend_agency_user_id'])) {
	$login = 1;

}

$info = $db->get($prefix . "tactics", "*");

$gost_comments = $db->query(" select * from " . $prefix . "gost_comment WHERE status = '1' ORDER BY created_at")->fetchAll();
$gost_comment_div_array = array();
$limit = 500;
foreach ($gost_comments as $v) {

	if ($v['reply_id'] == 0) {
		$content = preg_replace("/\[em_([0-9]{2})\]/", '<img src="../arclist/$1.gif" border="0" />', $v['content']);
		$content = preg_replace("/\[em_([0-9])\]/", '<img src="../arclist/$1.gif" border="0" />', $content);
		$gost_comment_div_array[$v['id']][0] = '

            <div class="userPic"><img src="../' . $v['face_img'] . '"></div>
            <div class="content">
                <div class="userName"><a href="javascript:;">游客</a></div>
                <div class="msgInfo">' . $content . '</div>
                <div class="times"><span>' . date('m月d日 H:i', strtotime($v['created_at'])) . '</span></div>
            </div>';

		if (count($gost_comment_div_array) > $limit) {
			array_pop($gost_comment_div_array);
			break;
		}
	} elseif ($v['reply_id'] != 0) {

		$gost_comment_div_array[$v['reply_id']][] = '
            <div class="answer">
                <div class="managerPic"><img src="../images/managerPic.jpg"></div>
                <div class="content">
                    <div class="managerName"><a href="javascript:;">澳门银河</a></div>
                    <div class="msgInfo">' . $content . '</div>
                    <div class="times">' . date('m月d日 H:i', strtotime($v['created_at'])) . '</div>
                </div>
            </div>';
	}
}

$gost_comment_one_page_count = 20;
$gost_comment_max_show_page = 7;
$gost_comment_div = '';
$gost_comment_count = 0;
$gost_comment_page_count = 1;
$gost_comment_page = '<li class="gost_comment_page" data-id="1">' . $gost_comment_page_count . '</li>';
$last_page = array();
foreach ($gost_comment_div_array as $v) {

	$str = '';
	foreach ($v as $k => $w) {
		if ($k == 0) {
			$str .= '<li>' . $w . '<div class="answers">';
		} else {
			$str .= $w;
		}
	}

	// if ($page_count % 100 == 1 && $page_count != 1) {
	//  $gost_comment_div .= '</ul><ul>';
	// }
	if ($gost_comment_count % $gost_comment_one_page_count == 0 && $gost_comment_count != 0) {
		$gost_comment_page_count++;
		$str .= '</ul><ul class="gost_comment" id="gost_comment_page_' . ($gost_comment_page_count) . '" style="display: none;">';
		// array_shift($last_page);
		// array_push($last_page, '<li class="gost_comment_page" data-id="' . $gost_comment_page_count . '">' . $gost_comment_page_count . '</li>');
		// if ($gost_comment_page_count >= $gost_comment_max_show_page + 1) {
		//  if ($gost_comment_page_count == $gost_comment_max_show_page + 1) {
		//      $gost_comment_page .= '<li class="dot">......</li>';
		//  }
		// } else {
		$gost_comment_page .= '<li class="gost_comment_page" data-id="' . $gost_comment_page_count . '">' . $gost_comment_page_count . '</li>';
		// }
	} else {
		$str .= '';
	}
	$gost_comment_count++;
	$gost_comment_div = $str . $gost_comment_div;

}
if ($gost_comment_page_count >= $gost_comment_max_show_page + 1) {
	foreach ($last_page as $v) {
		$gost_comment_page .= $v;
	}
}
?>
<!DOCTYPE html>
<html lang="zh-Hans">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=100%, initial-scale=1">
    <meta name="keywords" content="澳门银河VIP线路中心">
    <meta name="description" content="澳门银河VIP线路中心">
    <title>营销工具</title>
    <?php include './metadata.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/messageboard.css">
    <link rel="stylesheet" type="text/css" href="css/tool.css">
    <script type='text/javascript' src="../js/messageboard.js"></script>
</head>

<body style="overflow-x: hidden;">
    <!--头部-->
    <div class="top">
        <div id="header"><?php include './header.php'; ?></div>
        <!--代理查詢-->
        <div class="test_msg">
            <div class="test_msg_box wow fadeInUp">
                <div class="introduction">
                    <div class="introduction_content">
                        <div class="introduction_title"><img src="images/market-tool-title.png" alt="" srcset=""></div>
                        <div class="introduction_img">
                            <img src="../images/market-tool.png" alt="">
                        </div>
                        <p>加盟澳门银河代理，您可以获取各种各样的推广资源，这将帮助您吸引玩家对我们的品牌。成功申请开通代理之后，我们即会为您提供推广横幅和推广海报，您可以将横幅设置到自己运营的网站或广告形式刊登，通过连接注册的玩家将成为您的下线，如果有疑问可以联系代理专员，专员将优先协助您，将您得转化率提高。</p>
                        <a href="" class="contact"><img src="../images/contactBtn.png" alt="" srcset=""></a>
                    </div>
                </div>
                <div class="listBox presentation wow bounceInRight">
                    <div class="listBoxTitle presentationTitle"><img src="../images/presentationTitle.jpg" alt=""></div>
                    <img src="images/presentation.png" alt="">
                    <div class="listBox-content">
                        <p>首选最能够获得玩家的吸引，莫过于图片显示，也就是广告横幅。我们有提供各色各样，各种尺寸的广告横幅。我们的广告横幅是经过专业设计师而制作出来，为了更加吸引玩家注意，我们的横幅采用简单而生动的动画，会以Gif和Flash格式取得。如果您不满意我们的横幅特效或效果，随时可以向我们提出意见或商讨并且自定义图片内容。我们是特别欢迎以及尽量配合，以能够帮助推广。</p>
                        <img src="../images/banner1.gif" alt="" srcset="">
                        <img src="../images/banner2.gif" alt="" srcset="">
                        <img src="../images/banner3.gif" alt="" srcset="">
                        <img src="../images/banner4.gif" alt="" srcset="">
                        <img src="../images/banner5.gif" alt="" srcset="">
                    </div>
                </div>
                <div class="listBox poster wow bounceInRight">
                    <div class="listBoxTitle posterTitle"><img src="../images/posterTitle.jpg" alt=""></div>
                    <img src="images/poster.png" alt="">
                    <div class="listBox-content">
                        <p>我们在旨在为服务代理商进行更好的广告推广，特提供代理推广海报，我们的代理海报是经过专业设计师而制作出来，海报内容包含各类游戏赔率优势、游戏种类以及最新优惠等，代理可以任意获取以便能帮助更好的开展推广工作，如果您不满意我们的海报特效或效果，随时可以向我们提出意见或商讨并且自定义图片内容。我们是特别欢迎以及尽量配合，以能够帮助推广，也可以定制您的个性海报。</p>
                        <div class="posterImg">
                            <img src="../images/poster01.jpg" alt="" srcset="">
                            <img src="../images/poster02.jpg" alt="" srcset="">
                            <img src="../images/poster03.jpg" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="listBox activity">
                    <div class="listBoxTitle activityTitle"><img src="../images/activityTitle.jpg" alt=""></div>
                    <img src="images/activity.png" alt="">
                    <div class="listBox-content">
                        <p>为了配合伙伴们宣传和推广，我们会不定期更新优惠活动，代理朋友们可以通过不同的优惠来吸引玩家。我们也不时会根据不同的节日推出一些超值的优惠来应景，好让玩家与我们同庆节日。除此之外，如果合作伙伴们能够发挥创意或者玩家有需求，随时可以向我们提出意见或商讨并且自定义优惠活动。我们是特别欢迎以及尽量配合，以能够帮助推广。</p>
                        <div class="posterImg">
                            <img class="wow bounceInLeft" src="images/activity1.jpg" alt="" srcset="">
                            <img class="wow bounceInRight" src="images/activity2.jpg" alt="" srcset="">
                            <img class="wow bounceInLeft" src="images/activity3.jpg" alt="" srcset="">
                            <img class="wow bounceInRight" src="images/activity4.jpg" alt="" srcset="">
                            <img class="wow bounceInLeft" src="images/activity5.jpg" alt="" srcset="">
                            <img class="wow bounceInRight" src="images/activity6.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <a class="titleTwo"><img src="../images/activityTitle2.png" alt="" srcset=""></a>
                </div>
                <div class="listBox notice">
                    <div class="listBoxTitle noticeTitle"><img src="../images/noticeTitle.png" alt=""></div>
                    <img class="notice_bg" src="images/notice.png" alt="">
                    <div class="listBox-content">
                        <p>网站资讯、最新通知最新优惠等，我们会通过站内信、网站滚动公告、网站弹窗、微信朋友圈、QQ空间等以最简单和最容易明白的内容通知玩家和合作伙伴，敬请注意关注网站最新动态。</p>
                        <img src="../images/_notice.png" alt="" srcset="">
                        <span class="_notice _noticeL wow pulse"></span>
                        <span class="_notice _noticeR wow pulse"></span>
                    </div>
                </div>
                <div class="listBox comment wow bounceInRight">
                    <div class="listBoxTitle commentTitle"><img src="../images/commentTitle.png" alt=""></div>
                    <img src="../images/comment.png" alt="">
                    <p>网站资讯、最新通知最新优惠等，我们会通过站内信、网站滚动公告、网站弹窗、微信朋友圈、QQ空间等以最简单和最容易明白的内容通知玩家和合作伙伴，敬请注意关注网站最新动态。</p>
                    <div id="msgBox">
                    <form>
                            <div class="userPic"><img src="../images/face626.png"></div>
                            <div class="textBox">
                                <textarea id="conBox" class="input f-text" name="conBox">评论有你更精彩！</textarea>
                                <div class="tr">
                                    <span class="emotion"><img src="../images/smail.png" alt="" srcset=""></span>
                                    <span class="head">變更頭像 v</span>
                                    <button type="button" id="sendBtn" title="快捷键 Ctrl+Enter" class="">发布</button>
                                    <div id="headbox" style="position: absolute; z-index: 1000; top: 29px; left: 10px;background: #fff;display: none;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td><img src="../images/head_1.jpg"></td>
                                                    <td><img src="../images/head_2.jpg"></td>
                                                    <td><img src="../images/head_3.jpg"></td>
                                                    <td><img src="../images/head_4.jpg"></td>
                                                    <td><img src="../images/head_5.jpg"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="../images/head_6.jpg"></td>
                                                    <td><img src="../images/head_7.jpg"></td>
                                                    <td><img src="../images/head_8.jpg"></td>
                                                    <td><img src="../images/head_9.jpg"></td>
                                                    <td><img src="../images/head_10.jpg"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="../images/head_11.jpg"></td>
                                                    <td><img src="../images/head_12.jpg"></td>
                                                    <td><img src="../images/head_13.jpg"></td>
                                                    <td><img src="../images/head_14.jpg"></td>
                                                    <td><img src="../images/head_15.jpg"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="../images/head_16.jpg"></td>
                                                    <td><img src="../images/head_17.jpg"></td>
                                                    <td><img src="../images/head_18.jpg"></td>
                                                    <td><img src="../images/head_19.jpg"></td>
                                                    <td><img src="../images/head_20.jpg"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="../images/head_21.jpg"></td>
                                                    <td><img src="../images/head_22.jpg"></td>
                                                    <td><img src="../images/head_23.jpg"></td>
                                                    <td><img src="../images/head_24.jpg"></td>
                                                    <td><img src="../images/head_25.jpg"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="../images/head_26.jpg"></td>
                                                    <td><img src="../images/head_27.jpg"></td>
                                                    <td><img src="../images/head_28.jpg"></td>
                                                    <td><img src="../images/head_29.jpg"></td>
                                                    <td><img src="../images/head_30.jpg"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="list">
                            <ul class="gost_comment" id="gost_comment_page_1">
                                        <?=$gost_comment_div?>
                                <!-- <li class="">
                                    <div class="userPic"><img src="../images/face625.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">诺诺</a></div>
                                        <div class="msgInfo">朋友介绍过来澳门银河的，感觉还不错</div>
                                        <div class="times"><span>06月28日 21:14</span></div>
                                    </div>
                                </li>
                                <li class="">
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">游客9804</a></div>
                                        <div class="msgInfo">世界杯买那个队呀，那个高手给点意见。</div>
                                        <div class="times"><span>06月28日 21:13</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">沫沫</a></div>
                                        <div class="msgInfo">银河平台信誉有保障，在银河做代理放心。介绍朋友来玩，不怕被黑。</div>
                                        <div class="times"><span>06月27日 20:08</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">游客9798</a></div>
                                        <div class="msgInfo">世界杯下注到银河，买的放心。在银河平台玩了几年了，相信他们的信誉！</div>
                                        <div class="times"><span>06月27日 20:05</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face625.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">诺诺</a></div>
                                        <div class="msgInfo">我又来澳门银河玩了，每次来都觉得特别开心，会一直支持银河的</div>
                                        <div class="times"><span>06月27日 18:14</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">游客9801</a></div>
                                        <div class="msgInfo">银河真给力！！！佣金都是日结的</div>
                                        <div class="times"><span>06月27日 16:24</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">游客9788</a></div>
                                        <div class="msgInfo">一直在这边玩~赢了出款秒到账·~这心情真是好~</div>
                                        <div class="times"><span>06月27日 15:57</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">游客9788</a></div>
                                        <div class="msgInfo">网投我就信澳门银河~出款最快`特别放心~</div>
                                        <div class="times"><span>06月27日 15:56</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">游客9798</a></div>
                                        <div class="msgInfo">一直在银河玩，刚开始赚个烟钱，现在完全可以靠着吃饭了哈哈</div>
                                        <div class="times"><span>06月27日 14:50</span></div>
                                    </div>
                                </li>
                                <li>
                                    <div class="userPic"><img src="../images/face628.png"></div>
                                    <div class="content">
                                        <div class="userName"><a href="javascript:;">游客9442</a></div>
                                        <div class="msgInfo">昨天佣金赚了18324.5 给力呀，抱抱澳门银河</div>
                                        <div class="times"><span>06月20日 14:06</span></div>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                        <div class="page">
                            <div class="_page">
                                <ul id='comment_page_space'>
                                    <?=$gost_comment_page?>
<!--                                     <li>1</li>
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

        $('.closeBtn,.close').click(function() {
            $('.keyverificationWrong').hide();
        });

        var headSrc = "images/face625.png";
        $('#headbox td img').click(function() {
            headSrc = $(this).attr("src");
            // $('#headbox').hide();
        });

        $('#sendBtn').on('click', function(){
            var conBox = $('#conBox').val();
            var show_name = $('#noname').attr('checked') ? 0 : 1;
            var face_img = headSrc;
            $.ajax({
                type: 'post',
                url: '../ajax.php?act=add_gost_comment',
                data: {
                    face_img: face_img,
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
    </script>

</html>