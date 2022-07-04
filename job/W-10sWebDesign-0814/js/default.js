// 按下10秒按鈕跳登入
$('.start_btn').on('click', function() {
    $('.modal__bg').fadeIn();
});

//按下登入跳回遊戲頁按鈕換成開始遊戲
$('.login').on('click', function() {
    $('.modal__bg').fadeOut();
    $('.start_btn').remove();
    $('.arrow').remove();
    //換成開始遊戲鈕
    $('.block02').append(
		$('<button>')
		.addClass('play_btn').attr('id', 'play_btn')
	);
});

//按下關閉鈕，modal淡出
$('.close').on('click', function() {
    $('.modal__bg').animate({ height: 'hide' });
    $('.modal__bg__miss').animate({ height: 'hide' });
    $('.modal__bg__gift').animate({ height: 'hide' });
    $('.modal__bg__result').animate({ height: 'hide' });
});






//按下中獎查詢跳出結果
$('.result').on('click', function() {
    $('.modal__bg__result').fadeIn();
     unScroll();
});



//啟動遊戲
var is_started = false,
    timeout,
    start_time,
    $second = $("#second"),
    $play_btn = $("#play_btn");

        function start() {

            $.get("./api.php", {act: "start"});
            start_time = new Date();

            var loop = function() {
                timeout = setTimeout(function() {
                    $second.html(function() {
                        var elapsed_time = ((new Date()).getTime() - start_time.getTime()) / 1000;
                        return parseFloat(elapsed_time).toFixed(2);
                    });
                    loop();
                }, 20); // 數值越小較容易壓中整數，但越耗效能
            };
            loop();
        }

        function stop() {
            timeout && clearTimeout(timeout);
            $.get("./api.php", {act: "stop"})
                .done(function(data) {
                    $second.html(data);
                });
        }

       

        $('.block02').on('click', '#play_btn' , function(){
            if (is_started) {
                // send result to API
                is_started = false;
                stop();
                $(this).attr("class", "play_btn");

                //中獎彈窗
                $('.modal__bg__gift').show();
                
            } else {
                // set timeout
                is_started = true;
                start();
                $(this).attr("class", "stop_btn");
            }
         });




       
        