// ******************************************pk10*******************************************************
var stop1, stop2, stop3, stop4, stop5, stop6, stop7;
var st;


var result1 = function(drawTime, leg, num) {
    clearInterval(stop1);
    stop1 = setInterval(function() {
        showTime("#pk", drawTime, leg, num);
    }, 1000);
}

var result2 = function(drawTime, leg, num) {
    clearInterval(stop2);
    stop2 = setInterval(function() {
        showTime("#cqssc", drawTime, leg, num);
    }, 1000);
}
var result3 = function(drawTime, leg, num) {
    clearInterval(stop3);
    stop3 = setInterval(function() {
        showTime("#tjssc", drawTime, leg, num);
    }, 1000);
}

var result4 = function(drawTime, leg, num) {
    clearInterval(stop4);
    stop4 = setInterval(function() {
        showTime("#xjssc", drawTime, leg, num);
    }, 1000);
}
var result5 = function(drawTime, leg, num) {
    clearInterval(stop5);
    stop5 = setInterval(function() {
        showTime("#klsf", drawTime, leg, num);
    }, 1000);
}

var result6 = function(drawTime, leg, num) {
    clearInterval(stop6);
    stop6 = setInterval(function() {
        showTime("#syy", drawTime, leg, num);
    }, 1000);

}
var result7 = function(drawTime, leg, num) {
    clearInterval(stop7);
    stop7 = setInterval(function() {
        showTime("#sxw", drawTime, leg, num);
    }, 1000);
}


var data_item = [
    { "url": "json/pk.json","id": "#pk","result": result1,"leg": "10"},
    { "url": "json/cqssc.json", "id": "#cqssc", "result": result2, "leg": "5" },
    { "url": "json/tjssc.json", "id": "#tjssc", "result": result3, "leg": "3" },
    { "url": "json/xjssc.json", "id": "#xjssc", "result": result4, "leg": "5" },
    { "url": "json/klsf.json", "id": "#klsf", "result": result5, "leg": "3" },
    { "url": "json/syy.json", "id": "#syy", "result": result6, "leg": "8" },
    { "url": "json/sxw.json", "id": "#sxw", "result": result7, "leg": "5" }
];


Results("json/pk.json", "#pk", result1, 10, 0);
Results("json/cqssc.json", "#cqssc", result2, 5, 1);
Results("json/tjssc.json", "#tjssc", result3, 3, 2);
Results("json/xjssc.json", "#xjssc", result4, 5, 3);
Results("json/klsf.json", "#klsf", result5, 3, 4);
Results("json/syy.json", "#syy", result6, 8, 5);
Results("json/sxw.json", "#sxw", result7, 5, 6);



function Results(url, id, callback, leg, num) {
    $.ajax({
        type: "get",
        url: url,
        cache: false,
        success: function(data) {
            // var data = JSON.parse(data);
            $(id + ' .data_item_msg_tltle_num').text(data.result.data.preDrawIssue);
            var arr = data.result.data.preDrawCode.split(',');
            var drawTime = data.result.data.drawTime;

            callback(drawTime, leg, num);


            $(id + ' .data_item_msg_num').html('');
            var hm = [];


            for (var i = 0; i < arr.length; i++) {
                if (arr[i].length > 1) {
                    hm.push('<span class="nub nub' + arr[i].replace(/\b(0+)/gi, "") + '">' + arr[i].replace(/\b(0+)/gi, "") + '</span>');
                } else {
                    hm.push('<span class="nub nub' + arr[i] + '">' + arr[i] + '</span>');
                }

            }
            arr = [];

            for (var j = 0; j < hm.length; j++) {
                var t;
                (function(x) {
                    if (x === hm.length) {
                        clearTimeout(t);
                    } else {
                        t = window.setTimeout(function() {
                            $(id + ' .data_item_msg_num').append(hm[x]);
                        }, 300 * x);
                    }

                })(j);
            }

        }
    })

}
$(".data_item_msg.fl").append("<span class='time'></span>");




//*********************************????????????**********************************************

function checkTime(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
}

