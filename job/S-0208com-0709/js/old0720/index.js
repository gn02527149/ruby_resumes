$(function(){
	
	$('#showsearchlink').on('click',function(e){
		$('#markdiv').fadeIn(100);
		$('#searchlink').show();
	});
	
	
	$('#searchlink .close-regagent').on('click',function(e){
		$('#markdiv').hide();
		$('#searchlink').hide();
	});
   
    $('#vipsearch').on('click',function(e){      
      	  var _username = $('#username').val();
      	  $.ajax({
				url: 'api.php',
				dataType: 'html',
				cache: false,
				type: 'POST',
				data:{username:_username,action:'vipsearch'},
				dataType: "json",
				success: function(obj) {
					if(parseInt(obj.count)==0){
						layer.open({
                          type: 1,
                          title: false,
                          closeBtn: 1,
                          area: '692px',
                          skin: 'layui-layer-nobg', //没有背景色
                          shadeClose: true,
                          content: '<div style="background:url(images/nouser.png) center center no-repeat;display:block;width:692px;height:292px;"><a href="http://0208.com" target="_blank" style="position:absolute;bottom: 8px;cursor: pointer;width:100%;background:url(images/btn-link.png) center center no-repeat;height:49px;"></a></div>'
                        });
						return false;
					}else{
						layer.open({
                          type: 1,
                          title: false,
                          closeBtn: 1,
                          area: '839px',
                          skin: 'layui-layer-nobg', //没有背景色
                          shadeClose: true,
                          content: obj.html
                        });
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					layer.msg('<p class="red">网络错误，请稍候重试！</p>');
				}
			});
      
    		
    })
	
	$('#searchlinksubmit').on('click',function(e){
		var _agentid = $('#agentid').val();
		if(_agentid.length<=0){
			$("#linkinfo").html('<p class="red">请输入您的代理帐号后再查询</p>');
			return false;	
		}else{
			$.ajax({
				url: 'api.php',
				dataType: 'html',
				cache: false,
				type: 'POST',
				data:{username:_agentid,action:'agentlink'},
				dataType: "json",
				success: function(obj) {
					var sAwardEle = "";
					$('#qcode').html('');
					$('#qcodemsg').html('');
					$('#searchlink').css('margin-top','-100px').animate(100);
					if(parseInt(obj.count)==0){
						$("#linkinfo").html('<p class="red">'+obj.msg+'</p>');
						return false;
					}else{
						$('#searchlink').css('margin-top','-160px');
						$("#linkinfo").html('您的专属链接是：<a href="'+obj.links+'" target="_blank"><span>'+obj.links+'</span></a>');
						$('#qcodemsg').html('手机可直接扫上面的二维码访问');
						jQuery('#qcode').qrcode({ width: 180, height: 180, correctLevel: 0, text: obj.links });
					}
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$("#linkinfo").html('<p class="red">网络错误，请稍候重试！</p>');
				}
			});
		}	
	});
		
})
