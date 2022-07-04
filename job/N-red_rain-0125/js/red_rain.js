$(function() {
    //回到ＴＯＰ
    $(".turnTop").click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });



    //時間倒數＋紅包雨
    function getStartTime() {

        var EndTime = new Date("2018/01/22 15:00:00");
        var NowTime = new Date();
        var t = EndTime.getTime() - NowTime.getTime();

        if (t <= 0) {
            window.location.reload();
        }

        var d = Math.floor(t / 1000 / 60 / 60 / 24);
        var h = Math.floor(t / 1000 / 60 / 60 % 24);
        var m = Math.floor(t / 1000 / 60 % 60);
        var s = Math.floor(t / 1000 % 60);

        document.getElementById("left_d").innerHTML = d;

        document.getElementById("left_h").innerHTML = h;
        document.getElementById("left_m").innerHTML = m;
        document.getElementById("left_s").innerHTML = s;

        $("#div_title").html("距离活动开始：");

    }

    function getEndTime() {

        var EndTime = new Date("2018/11/25 11:59:59");
        var NowTime = new Date();
        var t = EndTime.getTime() - NowTime.getTime();

        if (t <= 0) {
            window.location.reload();
        }

        var d = Math.floor(t / 1000 / 60 / 60 / 24);
        var h = Math.floor(t / 1000 / 60 / 60 % 24);
        var m = Math.floor(t / 1000 / 60 % 60);
        var s = Math.floor(t / 1000 % 60);

        document.getElementById("left_d").innerHTML = d;

        document.getElementById("left_h").innerHTML = h;
        document.getElementById("left_m").innerHTML = m;
        document.getElementById("left_s").innerHTML = s;

        $("#div_title").html("距离活动结束：");
    }


    setInterval(getEndTime, 1000);
    $(document).snowfall('clear');
    $(document).snowfall({
        image: "images/hongbao.png",
        flakeCount: 25,
        flakeIndex: 8,
        minSize: 50,
        maxSize: 80
    });


    //Marquee
    $('#marquee').kxbdSuperMarquee({
        isMarquee: true,
        isEqual: false,
        scrollDelay: 20,
        controlBtn: {
            up: '#goUM',
            down: '#goDM'
        },
        direction: 'up'
    });


    $('.snowfall-flakes').on('click', function() {
        $('#redBagRain').modal('show');
    });


    $("#gethongbao").click(function() {
        $('#redBagRain').modal('hide');
    });



    //開紅包

    $(".open").click(function() {

        $(".open,.ward_cont").css("display", "none");
        $("#redBagopen .modal-dialog-top").addClass("turnOpen");
        $("#redBagopen .giftbox").addClass("turnLetter");
        setTimeout(function() {
            $("#redBagopen .modal-dialog-top").removeClass("turnOpen").css({
                "background-image": "url(images/hongb-t-o.png)",
            });
            $("#redBagopen .modal-dialog").css("background-image", "url(images/hongb-b-o.png)");
        }, 550);
    });
});
