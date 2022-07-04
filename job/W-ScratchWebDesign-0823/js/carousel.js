// $(function(){
// 	$('.abgne-yahoo-carousel').each(function(){
// 		// 先取得相關的元素及寬度等資料
// 		var $this = $(this),
// 			$page = $this.find('.page'),
// 			$btn = $this.find('.btn'),
// 			_frameWidth = $this.find('.frame').width(),
// 			$carousel = $this.find('ul'),
// 			$items = $carousel.find('li'),
// 			_itemLength = $items.length,
// 			_set = Math.ceil(_frameWidth / $items.outerWidth(true)),
// 			_count = Math.ceil(_itemLength / _set),
// 			_width = _set * $items.outerWidth(true) * -1,
// 			_speed = 400, _opacity = 0.75, _index = 0;
//
// 		// 用來顯示目前已顯示及總資料筆數資訊
// 		$page.html('1 - ' + (_set < _itemLength ? _set : _itemLength) + ' / ' + _itemLength);
//
// 		// 幫每一個 li 加上標題及遮罩
// 		// $items.each(function(){
// 		// 	var $this = $(this),
// 		// 		_href = $this.find('a').attr('href'),
// 		// 		_title = $this.find('img').attr('title');
//     //
// 		// 	$this.append('<div class="ovrly"></div>' +
// 		// 		'<h3>' +
// 		// 			'<a href="' + _href + '" alt="' + _title + '" title="' + _title + '">' + _title + '</a>' +
// 		// 		'</h3>').find('.ovrly').css('opacity', _opacity);
// 		// });
//
// 		// 當按了上下頁的按鈕時
// 		$btn.find('.prev, .next').click(function(e){
// 			// 計算要顯示第幾組
// 			_index = Math.floor((e.target.className == 'prev' ? _index - 1 + _count : _index + 1) % _count);
// 			var _lastNum = _set * (_index + 1);
// 			$page.html((_set * _index + 1) + ' - ' + (_lastNum < _itemLength ? _lastNum : _itemLength) + ' / ' + _itemLength);
//
// 			// 進行動畫
// 			$carousel.stop().animate({
// 				left: _index * _width
// 			}, _speed);
//
// 			e.preventDefault();
// 		}).focus(function(){
// 			this.blur();
// 		});
// 	})
// });


$(function() {
    // 先取得必要的元素並用 jQuery 包裝
    // 再來取得 $block 的寬度及設定動畫時間
    var $block = $('#abgne-block-20110406'),
        $slides = $block.find('.slides'),
        $ul = $slides.find('ul'),
        _width = $slides.width(),
        _left = _width * -1,
        _animateSpeed = 400;

    // 先把最後一個 li 的內容插入到第一個 li 前面
    // 並設定 $ul 的 left 及 width
    $ul.find('li:first').before($ul.find('li:last')).end().css({
        left: _left,
        width: _width * ($ul.find('li').length + 1)
    });

    // 當點擊到 a.prev 時
    $block.find('a.prev').click(function() {
        // 移動 $ul
        $ul.stop(false, true).animate({ 'left': _left + _width }, _animateSpeed, function() {
            // 把最後一個 li 的內容插入到第一個 li 前面
            $ul.find('li:first').before($ul.find('li:last')).end().css('left', _left);
        });
        return false;
    });

    // 當點擊到 a.next 時
    $block.find('a.next').click(function() {
        // 移動 $ul
        $ul.stop(false, true).animate({ 'left': _left - _width }, _animateSpeed, function() {
            // 把第一個 li 的內容插入到最後一個 li 後面
            $ul.find('li:last').after($ul.find('li:first')).end().css('left', _left);
        });
        return false;
    });


    setInterval(function() {
        $block.find('a.next').click();
    }, 2000);
    $block.find('a').focus(function() {
        this.blur();
    });
});