function showTime(id, drawTime, leg, num) {
    var curtime, endtime, lefttime, d, h, m, s;

    curtime = new Date();
    endtime = new Date(drawTime.replace(/-/g, '/'));
    lefttime = parseInt((endtime.getTime() - curtime.getTime()) / 1000);
    d = parseInt(lefttime / (24 * 60 * 60));
    h = parseInt(lefttime / (60 * 60) % 24);
    m = parseInt(lefttime / 60 % 60);
    s = parseInt(lefttime % 60);

    m = checkTime(m);
    s = checkTime(s);


    if (lefttime > 0) {
        $(id + " .data_item_msg.fl .time").html(m + '???' + s + '???');
    }
    if (lefttime < 0) {
        $(id + " .data_item_msg.fl .time").html("?????????...");
    }
    if (lefttime === -1) {
        run(id, leg);
    }
    if (lefttime === -90) {
        stop(id, leg);
        Results(data_item[num].url, data_item[num].id, data_item[num].result, data_item[num].leg, num);
    }



}

// ******************************************???????????????*******************************************************

function getRandom(minNum, maxNum) { //?????? minNum(?????????) ~ maxNum(?????????) ???????????????
    return Math.floor(Math.random() * (maxNum - minNum + 1)) + minNum;
}

function getRandomArray(minNum, maxNum, n) { //????????????????????????n?????????
    var rdmArray = [n]; //?????????????????????

    for (var i = 0; i < n; i++) {
        var rdm = 0; //???????????????

        do {
            var exist = false; //????????????????????????
            rdm = getRandom(minNum, maxNum); //????????????

            //???????????????????????????????????????????????????????????????
            if (rdmArray.indexOf(rdm) != -1) exist = true;

        } while (exist); //??????????????????????????????????????????

        rdmArray[i] = rdm;
    }
    return rdmArray;
}

function run(id, leg) {

    st = window.setInterval(function() {

        $(id + ' .data_item_msg_num').html('');
        var runarr;
        var _hm = [];
        runarr = getRandomArray(0, 9, leg);
        for (var i = 0; i < runarr.length; i++) {
            _hm.push('<span class="nub nub' + runarr[i] + '">' + runarr[i] + '</span>');
        }
        for (var l = 0; l < _hm.length; l++) {

            $(id + ' .data_item_msg_num').append(_hm[l]);

        }
    }, 100);
    $(id).attr("data-timer-id", st);

}

function stop(id) {
    window.clearInterval($(id).attr("data-timer-id"));
    $(id + ' .data_item_msg_num').html('');
}



// ******************************************?????????*******************************************************
Array.prototype.insert = function(index, item) {
    this.splice(index, 0, item);
};

var lotteryinterval, timerinterval;
var nowdatetime;


function timer() {
    $.ajax({
        type: "GET",
        url: "https://1680660.com/smallSix/findSmallSixInfo.do",
        success: function(data) {
            var data = JSON.parse(data);

            // ????????????
            var timeinterval, lotterytime;
            var countdown = new Date(data.result.data.drawTime.replace(/-/g, '/'));

            function getRemainingTime(endtime) {
                var milliseconds = parseInt((new Date(endtime).getTime() - new Date().getTime()));
                var seconds = Math.floor((milliseconds / 1000) % 60);
                var minutes = Math.floor((milliseconds / 1000 / 60) % 60);
                var hours = Math.floor((milliseconds / (1000 * 60 * 60)) % 24);
                var days = Math.floor(milliseconds / (1000 * 60 * 60 * 24));
                return {
                    'total': milliseconds,
                    'seconds': seconds,
                    'minutes': minutes,
                    'hours': hours,
                    'days': days,
                };
            }

            function initClock(id, endtime) {
                clearInterval(timeinterval)
                var counter = document.getElementById(id);
                var daysItem = counter.querySelector('.js-countdown-days');
                var hoursItem = counter.querySelector('.js-countdown-hours');
                var minutesItem = counter.querySelector('.js-countdown-minutes');
                var secondsItem = counter.querySelector('.js-countdown-seconds');

                function updateClock() {
                    lotterytime = parseInt((countdown.getTime() - new Date().getTime()) / 1000);
                    var time = getRemainingTime(endtime);
                    daysItem.innerHTML = time.days;
                    hoursItem.innerHTML = ('0' + time.hours).slice(-2);
                    minutesItem.innerHTML = ('0' + time.minutes).slice(-2);
                    secondsItem.innerHTML = ('0' + time.seconds).slice(-2);

                }

                timeinterval = setInterval(updateClock, 1000);

            }

            initClock('js-countdown', countdown);

            // ????????????

        }
    })
}

