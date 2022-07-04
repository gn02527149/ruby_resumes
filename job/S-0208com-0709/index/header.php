<?php
$login = 0;
if (isset($_COOKIE['frontend_agency_user_id'])) {
	$login = 1;
}
?>


<header>
	<div class="top_center">
		<div class="fl fl_1"></div>
		<div class="fl fl_2"><img src="images/agencyCenter.png" alt=""></div>
		<div class="fl fl_3">
			<ul class="nav_lf fl">
				<a href="index.php">
					<li class="index">
						<span>
							<img src="images/home.png" alt="" srcset="">
							<h5>代理首页</h5>
						</span>
						<div class="overlay"></div>
					</li>
				</a>
				<a href="brand.php">
					<li class="brand">
						<span>
							<img src="images/brand.png" alt="" srcset="">
							<h5>品牌效应</h5>
						</span>
						<div class="overlay"></div>
					</li>
				</a>
				<a href="tool.php">
					<li class="tool">
						<span>
							<img src="images/tool.png" alt="" srcset="">
							<h5>营销工具</h5>
						</span>
						<div class="overlay"></div>
					</li>
				</a>
				<a href="question.php">
					<li class="question">
						<span>
							<img src="images/question.png" alt="" srcset="">
							<h5>常见问题</h5>
						</span>
						<div class="overlay"></div>
					</li>
				</a>
				<a href="value.php">
					<li class="value">
						<span>
							<img src="images/value.png" alt="" srcset="">
							<h5>代理价值</h5>
						</span>
						<div class="overlay"></div>
					</li>
				</a>
				<a href="login.php" class="login" style="display: <?=$login == 1 ? 'block' : 'none'?>;">
					<li class="login">
						<span>
							<img src="images/login.png" alt="" srcset="">
							<h5>我的代理</h5>
						</span>
						<div class="overlay"></div>
					</li>
				</a>
			</ul>
			<div class="subtitle">已有 <span></span> 人加入银河代理,感谢信任！</div>
			<div id="jquery_jplayer"></div>
			<div id="jp_container" class="player">
				<a class="jp-play" href="#"></a>
				<a class="jp-pause" href="#"></a>
			</div>
		</div>
	</div>
</header>


<script>
$(function() {
	//人數增加
	function changePeople() {
		var date = Date.parse(new Date());
		var people = Math.round(date / 3500000 - 200000);
		$('.subtitle span').text(people);
		$('.board .people').text(people);
	}
	setInterval(function() {
		changePeople();
	}, 60000);
	changePeople();
});
</script>
