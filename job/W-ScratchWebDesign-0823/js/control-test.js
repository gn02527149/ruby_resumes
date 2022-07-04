$(function() {

    //中獎查詢

    $('.Inquire').click(function() {
        $('#iqModal').css("display", "flex");
    });

    // 會員登入按鈕跳次數
    $("#loginInBtn").on('click', function() {
        $("body").css('padding-right', '0px')
        $("#loginModal").modal('hide');
        $("#memberTime").css({ "display": "flex" });
    });
    $('.banner_content').click(function() {
        $('#loginModal').css("display", "flex");
    });
    // 點中第一張鎖
    $("#showcase li").click(function() {
        var num = $(this).attr("data-id");
        $("#checkChoose").modal().css("display", "flex");
        $('.cardbox .card').css('background-image', 'url(images/label00' + num + '.png)');
        if ($(document).height() > $(window).height()) {
            $("html").addClass("noscroll");
        } else {
            $("html").addClass("fixWindow");
        }
    });
    $('.receive').click(function() {
        $(".box-con li").eq(2).click();
    });

    //跳出確認視窗
    $("#sureBtn").click(function() {
        $('.cardbox').show();
        $("#checkChoose").modal('hide');
        //show出刮刮卡
        $("#cardBox").removeClass('h');
    })

    //取消的話直接重RELOAD
    $('#notSure').click(function() {
        location.reload();
    });

    $('#giftModal .gift-ok').click(function() {
        location.reload();
        // removeUnScroll();
    });



});