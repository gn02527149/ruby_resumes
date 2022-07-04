$(function() {
    function toggleColor(id, arr, s) {
        var self = this;
        self._i = 0;
        self._timer = null;

        self.run = function() {
            if (arr[self._i]) {
                $(id).css('color', arr[self._i]);
            }
            self._i == 0 ? self._i++ : self._i = 0;
            self._timer = setTimeout(function() {
                self.run(id, arr, s);
            }, s);
        }
        self.run();
    }
    new toggleColor('#header_y', ['#FFE686', '#ddd'], 600);
    new toggleColor('#header_r', ['#FF0000', '#ddd'], 600);
    new toggleColor('#header_g', ['#41BD3E', '#ddd'], 600);
    new toggleColor('#test_r', ['#41BD3E', '#FB0200'], 600);
    new toggleColor('#test_g', ['#FB0200', '#41BD3E'], 600);
    new toggleColor('#test_r1', ['#41BD3E', '#FB0200'], 600);
    new toggleColor('#test_g1', ['#FB0200', '#41BD3E'], 600);
    new toggleColor('#test_r2', ['#41BD3E', '#FB0200'], 600);
    new toggleColor('#test_g2', ['#FB0200', '#41BD3E'], 600);
    new toggleColor('#test_r3', ['#41BD3E', '#FB0200'], 600);

    //加载灯效
    function loadDeng() {
        var dx = $("<div class='dengxiao'></div>"),
            count = 0,
            htmls = "";
        $(".dengxiaoView").append(dx);
        for (var i = 0; i < 6; i++) {
            htmls += "<i class='transform-tzd deng d" + (i + 1) + "'></i>";
        }
        dx.html(htmls);
    }
    loadDeng();

    var scl = 1;
    $(document).scroll(function() {
        var scrollT = $(window).scrollTop();
        //  $("body").attr("top", scrollT );
        var scl_h = $(document).scrollTop();
        //  var w_h=$(window).height();
        if (scl_h > 300 && scl == 1) {
            $('.scl_footer').fadeIn("slow")
        } else {
            $('.scl_footer').fadeOut("slow")
        }
    })
    $('.scl_close').click(function() {
        $('.scl_footer').hide();
        scl = 2;
    })

    $('.kefu').mouseover(function() {
        $(this).removeClass('active')
    })
    $('.kefu_msg p').mouseover(function() {
        $('.kefu_num').show();
    })

    $(function() {
        $('.test_tab a').mouseover(function(e) {
            e.preventDefault(); //阻止a链接的跳转行为
            $(this).tab('show'); //显示当前选中的链接及关联的content
        })
    })


    function tsb() {
        var snum = $('.speed').length;
        var arr_num = [];
        for (var i = 0; i < snum; i++) {
            arr_num.push(Math.random().toFixed(1) * 100 + 30)
        }
        $('.speed').each(function(i) {
            $(this).text('测速中');
        })
        setTimeout(function() {
            $('.speed').each(function(i) {
                $(this).text(arr_num[i] + 'ms');
            })
        }, 1000)

    }
    tsb();



    $('.service .close').click(function() {
        $('.service').hide();
    });

    $('.test_msg_bg').css("height", "2900px");

    //人數增加
    function changePeople() {
        var date = Date.parse(new Date());
        var people = Math.round(date / 3500000 - 200000);
        $('.subtitle span').text(people);
        $('.board .people').text(people);
    }

    function nowTime() {
        setInterval(function() {
            var year = new Date().getFullYear();
            var month = new Date().getMonth();
            var date = new Date().getDate();
            var hours = new Date().getHours();
            var miuntes = new Date().getMinutes();
            var seconds = new Date().getSeconds();
            $('.board .time').text(year + '年' + month + '月' + date + '日 ' + hours + '时' + miuntes + '分' + seconds + '秒');
        }, 1000);
    }

    setInterval(function() {
        changePeople();
    }, 60000);
    changePeople();
    nowTime();

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


    //Go TOP


    $(window).scroll(function() {
        var scrollVal = $(this).scrollTop();

        if (scrollVal > 600) {
            $('.TOP').css("display", "block");
            $(".inquire").css({ "position": "fixed", "top": "0", "left": "50%", "transform": "translateX(-50%)", "width": "1000px", "z-index": "999" });

        } else {
            $('.TOP').css("display", "none");
            $(".inquire").css({
                "width": "100%",
                "position": "relative"
            });
        }

    });

    $('.TOP').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    })

    $('.process_content_box').mouseenter(function() {
        $(this).find("img").toggleClass('Dnone');
    });

    $('.process_content_box').mouseleave(function() {
        $(this).find("img").toggleClass('Dnone');
    });




    $('.inquire .login').click(function() {
        var account = $('.inquire input').val();
        $('.keyaccount input').val(account);
    });

    $('#vipModal .closeBtn').click(function() {
        $('.login').parent().css("display", "block");
    });

})