$(function() {
	$('#pkbox').load(function(){
		  var $iframe = $(this),
			$contents = $iframe.contents();


			$contents.find('.czlist').css('display', 'none;');

	});
});
