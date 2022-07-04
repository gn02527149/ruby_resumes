<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ $m_setting->title }}</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
	<div class="header">
		<div class="middlebox">
			<div class="login"><img src="{{ asset('img/login.png') }}" alt=""></div>
		</div>
	</div>

	<div class="middlebox">
		<div class="listBar">
            <a href="">
                <li class="inquiryLi">中奖查询</li>
            </a>
            <a href="#cardBox">
                <li class="cardLi">全民刮刮乐</li>
            </a>
            <a href="#service">
                <li class="serviceLi">活动专员</li>
            </a>
        </div>
		{{--
			刮刮乐 按下 #reset 按钮后此区块重 LOAD
			并且点此区块先验证是否登录
		--}}
		<div class="cardbox" id="cardBox">
			<div class="card">
				<div id="mask_img_bg">
					{{--
					<span class="cont-span"></span>
					--}}
					<img src="{{ asset('img/cardTop.png') }}" />
				</div>
				<img id="redux" src="{{ asset('img/cardTop.png') }}" />
			</div>
			{{-- /刮刮乐 --}}

			{{-- 兑奖跑马灯 --}}
			<div class="list">
				<div class="title">今日最佳人气</div>
				<div class="allbox" id="marquee2">
					<ul class="marqueebox">
						@foreach ($play_records as $play_record)
							<li>
								<img src="{{ asset('img/listdot.png') }}" alt="">
								<span class="num"></span> 恭喜 <?php echo preg_replace('/^(.{3}).*(.{3})$/', '${1}******${2}', $play_record->account); ?> 刮中 {{ $play_record->amount }} 元
							</li>
						@endforeach
					</ul>
				</div>
			</div>
			<p>截止 <span class="time"><?php echo date('Y年m月d日 H:i:s'); ?></span> <span class='line2'>已有<span class="people">{{ $m_setting->joined + $member_count }}</span>人参与 已有<span class="people people2">{{ $m_setting->exchanged + $issued_count }}</span>人成功兑奖</span>
			</p>
		</div>
		<div class="service" id="service">
			<div class="service_info">
				<div class="info info_l">
					<a  class="web" href="http://shang.qq.com/email/stop/email_stop.html?qq={{ $m_setting->qq }}&sig=a1c657365db7e82805ea4b2351081fc3ebcde159f8ae49b1&tttt=1" target="_blank">
						@if ($m_setting->qq)
							<p>QQ专员:<span class="qqName">{{ $m_setting->qq }}</span></p>
						@endif
						@if ($m_setting->qq_img)
							<img class="QR-qq" src="{{ asset('admin/upload/' . $m_setting->qq_img) }}" alt="" />
						@endif
					</a>
					<a class="mobile" href="{{ $m_setting->link1 }}" target="_blank">
						@if ($m_setting->qq)
							<p>专员:<span class="qqName">{{ $m_setting->qq }}</span></p>
						@endif
						@if ($m_setting->qq_img)
							<img class="QR-qq" src="{{ asset('admin/upload/' . $m_setting->qq_img) }}" alt="" />
						@endif
					</a>
				</div>
				<div class="info info_r" id="copy" data-clipboard-target="#wechatName">
					<a href="weixin://">
						@if ($m_setting->wechat)
							<p class="web">微信专员:<span class="wechatName">{{ $m_setting->wechat }}</span></p>
							<p class="mobile">专员:<span class="wechatName" id="wechatName">{{ $m_setting->wechat }}</span></p>
						@endif
						@if ($m_setting->wechat_img)
							<img class="QR-wechat" src="{{ asset('admin/upload/' . $m_setting->wechat_img) }}" alt="" />
						@endif
					</a>
				</div>
			</div>
		</div>
	</div>


	{{-- footer --}}
	<div class="footer">
		<div class="copyright web"><img src="{{ asset('img/copyright.png') }}"></div>
		<div class="copyright mobile"><img src="{{ asset('img/m-copyright.png') }}"></div>
	</div>


	{{-- 中奖彈窗 --}}
	<div class="hint-show">
		<img class="hint-img" src="">
		<a class="close">X</a>
		<a id="continue-btn" class="btn" href="#cardBox">再刮一张</a>
		<a id="contact-kf-btn" class="btn" href="#service">联系兑换专员</a>
		<p>本次活动真实有效 劝您莫失良机<br>请在中奖后72小时内联系活动专员进行兑奖</p>
	</div>
	<div class="mask"></div>


	{{-- 登录彈窗 --}}
	<div class="login-show">
		<img class="hint-img" src="{{ asset('img/login.png') }}" />
		<input type="text" name="cellphone_num" placeholder="请输入领奖手机号码" />
		<a class="close">X</a>
		<a id="login-btn" class="btn">点击验证</a>
	</div>

	{{-- Loading 彈窗 --}}
	<div class="loading-show">
		<p>页面处理中，请稍后</p>
	</div>

	{{-- 點擊查詢彈窗 --}}
    <div class="search-show">
        <img class="hint-img" src="img/search.png">
        <input name="phone" type="text" placeholder="请输入领奖手机号码" />
        <a class="close">X</a>
        <a class="btn">点击验证</a>
    </div>

    {{-- 中獎查詢彈窗 --}}
    <div class="reward-show">
        <a class="close">X</a>
        <h2>中奖查询</h2>
        <div class="info">
            <div class="reward">
                <img src="img/R01.png" alt="">
                <img src="img/R02.png" alt="">
                <img src="img/R03.png" alt="">
            </div>
            <a class="btn">关闭</a>
            <p>本次活动真实有效 劝君莫失良机<br>请在中奖后72小时内联系活动专员进行兑奖
            </p>
        </div>
    </div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<script src="{{ asset('js/jquery.eraser.js') }}"></script>
	<script src="{{ asset('js/Marquee.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.7.1/clipboard.min.js"></script>
	{{-- 刮刮乐使用 (先寫在檔案裡)
	<script src="{{ asset('js/scratch.js') }}"></script>
	--}}
	<script>
	$(function() {

		var ajax_sent = false,
			logged_in = {{ $logged_in }},
			is_demo = false,
			last = false,
			done = false;

		{{-- Laravel - CSRF Protection --}}
		$.ajaxSetup({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
			},
			beforeSend: function() {
				ajax_sent = true;
				$('.loading-show,body .mask').show();
			},
			error: function(jqXHR) {
				if (jqXHR.status == '419') {
					if (confirm("Session 已失效，请重新整理页面.")) {
						location.reload();
					}
				}
			},
			complete: function(jqXHR, textStatus) {
				ajax_sent = false;
				$('.loading-show,.mask').hide();
			}
		});

		{{-- 顯示登录框 --}}
		$('.login').click(function() {
			if (logged_in) {
				if (confirm("您已登录, 是否登出?")) {
					logout();
				}
				return;
			}
			$('.login-show,.mask').fadeIn(300);
			$('input[name="cellphone_num"]').focus();
		});

		{{-- 關閉登录框 --}}
		$(".mask,.login-show .close").click(function() {
			$(".login-show,.mask").fadeOut(300);
		});

		{{-- 關閉提示框 --}}
		$(".mask,.hint-show .close").click(function() {
			$(".hint-show,.mask").fadeOut(300);
		});
		$(".hint-show .btn").click(function() {
			$(".hint-show").fadeOut(300);
		});

		{{-- 登录按鈕 --}}
		$("#login-btn").click(function() {
			if (ajax_sent) {
				return;
			}

			var cellphone_num = $('input[name="cellphone_num"]').val();
			if (! cellphone_num) {
				alert('手机号码不能为空');
				$('input[name="cellphone_num"]').focus();
				return;
			}

			@if ($m_setting->demo_account)
				if (cellphone_num === "{{ $m_setting->demo_account }}") {
					is_demo = true;
					getImg();
					alert("已进入测试模式");
					$(".login-show .close").click();
					return;
				} else {
					is_demo = false;
				}
			@endif

			$.ajax({
				url: "{{ url('member/login') }}",
				type: "post",
				dataType: "json",
				data: {
					username: cellphone_num
				},
				success: function(res) {
					if (res.error == "000") {
						logged_in = true;
						getImg();
						alert('登录成功');
						$(".login-show .close").click();
					} else if (res.error == "100") {
						logged_in = true;
						getImg();
						alert('您已经登录');
						$(".login-show .close").click();
					} else if (res.msg) {
						alert(res.msg);
						$('input[name="cellphone_num"]').focus().select();
					} else {
						alert("发生未知的错误");
					}
				}
			});
		});

		{{-- 登出 --}}
		function logout() {
			if (ajax_sent) {
				return;
			}
			$.ajax({
				url: "{{ url('member/logout') }}",
				type: "get",
				success: function(data) {
					logged_in = false;
					last = false,
					done = false;
					$('#redux').eraser('reset');
					alert('登出成功');
				}
			});
		}

		{{-- 取得圖片 --}}
		function getImg() {
			{{-- 等待 playConfirm api 處理完畢 --}}
			if (ajax_sent) {
				setTimeout(getImg, 50);
				return;
			}
			$('#redux').eraser('reset');
			$.ajax({
				url: is_demo ? "{{ url('game/demo') }}" : "{{ url('game/play') }}",
				type: "post",
				dataType: "json",
				success: function(res) {
					if (res.error == "000") {
						$("#mask_img_bg img").attr("src", res.data);
						$(".hint-show .hint-img").attr("src", res.data);
						last = res.last;
					} else if (res.msg) {
						console.log(res.msg);
					} else {
						alert("发生未知的错误");
					}
				}
			});
		}

		{{-- 塗層 --}}
		$('.card').mouseenter(function() {
			if ((logged_in || is_demo) && !ajax_sent) {
				$('#redux').css('pointer-events', 'auto');
			} else {
				$('#redux').css('pointer-events', 'none');
			}
		}).on("tap",function(){
			if ((logged_in || is_demo) && !ajax_sent) {
				$('#redux').css('pointer-events', 'auto');
			} else {
				$('#redux').css('pointer-events', 'none');
			}
		});


		var click_event = jQuery.fn.tap ? "tap" : "click";
		$(".card,#redux").on(click_event, function() {
			if (ajax_sent) {
				alert("页面处理中，请稍后再试");
				return;
			}
			if (! (logged_in || is_demo)) {
				$('.login').click();
			} else if (done) {
				$("body .hint-show,body .mask").fadeIn(300);
			}
		});

		{{-- Eraser --}}
		$('#redux').eraser({
			size: 50,	{{-- 设置橡皮擦大小 --}}
			completeRatio: 0.8,	{{-- 设置擦除面积比例 --}}
			completeFunction: showResult	{{-- 大于擦除面积比例触发函数 --}}
		});

		{{-- 顯示結果 --}}
		function showResult() {
			done = true;
			if (last) {
				$("#continue-btn").hide();
				$("#contact-kf-btn").show();
			} else {
				$("#continue-btn").show();
				$("#contact-kf-btn").hide();
			}
			$("body .hint-show,body .mask").fadeIn(300);
		}

		{{-- 繼續按鈕 --}}
		$("#continue-btn").click(function() {
			done = false;
			if (! is_demo) {
				$.post("{{ url('game/playConfirm') }}");
			}
			getImg();
			var cardST = $('#cardBox').offset().top;
			$(window).scrollTop(cardST);
		});

		{{-- 聯絡客服 --}}
		$("#contact-kf-btn").click(function() {
			if (! is_demo) {
				$.post("{{ url('game/playConfirm') }}");
			}
			var serviceST = $('#service').offset().top;
			$(window).scrollTop(serviceST);
		});

		if (logged_in) {
			getImg();
		}


		{{-- 跑馬燈序號 --}}
		var num = 0;
		$('.marqueebox li').each(function() {
			$('.num').eq(num).text(num + 1);
			num += 1;
		});

		{{-- 跑馬燈 --}}
		$('#marquee2').kxbdSuperMarquee({
			isMarquee: true,
			isEqual: false,
			scrollDelay: 20,
			controlBtn: {
				up: '#goUM',
				down: '#goDM'
			},
			direction: 'up'
		});

		{{-- 現在時間
		var year = new Date().getFullYear();
		var mouth = new Date().getMonth();
		var date = new Date().getDate();
		var hour = new Date().getHours();
		var min = new Date().getMinutes();
		var sec = new Date().getSeconds();
		$('.time').text(year + "年" + mouth + "月" + date + "日 " + hour + ":" + min + ":" + sec);
		--}}

		{{-- 時間換成人數
		var getTime = new Date().getTime();
		var people = parseInt(getTime / 10000000);
		var people2 = parseInt(people - (people % 50));
		$('.people').text(people);
		$('.people2').text(people2);
		--}}

		{{-- listBar --}}

		$('.inquiryLi').click(function() {
			$('body .search-show,body .mask').fadeIn(300);
		});

		$('.cardLi').click(function() {
			var cardST = $('#cardBox').offset().top;
			$(window).scrollTop(cardST);
		});
		$('.serviceLi').click(function() {
			var serviceST = $('#service').offset().top;
			$(window).scrollTop(serviceST);
		});

		$('.search-show .btn').click(function() {
			$('.reward-show').fadeIn(300);
			$('.search-show').hide();
		});

		{{-- 查詢框關閉 --}}
		$(".mask,.search-show .close").click(function() {
			$(".search-show,.mask").fadeOut(300);
		});
		$(".mask,.reward-show .close,.reward-show .btn").click(function() {
			$(".reward-show,.mask").fadeOut(300);
		});

		new Clipboard( "#copy" );
	});
</script>

</body>

</html>