$(function() {
    var vip_arr = [
        { 'viplv': 'VIP1', 'vipm': '6', 'vipw': '-' },
        { 'viplv': 'VIP2', 'vipm': '16', 'vipw': '-' },
        { 'viplv': 'VIP3', 'vipm': '36', 'vipw': '8' },
        { 'viplv': 'VIP4', 'vipm': '68', 'vipw': '18' },
        { 'viplv': 'VIP5', 'vipm': '168', 'vipw': '58' },
        { 'viplv': 'VIP6', 'vipm': '368', 'vipw': '188' },
        { 'viplv': 'VIP7', 'vipm': '668', 'vipw': '388' },
        { 'viplv': 'VIP8', 'vipm': '1668', 'vipw': '688' },
        { 'viplv': 'VIP9', 'vipm': '3668', 'vipw': '888' },
        { 'viplv': 'SVIP', 'vipm': '6688', 'vipw': '18888' }
    ];



    var idx = 2;
    var _doing = false;

    function doAnimation() {
        if (_doing) return;

        _doing = true;
        //加入新的資料
        //抓取隨機字串
        var name = Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 4) + '****';


        function getRandom(x) {
            return Math.floor(Math.random() * x);
        };

        var num = getRandom(10);


        $('.content').eq(0).removeClass('prev').addClass('curr').text(name + ' ' + vip_arr[num].viplv + ' 月俸祿 ' + vip_arr[num].vipm + ' 元 周工资 ' + vip_arr[num].vipw + ' 元');
        $('.content').eq(1).removeClass('curr').addClass('next');

        //移除最後一個元素與新增第一個空元素
        var t1 = setTimeout(function() {
            $('.content.next').remove();
            var $new = $('<div></div>').addClass('content prev')
            $('.left').prepend($new); //<-- 加在前面
            _doing = false;
            t1 = null;
        }, 1000)

        idx += 1;
    }


    setInterval(function() {
        doAnimation();
    }, 500);
});