$(function() {
    var WW = $(window).width();
    if (WW < 425) {
        var WH = $(window).height();
        var CH = WH - 306;
        $(".content").css("height", CH + "px");
    }

    // 切換畫面
    var _default = 0,
        $block = $('#abgne-block'),
        $tabs = $block.find('.nav'),
        $tabsLi = $tabs.find('li'),
        $tab_content = $block.find('.tab_content'),
        $tab_contentLi = $tab_content.find('li.tab'),
        _width = $tab_content.width();


    $tabsLi.hover(function() {
        var $this = $(this);

        if ($this.hasClass('active')) return;

        $this.toggleClass('hover');
    }).click(function() {
        var $active = $tabsLi.filter('.active').removeClass('active'),
            _activeIndex = $active.index(),
            $this = $(this).addClass('active').removeClass('hover'),
            _index = $this.index(),
            isNext = _index > _activeIndex;

        if (_activeIndex == _index) return;

        $tab_contentLi.eq(_activeIndex).stop().animate({
            left: isNext ? -_width : _width
        }).end().eq(_index).css('left', isNext ? _width : -_width).stop().animate({
            left: 0,
            opacity: 1
        });

        if (WW > 425) {
            if (_index == 1 || _index == 0) {
                var divH = $tab_contentLi.eq(_index).find("div:first").height();
                $(".content").css("height", divH + 100);
            } else {
                $(".content").css("height", "500px");
            }
        }


    });

    $tabsLi.eq(_default).addClass('active');
    $tab_contentLi.eq(_default).siblings().css({
        left: _width,
        opacity: 0
    });
});