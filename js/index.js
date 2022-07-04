$(function () {
    var WW = $(window).width();
    var HDST;

    if (WW > 450){
        HDST = ($('.moduleHeader').offset().top + 100);
    }else{
        HDST = ($('.moduleHeader').offset().top + 50);
    }

    $(window).scroll(function () {
        let WST = $(window).scrollTop();
        if (WST > HDST) {
            $('.moduleHeader').css({
                "position": "fixed",
                "top": "0"
            });
            $('.container-fluid>div').css({
                "margin-top": "50px"
            });
        } else if (WST <= HDST) {
            $('.moduleHeader').css({
                "position": "relative"
            });
            $('.container-fluid>div').css({
                "margin-top": "0px"
            });
        }
        
    });

    var aboutH = $('#about').offset().top;
    var experienceH = $('#experience').offset().top;
    var skillH = $('#skill').offset().top;
    var worksH = $('#works').offset().top;

    $('.About').click(function(){
        $('body,html').animate({
            scrollTop: aboutH
        }, 500);
    });
    $('.Experience').click(function () {
        $('body,html').animate({
            scrollTop: experienceH
        }, 500);
    });
    $('.Skill').click(function () {
        $('body,html').animate({
            scrollTop: skillH
        }, 500);
    });
    $('.Works').click(function () {
        $('body,html').animate({
            scrollTop: worksH
        }, 500);
    });

    $('.demo-heading').typeIt({
        whatToType: ["HI! I'm Ruby", "I'm a front-end engineer"],
        typeSpeed: 100
    });

});