function lottery() {
    $.ajax({
        type: "GET",
        url: "https://1680660.com/smallSix/findSmallSixInfo.do",
        success: function(data) {
            var data = JSON.parse(data);

            //????????????
            var preDrawTime = data.result.data.preDrawTime.substring(0, 10)
            $('.lh_periods_num').text(data.result.data.preDrawIssue);
            $('.lh_time').text(preDrawTime);

            var arr = data.result.data.preDrawCode;
            var color = data.result.data.color;
            color.insert(6, '');
            var hm = '';
            var arr = arr.split(',');
            arr.insert(6, '+');
            var lh_len = arr.length;
            var chineseZodiac = data.result.data.chineseZodiac
            for (var n = 0; n < 7; n++) {
                switch (chineseZodiac[n]) {
                    case 1:
                        chineseZodiac[n] = "???";
                        break;
                    case 2:
                        chineseZodiac[n] = "???";
                        break;
                    case 3:
                        chineseZodiac[n] = "???";
                        break;
                    case 4:
                        chineseZodiac[n] = "???";
                        break;
                    case 5:
                        chineseZodiac[n] = "???";
                        break;
                    case 6:
                        chineseZodiac[n] = "???";
                        break;
                    case 7:
                        chineseZodiac[n] = "???";
                        break;
                    case 8:
                        chineseZodiac[n] = "???";
                        break;
                    case 9:
                        chineseZodiac[n] = "???";
                        break;
                    case 10:
                        chineseZodiac[n] = "???";
                        break;
                    case 11:
                        chineseZodiac[n] = "???";
                        break;
                    case 12:
                        chineseZodiac[n] = "???";
                        break;
                }
            }
            chineseZodiac.insert(6, '');
            for (var i = 0; i < lh_len; i++) {
                if (i == 6) {
                    hm += '<li class="cur">+</li>';
                } else {
                    hm += '<li> <span class="' + color[i] + '">' + arr[i] + '</span> <div>' + data.result.data.chineseZodiac[i] + '</div></li>';
                }
            }

            $('.lh_result ul').html(hm);
        }
    });
}
timer();
lottery();



setInterval(function() {

    nowdatetime = new Date().toLocaleTimeString();

    if (nowdatetime == "??????09:30:00") {
        $('.countdown__item').css("display", "none");
        $('.count-number p').text('?????????....');
    } else if (nowdatetime == "??????09:35:30") {
        $('.count-number p').text('???????????????');
        $('.countdown__item').css("display", "inline-block");
        clearInterval(lotteryinterval);
        lotteryinterval = setInterval(lottery, 10000);
        clearInterval(timerinterval);
        timerinterval = setInterval(timer, 30000);
    } else if (nowdatetime == "??????09:40:00") {
        clearInterval(lotteryinterval);
        lottery();
        timer();
    }
}, 1000);



// ******************************************??????*******************************************************
// $.ajax({
//     type: "post",
//     url: "https://api.api68.com/news/findProjectPrediction.do?programaId=&pageNo=1&pageSize=10",
//     success: function(data) {
//         var data = JSON.parse(data);
//         var arr = data.result.data.list;
//         var hm = '';
//         var yc_len = arr.length;
//         for (var i = 0; i < yc_len; i++) {
//             hm += '<a href="https://1680210.com/html/zixunhtml/zx_detail.html?' + arr[i].newsId + '">' + arr[i].title + '</a>';
//         }
//         $('.yc_item').html(hm);
//     }
// })