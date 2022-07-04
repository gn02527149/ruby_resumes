$(function() {
    var login;
    var imgarr = ["img/prize01.png", "img/prize02.png", "img/prize03.png"];
    var clickNum = 3;

    login = 0;
    $('.login-show .btn').click(function() {
        login = 1;
    });
    $('.card,.login,#redux').on("tap", function() {
        scratch();
    });
    $('.card,.login,#redux').mouseover(function() {
        scratch();
    });

    //刮獎
    function scratch() {
        if (login === 1) {
            $('.login,.card').click(function() {
                $(window).scrollTop($('.card').offset().top);
                $('.login-show,.mask').hide();
            });

            $('#redux').css('pointer-events', 'auto');
        } else {
            //登入框
            $('.card,.login').click(function() {
                $('.login-show,.mask').show();
            });

            $('#redux').css('pointer-events', 'none');
        }

        if (clickNum >= 1) {
            $('#redux').eraser({
                size: 50, //设置橡皮擦大小
                completeRatio: 0.5, //设置擦除面积比例
                completeFunction: showResetButton //大于擦除面积比例触发函数
            });
            var thanks = true;
            if (clickNum == 3) {
                arrinfo = imgarr[0];
                $('.hint-show .btn').text('再刮一张').attr("href", "#cardBox");
            } else if (clickNum == 2) {
                arrinfo = imgarr[1];
                $('.hint-show .btn').text('再刮一张').attr("href", "#cardBox");
            } else if (clickNum == 1) {
                arrinfo = imgarr[2];
                $('.hint-show .btn').text('联系兑换专员').attr("href", "#service");
            }
            $("#mask_img_bg img").attr("src", arrinfo);

            function showResetButton() {
                $(".hint-show .hint-img").attr("src", arrinfo);
                if (thanks == true) {
                    $("body .hint-show,body .mask").fadeIn(300);
                    clickNum -= 1;
                }
            }
            $(".mask,.hint-show .close,.hint-show .btn").click(function() {
                $(".hint-show,.mask").fadeOut(300);
                $('#redux').eraser('reset');
                if (clickNum == 3) {
                    arrinfo = imgarr[0];
                    $('.hint-show .btn').text('再刮一张').attr("href", "#cardBox");
                } else if (clickNum == 2) {
                    arrinfo = imgarr[1];
                    $('.hint-show .btn').text('再刮一张').attr("href", "#cardBox");
                } else if (clickNum == 1) {
                    arrinfo = imgarr[2];
                    $('.hint-show .btn').text('联系兑换专员').attr("href", "#service");
                }
                $("#mask_img_bg img").attr("src", arrinfo);
            });
        } else {
            $('#redux').css('pointer-events', 'auto');
            $('.card').click(function() {
                alert('已無刮獎次數');
            });
        }
    }

    //跑馬燈序號
    var num = 0;
    $('.marqueebox li').each(function() {
        $('.num').eq(num).text(num + 1);
        num += 1;
    });

    //登入框關閉
    $(".mask,.login-show .close,.login-show .btn").click(function() {
        $(".login-show,.mask").fadeOut(300);
    });

    //現在時間
    var year = new Date().getFullYear();
    var mouth = new Date().getMonth();
    var date = new Date().getDate();
    var hour = new Date().getHours();
    var min = new Date().getMinutes();
    var sec = new Date().getSeconds();
    $('.time').text(year + "年" + mouth + "月" + date + "日 " + hour + ":" + min + ":" + sec);

    //時間換成人數
    var getTime = new Date().getTime();
    var people = parseInt(getTime / 10000000);
    var people2 = parseInt(people - (people % 50));
    $('.people').text(people);
    $('.people2').text(people2);



    //跑馬燈
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




    //listBar

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

    //登入框關閉
    $(".mask,.reward-show .close,.reward-show .btn").click(function() {
        $(".reward-show,.mask").fadeOut(300);
    });


});