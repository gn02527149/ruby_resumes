$(function() {



    // scroll
    $(window).scroll(function() {
        var $winScTop = $(window).scrollTop();
        var $winHeight = $(window).height();
        var $featuresOT = $('.features').offset().top;
        var $purposeOT = $('.purpose').offset().top;
        var line_change = ($winScTop - $featuresOT) * 0.0015
            // header
        if ($winScTop > 50) {
            $(".header").addClass("appear_f");
        } else {
            $(".header").removeClass("appear_f");
        }

        if ($winScTop + $winHeight >= $featuresOT + 100 && $winScTop < $('.features').offset().top) {
            $(".features_title").addClass("title_move");
        } else {
            $(".features_title").removeClass("title_move");
        }

        if ($winScTop + $winHeight >= $featuresOT + 100) {

            if (line_change > 1) {
                line_change = 1;
            };

            $(".features_line-1").css('transform', 'scaleY(' + line_change + ')');
            $(".features_line-2").css('transform', 'scaleY(' + line_change + ')');
            $(".features_line-3").css('transform', 'scaleX(' + line_change + ')');
            $(".features_line-4").css('transform', 'scaleX(' + line_change + ')');

        }
        if ($winScTop + $winHeight >= $purposeOT + 100 && $winScTop < $('.purpose').offset().top) {
            $('.purpose .img_02').addClass('imgMove');
            $('.purpose .img_03').addClass('imgMove').css("animation-delay", "1s");
        }



    });


    //照片輪播
    var $dataNum = [];
    var curr_id;

    function slider() {
        setInterval(function() {
            curr_id = parseInt($(".curr").attr('data-slide-index'));
            var next_id = curr_id + 1;
            var new_next_id = next_id + 1;
            var imglength = 6;
            for (var i = 0; i < imglength; i++) {
                $dataNum.push($('.img').eq(i).attr('data-slide-index'));
                // 讓下一個增加.curr屬性
                if (parseInt($dataNum[i]) === curr_id + 1) {
                    $('.img').eq(i).addClass('curr').siblings().removeClass('curr');
                };
                // 讓下一個增加.next屬性
                if (parseInt($dataNum[i]) === next_id + 1) {
                    $('.img').eq(i).addClass('next').siblings().removeClass('next');
                };
                // 當curr_id=倒數第二個時,讓第一張加入.next屬性
                if (curr_id === imglength - 1) {
                    $('.img').eq(0).addClass('next').siblings().removeClass('next');
                };
                // 當curr_id=最後一個時,讓第一張加入.curr屬性,第二張加入.next屬性
                if (curr_id === imglength) {
                    $('.img').eq(0).addClass('curr').siblings().removeClass('curr');
                    $('.img').eq(1).addClass('next').siblings().removeClass('next');
                };
            }
            $('.intro_slider_dots_box button').eq(curr_id - 1).addClass('curr_btn').siblings().removeClass('curr_btn');
            $('.text').eq(curr_id - 1).addClass('curr_text').siblings().removeClass('curr_text');
        }, 3000)
    };

    slider();

    $('.intro_slider_dots_box button').click(function() {
        var btn_id = parseInt($(this).attr('data-slide-index'));
        $(this).addClass('curr_btn').siblings().removeClass('curr_btn');
        $('.img').eq(btn_id - 1).addClass('curr').siblings().removeClass('curr');
        $('.img').eq(btn_id).addClass('next').siblings().removeClass('next');
    });


    //照片無限循環
    //--init--
    var $imgItems = $('.testimonials_wrapper').children(),
        $prevBtn = $('.testimonials_arrow-left'),
        $nextBtn = $('.testimonials_arrow-right'),
        imglength = $imgItems.length,
        _currIdx = 0, //目前顯示id=0
        item_next, item_prev; //當前 image id

    //辨識前一張id
    function isPrev(id) {
        if (_currIdx === 0) {
            return id === imglength - 1;
        } else {
            return id === _currIdx - 1;
        }
    }
    //辨識後一張id
    function isNext(id) {
        if (_currIdx === imglength - 1) {
            return id === 0;
        } else {
            return id === _currIdx + 1;
        }
    }
    //辨識目前顯示id
    function isActive(id) {
        return id === _currIdx;
    }

    //切換前中後
    function renderView() {
        $imgItems.each(function(id, item) {
            $(item).removeClass().addClass('testimonials_content_box hide');
            if (isPrev(id)) {
                $(item).addClass('prev');
                item_prev = parseInt($(item).attr('data-index'));
            }
            if (isNext(id)) {
                $(item).addClass('next');
                item_next = parseInt($(item).attr('data-index'));
            }
            if (isActive(id)) {
                $(item).addClass('curr');
            }
        });
    };


    //若為最後一張,下一張為第0張
    function nextPage() {

        $('.testimonials_header_item').eq(item_next - 1).addClass('appear_b').siblings().removeClass('appear_b');
        $('.testimonials_number').eq(item_next - 1).addClass('state-visible').siblings().removeClass('state-visible');


        if (_currIdx < imglength - 1) {
            _currIdx++;
        } else {
            _currIdx = 0;
        }
        return;
    }
    //若為第0張,前一張為最後一張
    function prevPage() {

        $('.testimonials_header_item').eq(item_prev - 1).addClass('appear_b').siblings().removeClass('appear_b');
        $('.testimonials_number').eq(item_prev - 1).addClass('state-visible').siblings().removeClass('state-visible');


        if (_currIdx > 0) {
            _currIdx--;
        } else {
            _currIdx = imglength - 1;
        }
        return;

    }

    function init() {
        renderView();
    }

    init();
    console.log(item_prev);
    console.log(item_next);

    $nextBtn.on('click', function() {
        nextPage();
        renderView();
    });

    $prevBtn.on('click', function() {
        prevPage();
        renderView();
    });












});

$(function() {
    $('a[href=#contentUs]').click(function() {
        $('html,body').animate({
            scrollTop: $('#contentUs').offset().top
        }, 3000);
        return false;
    });
    $('a[href=#aboutUs]').click(function() {
        $('html,body').animate({
            scrollTop: $('#aboutUs').offset().top
        }, 3000);
        return false;
    });

});