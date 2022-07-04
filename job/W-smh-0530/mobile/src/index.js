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
$('.testBtn').click(function () {
    tsb()
})
$(document).ready(function(e) {

    var unslider04 = $('#slider').unslider({
        dots: true,
        delay:4000
    })
    data04 = unslider04.data('unslider');

});



function toggleColor( id , arr , s ){
    var self = this;
    self._i = 0;
    self._timer = null;

    self.run = function(){
        if(arr[self._i]){
            $(id).css('color', arr[self._i]);
        }
        self._i == 0 ? self._i++ : self._i = 0;
        self._timer = setTimeout(function(){
            self.run( id , arr , s);
        }, s);
    }
    self.run();
}
new toggleColor('.c-red', ['#2E67CA', '#FB0200'], 600);
new toggleColor('.c-green', ['#FB0200', '#2E67CA'], 600);



(function showTime(){
    var dueDate='2018/2/5 00:00:00';
    var due=new Date(dueDate);
    dueTime=due.getTime();
    var now=new Date();
    nowTime=now.getTime();
    if(nowTime>dueTime){
        $('.day').text('活动火热进行中');
    }else{
        var dis=parseInt((dueTime-nowTime)/1000);
        var day=parseInt(dis/(60*60*24));
        $('.day_num').text(day+1);
    }
})();
$('.ac_close').click(function () {
    $('.activity').hide()
})

