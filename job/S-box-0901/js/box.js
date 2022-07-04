$(function() {

    //開寶箱
    $('.allboxs img').click(function() {
        var boxName = $(this).attr('class').slice(4, 6);
        $.ajax({
            type: "post",
            url: "js/url.json",
            success: function(data) {
                var src = data.src;
                $('.barrier').css("display", "block").append('<img class="box' + boxName + '" src="images/' + boxName + '.gif" alt=""><div class="board"><div class="board-top"><img src="images/board-title.png"></div><div class="board-cont"><p>尊敬的会员<br>恭喜您获得以下礼品</p><img src="' + src + '"></div><div class="close-btn"></div></div>');
                setTimeout(function() {
                    $('.board').addClass('open');
                }, 1500);
                setTimeout(function() {
                    $('.box' + boxName).attr('src', "");
                }, 2000);
            }
        })

    });


    $('body').on('click', '.close-btn', function() {
        $('.barrier').remove();
        $('body').append("<div class='barrier'></div>");
    });



    //Marquee
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


    $('.snowfall-flakes').on('click', function() {
        $('#redBagRain').modal('show');
    });


    $("#gethongbao").click(function() {
        $('#redBagRain').modal('hide');
    });

});