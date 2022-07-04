/*-------------------------- +
        获取id, class, tagName
        +-------------------------- */
var get = {
    byId: function(id) {
        return typeof id === "string" ? document.getElementById(id) : id
    },
    byClass: function(sClass, oParent) {
        var aClass = [];
        var reClass = new RegExp("(^| )" + sClass + "( |$)");
        var aElem = this.byTagName("*", oParent);
        for (var i = 0; i < aElem.length; i++) reClass.test(aElem[i].className) && aClass.push(aElem[i]);
        return aClass
    },
    byTagName: function(elem, obj) {
        return (obj || document).getElementsByTagName(elem)
    }
};
/*-------------------------- +
事件绑定, 删除
+-------------------------- */
var EventUtil = {
    addHandler: function(oElement, sEvent, fnHandler) {
        oElement.addEventListener ? oElement.addEventListener(sEvent, fnHandler, false) : (oElement["_" + sEvent + fnHandler] = fnHandler, oElement[sEvent + fnHandler] = function() {
            oElement["_" + sEvent + fnHandler]()
        }, oElement.attachEvent("on" + sEvent, oElement[sEvent + fnHandler]))
    },
    removeHandler: function(oElement, sEvent, fnHandler) {
        oElement.removeEventListener ? oElement.removeEventListener(sEvent, fnHandler, false) : oElement.detachEvent("on" + sEvent, oElement[sEvent + fnHandler])
    },
    addLoadHandler: function(fnHandler) {
        this.addHandler(window, "load", fnHandler)
    }
};
/*-------------------------- +
设置css样式
读取css样式
+-------------------------- */
function css(obj, attr, value) {
    switch (arguments.length) {
        case 2:
            if (typeof arguments[1] == "object") {
                for (var i in attr) i == "opacity" ? (obj.style["filter"] = "alpha(opacity=" + attr[i] + ")", obj.style[i] = attr[i] / 100) : obj.style[i] = attr[i];
            } else {
                return obj.currentStyle ? obj.currentStyle[attr] : getComputedStyle(obj, null)[attr]
            }
            break;
        case 3:
            attr == "opacity" ? (obj.style["filter"] = "alpha(opacity=" + value + ")", obj.style[attr] = value / 100) : obj.style[attr] = value;
            break;
    }
};

EventUtil.addLoadHandler(function() {
    var oMsgBox = get.byId("msgBox");
    var oUserName = get.byId("userName");
    var oConBox = get.byId("conBox");
    var oSendBtn = get.byId("sendBtn");
    var oMaxNum = get.byClass("maxNum")[0];
    var oCountTxt = get.byClass("countTxt")[0];
    var oList = get.byClass("list")[0];
    var oUl = get.byTagName("ul", oList)[0];
    var aLi = get.byTagName("li", oList);
    var aFtxt = get.byClass("f-text", oMsgBox);
    var aImg = get.byTagName("img", get.byId("face"));
    var bSend = false;
    var timer = null;
    var oTmp = "";
    var i = 0;
    var maxNum = 140;

    //禁止表单提交
    EventUtil.addHandler(get.byTagName("form", oMsgBox)[0], "submit", function() {
        return false
    });

    //为广播按钮绑定发送事件
    EventUtil.addHandler(oSendBtn, "click", fnSend);

    //为Ctrl+Enter快捷键绑定发送事件
    EventUtil.addHandler(document, "keyup", function(event) {
        var event = event || window.event;
        event.ctrlKey && event.keyCode == 13 && fnSend()
    });

    var headSrc = "/images/face626.png";
    $('#headbox td img').click(function() {
        headSrc = $(this).attr("src");
        $('#headbox').hide();
        $('form .userPic img').attr("src", headSrc);
    });

    //发送广播函数
    function fnSend() {
        var reg = /^\s*$/g;

        if (reg.test(oConBox.value)) {
            alert("\u968f\u4fbf\u8bf4\u70b9\u4ec0\u4e48\u5427\uff01");
            oConBox.focus()
        } else {
            var oLi = document.createElement("li");
            var oDate = new Date();
            var ConBoxValue = replace_em(oConBox.value.replace(/<[^>]*>|&nbsp;/ig, ""));
            var oUserNameHtml;
            if ($('#noname').prop('checked')) {
                oUserNameHtml = "匿名";
            } else if (!oUserNameHtml) {
                oUserNameHtml = "游客";
            } else {
                oUserNameHtml = oUserName.innerHTML;
            }

            oLi.innerHTML = "<div class=\"userPic\"><img src=\"" + headSrc + "\"></div>\
                            <div class=\"content\">\
                                <div class=\"userName\"><a href=\"javascript:;\">" + oUserNameHtml + "</a>:</div>\
                            <div class=\"msgInfo\">" + ConBoxValue + "</div>\
                            <div class=\"times\"><span>" + format(oDate.getMonth() + 1) + "\u6708" + format(oDate.getDate()) + "\u65e5 " + format(oDate.getHours()) + ":" + format(oDate.getMinutes()) + "</span></div>\
                        </div>";
            //插入元素
            aLi.length ? oUl.insertBefore(oLi, aLi[0]) : oUl.appendChild(oLi);

            //重置表单
            get.byTagName("form", oMsgBox)[0].reset();
            for (i = 0; i < aImg.length; i++) aImg[i].className = "";
            aImg[0].className = "current";

            //将元素高度保存
            var iHeight = oLi.clientHeight - parseFloat(css(oLi, "paddingTop")) - parseFloat(css(oLi, "paddingBottom"));
            var alpah = count = 0;
            css(oLi, {
                "opacity": "0",
                "height": "0"
            });
            timer = setInterval(function() {
                css(oLi, {
                    "display": "block",
                    "opacity": "0",
                    "height": (count += 8) + "px"
                });
                if (count > iHeight) {
                    clearInterval(timer);
                    css(oLi, "height", iHeight + 21 + "px");
                    timer = setInterval(function() {
                        css(oLi, "opacity", (alpah += 10));
                        alpah > 100 && (clearInterval(timer), css(oLi, "opacity", 100))
                    }, 30)
                }
            }, 30);
        }
    };

    //输入框获取焦点时样式
    for (i = 0; i < aFtxt.length; i++) {
        EventUtil.addHandler(aFtxt[i], "focus", function() {
            this.className = "active"
        });
        EventUtil.addHandler(aFtxt[i], "blur", function() {
            this.className = ""
        })
    }

    //格式化时间, 如果为一位数时补0
    function format(str) {
        return str.toString().replace(/^(\d)$/, "0$1")
    }




    $('.emotion').qqFace({

        id: 'facebox',

        assign: 'conBox',

        path: 'arclist/' //表情存放的路径

    });


    //查看结果

    function replace_em(str) {

        str = str.replace(/\</g, '&lt;');

        str = str.replace(/\>/g, '&gt;');

        str = str.replace(/\n/g, '<br/>');

        str = str.replace(/\[em_([0-9]*)\]/g, '<img src="arclist/$1.gif" border="0" />');

        return str;

    }

    $('#headbox').hide();
    $('.head').click(function(e) {
        $('#headbox').show();
        e.stopPropagation();
        e.preventDefault();
    });
    $(document).click(function() {
        $('#headbox').hide();
    });
    $('#headbox').click(function(e) {
        e.stopPropagation();
        e.preventDefault();
        return false;
    });

});