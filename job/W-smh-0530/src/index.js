

function toggleColor( id , arr , s,sy ){
    var self = this;
    self._i = 0;
    self._timer = null;

    self.run = function(){
        if(arr[self._i]){
            $(id).css(sy, arr[self._i]);
        }
        self._i == 0 ? self._i++ : self._i = 0;
        self._timer = setTimeout(function(){
            self.run( id , arr , s);
        }, s);
    }
    self.run();
}

new toggleColor('#header_y', ['#D1AD5F', '#ddd'], 600,'color');
new toggleColor('#header_r', ['#FF0000', '#ddd'], 600,'color');
new toggleColor('#header_g', ['#ddd','#41BD3E'], 600,'color');
new toggleColor('#header_b', ['#ddd','#58EEFF'], 600,'color');
new toggleColor('.test_r', ['#F8223C', '#2E67CA'], 600,'color');
new toggleColor('.test_g', ['#2E67CA', '#F8223C'], 600,'color');
new toggleColor('.f_a', ['#562727', '#666'], 600,'color');
new toggleColor('.f_b', ['#666', '#426383'], 600,'color');
new toggleColor('.f_g', ['#598C55', '#666'], 600,'color');
// new toggleColor('.opt', ['0.7', '1'], 1000,'opacity');
// new toggleColor('.opt1', ['1', '0.7'], 1000,'opacity');

(function () {
    var i=6;
    setInterval(function () {
        if(i==8){i=5}
        $('.test_title_m_r').text(i);
        i++;
    },1000)
})()

// 时间倒计时

function calTime(){
    var dueDate='2018/2/5 00:00:00';
    var due=new Date(dueDate);
    dueTime=due.getTime();
    var now=new Date();
    nowTime=now.getTime();
    if(nowTime>dueTime){
        $('.happy_time').text('活动火热进行中');
    }else{
        var dis=parseInt((dueTime-nowTime)/1000);
        var day=parseInt(dis/(60*60*24));
        $('.happy_time_num').text(day+1);
    }
}
calTime();

//****************************************
function tsb() {
    var snum=$('.speed').length;
    var arr_num=[];
    for(var i=0;i<snum;i++){
        arr_num.push(Math.random().toFixed(1)*100+30)
    }
    $('.speed').each(function (i) {
        $(this).text('测速中');
    })
    setTimeout(function () {
        $('.speed').each(function (i) {
            $(this).text(arr_num[i]+'ms');
        })
    },1000)

}
tsb();

//****************************************

$(function() {
    var $li = $(".game_list li");
    var oneWidth = 0; //移动的宽度
    var liSum = 0; //li总长度

    $(".game_left").click(function() {
        if ($('#game_list_ul').css('marginLeft')!==0+"px") {
            oneWidth = oneWidth + 120;
            $('#game_list_ul').stop(true, false).animate({
                "margin-left": oneWidth
            }, 200);
        }
    })
    for (var i = 0; i < $li.length-7; i++) {
        liSum = 120 + liSum;
    }
    $(".game_right").click(function() {
        var abc = parseInt($('#game_list_ul').css('marginLeft'))!== -liSum?true:false;
        if (abc) {
            oneWidth = oneWidth - 120;
            $('#game_list_ul').stop(true, false).animate({
                "margin-left": oneWidth
            }, 200);
        }
    })
})


//****************************************

    $('.winner li').mouseover(function () {
        $('.winner .active').removeClass('active');
        $(this).addClass('active');
    })

    $('.activity a').mouseover(function () {
        $('.activity .active').removeClass('active');
        $(this).addClass('active');
    })

//****************************************




