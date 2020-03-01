$(document).ready(function(){
	var inputCont = $('.input','.search-box');
	var txtBox = $('input[type="text"]','.search-box');
	
	/*
	 *   Change border color in search box 
	 *
	 */
	txtBox.on('focusin',function(){
		$(this).parent().addClass('input-focus');
	});
	
	txtBox.on('focusout',function(){
		$(this).parent().removeClass('input-focus');
	});
	
});