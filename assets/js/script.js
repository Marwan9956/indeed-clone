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
	
	
	/*
	 *    Display Message for features still not implemented 
	 *  
	 */
	 
	 $('.Not_implement').on('click',function(e){
		 alert('These features still not implemented yet i m working on it on my free time  feel free to talk to me about it marwan9956@gmail.com');
		 
		 e.preventDefault();
	 });
	 
	 
	 $('#Update_userprofile_data').on('click',function(e){
		 var imgFile = document.getElementById('profile_img');
		 var resumeFile = document.getElementById('file-upload');
		 imgFile = imgFile.value.split('.');
		 imgFile = imgFile[imgFile.length - 1];
		 
		 resumeFile = resumeFile.value.split('.');
		 resumeFile = resumeFile[resumeFile.length - 1];
		 
		 if(imgFile == ''  && resumeFile == ''){
			 console.log(imgFile);
			 console.log(resumeFile);
			 
			 alert("You didn't upload valid data " );
			 //preventProccessing
			 e.preventDefault();
		 }else if(resumeFile == ''){
			 
			 if(imgFile == "jpg" || imgFile == 'png'){
				 
			 }else{
				 console.log(imgFile);
				 alert("You didn't upload valid Image only JPG OR PNG " );
				 e.preventDefault();
			 }
		 }else if(imgFile == ''){
			if(resumeFile == 'PDF'){
				
			}else{
				 alert("You didn't upload valid Resume only PDF format" );
				 e.preventDefault();
			} 
		 }else if(imgFile != ''  && resumeFile != ''){
			 if(imgFile == "jpg" || imgFile == 'png' ){
				if(resumeFile == 'pdf'){
					
				}else{
					alert("You didn't upload valid Resume only PDF format" );
				 e.preventDefault();
				} 
			 }else{
				alert("You didn't upload valid Image only JPG OR PNG " );
				 e.preventDefault(); 
			 }
		 }
		 
		 
	 });
	
});