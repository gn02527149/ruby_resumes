$.fn.extend({
    animateCss: function(animationName, method) {
        if ($(this).is(".active")) return;
        var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        if (method && typeof method.before === "function") {
            method.before($(this));
        }
        if (method && method.infinite) {
            $(this).addClass("infinite");
        }
        $(this).addClass('active animated ' + animationName).one(animationEnd, function() {
            $(this).removeClass('animated ' + animationName);
            if (method && typeof method.after === "function") {
                method.after($(this));
            } else if (typeof method == "function") {
                method($(this));
            }
        });
    }
});
$(function() {
    // banner图
    var bannerSwiper = new Swiper('.swiper-container', {
        direction: 'horizontal',
        loop: true,
        // 如果需要分页器
        pagination: {
            el: '.swiper-pagination'
        },
        autoplay: true,
        parallax: true,
        // 如果需要前进后退按钮
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
    setSectionHeight();

    // 设置内容页高度为整屏
    function setSectionHeight() {
        var windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight,
            windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        windowWidth = windowWidth < 1200 ? 1200 : windowWidth;
        //                if (windowWidth / windowHeight > 1.7 && windowWidth / windowHeight < 2.3) {
        $("#fullPage .section").css("height", windowHeight);
        //                }else{
        //                    $("#fullPage .section").css("height", windowWidth / 1.7777);
        //                }
        var sectionTitleHeight = $(".section-tittle-content").innerHeight();
        var sectionContentHeight = windowHeight - sectionTitleHeight - 60;
        if (sectionContentHeight < 680) {
            $(".section-image-content").height(sectionContentHeight);
        }
    }

    // 大写监听
    function detectCapsLock(event) {
        var e = event || window.event;
        var o = e.target || e.srcElement;
        var keyCode = e.keyCode || e.which; // 获取按键的keyCode
        var isShift = e.shiftKey || (keyCode == 16) || false;
        // 判断shift键是否按住
        if (
            ((keyCode >= 65 && keyCode <= 90) && !isShift)
            // Caps Lock 打开，且没有按住shift键
            ||
            ((keyCode >= 97 && keyCode <= 122) && isShift)
            // Caps Lock 打开，且按住shift键
        ) {
            $(".input-password").tooltip('show');
        } else {
            $(".input-password").tooltip('hide');
        }
    }

    // 表单验证，成功进行登录
    $('.plugin-fv').formValidation({
        locale: 'zh_CN'
    }).on('success.form.fv', function(e) {
        e.preventDefault();
        var data = {},
            url = App.url_prefix + "/api/login";
        data.password = $(".login-input-password").val();
        data.name = $(".login-input-name").val();
        $(".login-btn-submit").attr("disabled", "disabled");
        $.ajax({
            url: url,
            data: data,
            method: "POST",
            success: function(data) {
                $(".login-btn-submit").removeAttr("disabled");
                $.cookie("userToken", "Bearer " + data.token, {
                    path: '/'
                });
                $.cookie("userRole", data.role, {
                    path: '/'
                });
                $.removeCookie("per_page");
                if (data.role === "broker") {
                    window.location.replace("user/broker/home");
                } else {
                    window.location.replace("user/home");
                }
            },
            error: function(xhr) {
                var result = xhr.responseJSON.error;
                bootbox.alert("登录失败" + result);
            }
        });
    });
    // 退出登录
    $(".profile-btn-logout").click(function() {
        logout();
    });
    // 使用enter进行取消错误弹窗提示
    $(document).keydown(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if ($(".bootbox").css("display") === "block") return;
        if (keycode == '13') {
            $("#loginForm").submit();
        }
    });
    $('#password').keypress = detectCapsLock;
    var hei = document.body.clientHeight;
    //如果不加时间控制，滚动会过度灵敏，一次翻好几屏
    var startTime = 0, //翻屏起始时间
        endTime = 0,
        now = 0;

    setPageScroll();

    function setPageScroll() {
        //浏览器兼容
        if ((navigator.userAgent.toLowerCase().indexOf("firefox") != -1)) {
            document.addEventListener("DOMMouseScroll", scrollFun, false);
        } else if (document.addEventListener) {
            document.addEventListener("mousewheel", scrollFun, false);
        } else if (document.attachEvent) {
            document.attachEvent("onmousewheel", scrollFun);
        } else {
            document.onmousewheel = scrollFun;
        }
    }

    //滚动事件处理函数
    function scrollFun(event) {
        startTime = new Date().getTime();
        var delta = -(event.detail || (-event.wheelDelta));
        //mousewheel事件中的 “event.wheelDelta” 属性值：返回的如果是正值说明滚轮是向上滚动
        //DOMMouseScroll事件中的 “event.detail” 属性值：返回的如果是负值说明滚轮是向上滚动
        if ((endTime - startTime) < -1000) {
            if (delta > 0) {
                //向下滚动
                toPage(--now);
            }
            if (delta < 0) {
                //向上滚动
                toPage(++now);
            }
            endTime = new Date().getTime();
        } else {
            event.preventDefault();
        }
    }

    function scrollPosition() {
        var position = window.location.hash.substring(1);
        $(".index_" + position).trigger("click");
        if (position === "footer") {
            toPage(4);
        }
    }

    $(".btn-next-section").click(function() {
        toPage(++now);
    });
    $(".index_agent").click(function() {
        toPage(1);
    });
    $(".index_consignment").click(function() {
        toPage(2);
    });
    $(".index_alliance").click(function() {
        toPage(3);
    });
    scrollPosition();
    $(".vertical-position ul li").click(function() {
        if ($(this).is(".active")) return;
        var position = $(this).attr("class").substring($(this).attr("class").length - 1);
        toPage(position - 0);
    });

    function toPage(index) {
        if (index || index == 0) {
            now = index;
        }
        if (now <= 0) {
            now = 0;
        } else if (now >= 4) {
            now = 4;
        }
        var topPosition = 0,
            animate,
            activeContent = '';
        switch (now) {
            case 0:
                topPosition = 0;
                activeContent = 'index';
                $(".vertical-position").fadeOut(500);
                break;
            case 1:
                $(".vertical-position").fadeIn(500);
                activeContent = 'agent';
                topPosition = $(".domain-agent").offset().top;
                animate = agentAnimateContent;
                $(".domain-agent").find(".active").removeClass("active");
                break;
            case 2:
                $(".vertical-position").fadeIn(500);
                activeContent = 'consignment';
                topPosition = $(".domain-consignment").offset().top;
                animate = consignmentAnimateContent
                $(".domain-consignment").find(".active").removeClass("active");
                break;
            case 3:
                $(".vertical-position").fadeIn(500);
                activeContent = 'alliance';
                animate = allianceAnimateContent;
                topPosition = $(".domain-alliance").offset().top;
                $(".domain-alliance").find(".active").removeClass("active");
                break;
            case 4:
                $(".vertical-position").fadeOut(500);
                activeContent = 'footer';
                topPosition = $("footer").offset().top;
                break;
        }
        $("html,body").animate({
            scrollTop: topPosition
        }, 1000, function() {
            if (typeof animate === "function") {
                animate();
            }
            checkActive();
            window.location.hash = "#" + activeContent;
            $(".position-" + now).addClass("active").siblings("li").removeClass("active");
        });
    }

    agentAnimateContent();

    // 域名代理动画
    function agentAnimateContent() {
        $(".agent_people_left").animateCss("slideInLeft", function() {
            $(".agent_gate").animateCss("slideInUp", function() {
                agentTipAnimate(0);
            });
        });
        $(".agent_gate_r1").animateCss("zoomInDown", function() {
            agentPeopleShow();
            $(".agent_gate_r2").animateCss("zoomInDown", function() {
                streetSign();
            });
        });

        function agentTipAnimate(index) {
            if (index >= $(".agent_agent_tip").length) {
                $(".agent_gate2").animateCss("slideInLeft", function() {
                    streetSign();
                });
                $(".agent_cloud_left").animateCss("zoomIn");
                return;
            }
            $(".agent_agent_tip").eq(index).animateCss("bounceIn", {
                before: function() {
                    setTimeout(function() {
                        agentTipAnimate(++index);
                    }, 200);
                }
            });
        }

        function streetSign() {
            $(".agent_gate3").animateCss("zoomInDown");
            $(".agent_gate_r4").animateCss("zoomInDown");
        }


        function agentPeopleShow() {
            $(".agent_gate_r3").animateCss("zoomInDown");
            $(".agent_people_right").animateCss("zoomIn", function() {
                $(".agent_cloud_right").animateCss("zoomIn", function() {
                    $(".agent_btn_join").animateCss("flash");
                });
            });
        }
    }

    // 域名寄售动画
    function consignmentAnimateContent() {
        $(".consignment_people_left").animateCss("slideInLeft");
        $(".consignment_blackboard").animateCss("slideInRight", function() {
            blackBoardTip(0);
            $(".consignment_people_right").animateCss("zoomIn", function() {
                $(".consignment_cloud_right").animateCss("zoomIn")
            });
        });
        $(".consignment—pear01").animateCss("slideInLeft", function() {
            $(".consignment—pear02").animateCss("bounceInDown", function() {
                $(".consignment—pear03").animateCss("bounceInDown", {
                    before: function() {
                        $(".consignment_cloud_left").animateCss("zoomIn");
                    },
                    after: function() {
                        $(".consignment—pear01").animate("swing", {
                            infinite: true
                        });
                    }
                });
            });
        });

        function blackBoardTip(index) {
            $(".consignment_blackboard li").eq(index).animateCss("flipInX", function() {
                blackBoardTip(++index);
            });
        }
    }

    // 中介联盟动画
    function allianceAnimateContent() {
        bookDown(0);
        $(".alliance_people_right").animateCss("fadeInRight", function() {
            $(".alliance_lightning").animateCss("flash", function(event) {
                $(".alliance_lightning").animateCss("flash");
            });
            goldIn(0);
        });


        function goldIn(index) {
            if (index > $(".alliance_gold").length) {
                return;
            }
            $(".alliance_gold").eq(index).animateCss("lightSpeedIn", {
                before: function() {
                    setTimeout(function() {
                        goldIn(++index);
                    }, 200);
                }
            });
        };

        function bookDown(index) {
            if (index >= $(".alliance-book").length) {
                return;
            }
            $(".alliance-book").eq(index).animateCss("bounceInDown", {
                before: function() {
                    setTimeout(function() {
                        bookDown(++index);
                    }, 300)
                }
            });
        };
    }
});