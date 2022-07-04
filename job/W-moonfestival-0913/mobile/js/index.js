$(document).ready(function() {
    window.setTimeout(function() {
        $(".loading").fadeOut(500)
    }, 500)
    TouchSlide({
        slideCell: "#slideBox",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        effect: "leftLoop",
        autoPage: true, //自动分页
        autoPlay: true //自动播放
    });

    $('.btn_rule').click(function() {

        $(this).toggleClass('active');
        $(this).parents('.rcontent').find('.details').slideToggle();
    });


    $('.topqie ul li').click(function() {

        var sx1 = $(this).index();
        var sx2 = $('.botqie').find('.singerk').index();
        sx2 = sx1;
        $(this).addClass('active').siblings().removeClass('active');
        $('.botqie').find('.singerk').eq(sx2).addClass('cur').siblings().removeClass('cur');
    });

    $('.colse_btn').click(function() {

        $(this).parents('.tanslidege').fadeOut();
    });

    $('.tanslidege').click(function() {

        $(this).fadeOut();
    });

    function stopBuFn(e) {
        var e = e || event;
        if (e && e.stopPropagation) {
            e.stopPropagation();

        } else {
            e.cancelBubble = true;
        }
    }

    $('.delpager').click(function(e) {
        stopBuFn(e);
    });


    $('.hamberger').click(function() {
        $('.sidebar').toggleClass('block');
    });
});