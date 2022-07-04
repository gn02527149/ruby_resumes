$(document).ready(function() {
    var int = setInterval(function() {
        moveRight();
    }, 4000);

    var slideCount = $('#slider ul li').length;
    var slideWidth = $('#slider ul li').width();
    var slideHeight = $('#slider ul li').height();
    var sliderUlWidth = slideCount * slideWidth;

    $('#slider').css({ width: slideWidth, height: slideHeight });
    $('#slider ul').css({ width: sliderUlWidth, marginLeft: -slideWidth });
    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: +slideWidth
        }, 200, function() {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: -slideWidth
        }, 200, function() {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(function() {
       
        moveLeft();
    });

    $('a.control_next').click(function() {
        
        moveRight();
    });


    $("#slider").hover(function(){
         clearInterval(int);
    },function(){
        int = setInterval(function(){
            $("a.control_next").click();
        },4000);
    });

});





// 進場動畫設定+浮動次選單
$(document).ready(function() {

    var $gameflow = $(".slider-bottom");
    var $license = $('.license');
    var $submenu = $('#submenu');

    var change = function() {
        $submenu.addClass('submenu');
        $('.drop-menu').css('margin-bottom', '20px');
    };

    var unchange = function() {
        $submenu.removeClass('submenu');
        $submenu.addClass('unsubmenu');
        setTimeout(function() {
            $submenu.removeClass('unsubmenu');
        }, 500);
        $('.drop-menu').css('margin-bottom', '0px');
    };
    var $win = $(window);

    $win.on('scroll', function() {
        var top = $win.scrollTop();

        if (top > 500) {
            //捕魚達人
            $gameflow.addClass('animated flipInX');
            //遊戲流程
            $license.addClass('animated flipInX');
        } else {
            //捕魚達人
            $gameflow.removeClass('animated flipInX');
            //遊戲流程
            $license.removeClass('animated flipInX');
        }
    });



    // 浮動次選單
    $win.on('scroll', function() {
        var top = $win.scrollTop();

        if (top > 130) {
            // 假如距離上面300以上，則呼叫change
            change();
        } else {
            // 假如小於300，則呼叫unchange
            unchange();
        }
    });
});




// 牌照展示
$(document).ready(function() {
    $('#licenseShow').mouseenter(function() {
        $('.licenseimg').fadeIn("slow");
    });
    $('#licenseShow').mouseleave(function() {
        $('.licenseimg').delay(1000).fadeOut("slow");
    });

});



// 頁簽預設顯示+自動輪播
var len = $(".tab .tabCons .con").length;
var i = 0;
var s = 2000;
var t;

// 函式 - current Style
function currentLi(idx) {
    $(".tab .tabMenus li").eq(idx).addClass("on").siblings().removeClass("on");
    $(".tab .tabCons .con").eq(idx).show().siblings().hide();
}

// 函式 - timer
function tabTimer() {
    currentLi(i);
    if (i < (len - 1)) {
        i++;
    } else {
        i = 0;
    }
    t = setTimeout("tabTimer()", s);
}

// 觸發 - stop
$(".tab .tabMenus li").on('mouseenter', function(e) {
    clearTimeout(t);
    currentLi($(this).index());
});

$(".gameBox").on('mouseenter', function(e) {
    clearTimeout(t);
});

// 觸發 - start
$(".tab .tabMenus li").on('mouseleave', function(e) {
    i = $(this).index();
    tabTimer();
});
$(".gameBox").on('mouseleave', function(e) {
    tabTimer();
});

// 觸發 - ready
tabTimer();






// 底部滑動触发 - stop
$(".slider-bottom ul li").on('mouseenter', function(e) {
    $(".slider-bottom ul li").siblings().removeClass("active");
    $(this).addClass("active");
});

$('.quitBtn').click(function() {
    $('._logined').hide();
    $('._login').show();
});
$('.loginBtn,.submitBtn').click(function() {
    $('._logined').show();
    $('.loginbox._logined').css("display", "flex");
    $('._login').hide();
});