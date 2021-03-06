<?php
$datas = $db->select($prefix . "index", "*", array('ORDER' => array('order_id' => 'DESC')));

$sDiv = '';
foreach ($datas as $item) {

	$sDiv .= '<li data-delay="5" data-src="5" data-trans3d="tr6,tr17,tr22,tr23,tr29,tr27,tr32,tr34,tr35,tr53,tr54,tr62,tr63,tr4,tr13,tr45" data-trans2d="tr3,tr8,tr12,tr19,tr22,tr25,tr27,tr29,tr31,tr34,tr35,tr38,tr39,tr41">
        <img src="' . $item['img_url'] . '" data-src="' . $item['img_url'] . '" data-thumb="' . $item['img_url'] . '" style="width: 100%; height: 100%;" />
        <a data-type="link" href="' . $item['jump_url'] . '" target="_blank"></a>
    </li>';
	// $sDiv .= '<div><a href="' . $item['jump_url'] . '" target="_blank"><img src="' . $item['img_url'] . '" /></a></div>';
}
?>


<div class="banner" style="overflow-x: hidden;">
	<div class="banner-box">
		<div class="banner_img">
			<div id="cuteslider_3_wrapper" class="cs-circleslight">
				<div id="cuteslider_3" class="cute-slider" data-width="897" data-height="200" data-overpause="true">
					<ul data-type="slides">
						<?=$sDiv?>
						<!-- <li data-delay="5" data-src="5" data-trans3d="tr6,tr17,tr22,tr23,tr29,tr27,tr32,tr34,tr35,tr53,tr54,tr62,tr63,tr4,tr13,tr45" data-trans2d="tr3,tr8,tr12,tr19,tr22,tr25,tr27,tr29,tr31,tr34,tr35,tr38,tr39,tr41">
							<img src="images/slide_01.png" data-thumb="images/slide_01.png" style="width: 100%; height: 100%;" />
							<a data-type="link" href="" target="_blank"></a>
						</li>
						<li data-delay="5" data-src="5" data-trans3d="tr6,tr17,tr22,tr23,tr26,tr27,tr29,tr32,tr34,tr35,tr53,tr54,tr62,tr63,tr4,tr13" data-trans2d="tr3,tr8,tr12,tr19,tr22,tr25,tr27,tr29,tr31,tr34,tr35,tr38,tr39,tr41">
							<img src="images/slide_02.jpg" data-src="images/slide_02.jpg" data-thumb="images/slide_02.jpg" style="width: 100%; height: 100%;" />
							<a data-type="link" href="" target="_blank"></a>
						</li>
						<li data-delay="5" data-src="5" data-trans3d="tr6,tr17,tr22,tr23,tr26,tr27,tr29,tr32,tr34,tr35,tr53,tr54,tr62,tr63,tr4,tr13" data-trans2d="tr3,tr8,tr12,tr19,tr22,tr25,tr27,tr29,tr31,tr34,tr35,tr38,tr41">
							<img src="images/slide_03.jpg" data-src="images/slide_03.jpg" data-thumb="images/slide_03.jpg" style="width: 100%; height: 100%;" />
							<a data-type="link" href="" target="_blank"></a>
						</li>
						<li data-delay="5" data-src="5" data-trans3d="tr6,tr17,tr22,tr23,tr26,tr27,tr29,tr32,tr34,tr35,tr53,tr54,tr62,tr63,tr4,tr13" data-trans2d="tr3,tr8,tr12,tr19,tr22,tr25,tr27,tr29,tr31,tr34,tr35,tr38,tr39,tr41">
							<img src="images/slide_04.jpg" data-src="images/slide_04.jpg" data-thumb="images/slide_04.jpg" style="width: 100%; height: 100%;" />
							<a data-type="link" href="" target="_blank"></a>
						</li>
						<li data-delay="5" data-src="5" data-trans3d="tr6,tr17,tr22,tr23,tr26,tr27,tr29,tr32,tr34,tr35,tr53,tr54,tr62,tr63,tr4,tr13" data-trans2d="tr3,tr8,tr12,tr19,tr22,tr25,tr27,tr29,tr31,tr34,tr35,tr38,tr39,tr41">
							<img src="images/slide_05.jpg" data-src="images/slide_05.jpg" data-thumb="images/slide_05.jpg" style="width: 100%; height: 100%;" />
							<a data-type="link" href="" target="_blank"></a>
						</li> -->
					</ul>
					<ul data-type="controls">
						<li data-type="captions"></li>
						<li data-type="link"></li>
						<li data-type="video"></li>
						<li data-type="slideinfo"></li>
						<li data-type="circletimer"></li>
						<li data-type="previous"></li>
						<li data-type="next"> </li>
						<li data-type="bartimer"></li>
						<li data-type="slidecontrol" data-thumb="true" data-thumbalign="up"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<script type='text/javascript'>
var CSSettings = {
	"pluginPath": "module"
};


$(function() {
	//var boxH = $('#cuteslider_3').height();
	var WW = $(window).width();
	//$('.banner').css("height", boxH);
	if (WW < 1250) {
		$('.banner').css("width", "1250px");
	} else {
		$('.banner').css("width", WW);
	}

	var cuteslider3 = new Cute.Slider();
	cuteslider3.setup("cuteslider_3", "cuteslider_3_wrapper", "css/slider-style.css");
	cuteslider3.api.addEventListener(Cute.SliderEvent.CHANGE_START, function(event) {});
	cuteslider3.api.addEventListener(Cute.SliderEvent.CHANGE_END, function(event) {});
	cuteslider3.api.addEventListener(Cute.SliderEvent.WATING, function(event) {});
	cuteslider3.api.addEventListener(Cute.SliderEvent.CHANGE_NEXT_SLIDE, function(event) {});
	cuteslider3.api.addEventListener(Cute.SliderEvent.WATING_FOR_NEXT, function(event) {});
});
</script>
