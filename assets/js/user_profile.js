$(document).ready(function(){
	//Dom Element
	var WebSiteURL = 'http://localhost/indeed/';
	var Btn_AddEducation = $('#add_education' , '.employee-profile');
	var Btn_SaveEducation = $('#save_education' , '.employee-profile');
	var educationCount = 0;
	
	
	/*************************************************************************************************/
	
	/**
	 * Add new Education
	 */
	
	Btn_AddEducation.on('click',function(e){
		var inputTxt = "<div class='input-group'>";
		//Insititute Name
		inputTxt +=  "<label> Insititute Name </label>";
		inputTxt +=  "<input  type='text' id='inpInsititute_"+ educationCount +"' placeholder='Insititute Name'>";
		inputTxt += "</div>";
		
		//programTitle
		inputTxt += "<div class='input-group'>";
		inputTxt +=  "<label> program Title </label>";
		inputTxt +=  "<input  type='text' id='inp_programTitle_"+ educationCount +"' placeholder='Bachelor certificat etc'>";
		inputTxt += "</div>";
		
		//From Date
		inputTxt += "<div class='input-group'>";
		inputTxt +=  "<label> From </label>";
		inputTxt +=  "<input  type='date' id='inpDate_From_"+ educationCount +"' placeholder='From'>";
		inputTxt += "</div>";
		
		//To Date
		inputTxt += "<div class='input-group'>";
		inputTxt +=  "<label> To </label>";
		inputTxt +=  "<input  type='date' id='inpDate_To_"+ educationCount +"' placeholder='To'>";
		inputTxt += "</div>";
		
		educationCount++;
		$(inputTxt).insertBefore($(this));
		e.preventDefault();
	});
	
	/*
	 *  Get All Education List in the page 
	 */
	function GetAllEducationList(){
		var arr =[];
		var tmp = {};
		$('.education' , '#Education-widget').each(function(){
			tmp.InsitituteName = $('#instituteName',$(this)).text();
			tmp.programTitle   = $('#programTitle',$(this)).text();
			tmp.fromDate = $('#fromDate',$(this)).text();
			tmp.to =$('#toDate',$(this)).text();
			arr.push(tmp);
			tmp = {};
		});
		return arr;
	}
	
	
	/**
	 *	Save New Education 
	 */
	 
	Btn_SaveEducation.on('click',function(e){
		//Get the data 
		console.log('clicked save ');
		var data = [];
		/******************************************************/
		//Get Previous Education Data Add it to data Array  
		/******************************************************/
		var previousData = GetAllEducationList();
		
		if(previousData.length > 0){
			for(var i = 0 ; i < previousData.length; i++){
				data.push(previousData[i]);
			}
		}
		
		
		var tmp  = {};
		for(var i = 0; i  < educationCount; i++){
			tmp.InsitituteName = $('#inpInsititute_' + i).val();
			tmp.programTitle   = $('#inp_programTitle_' + i).val();
			tmp.fromDate = $('#inpDate_From_' + i).val();
			tmp.to       = $('#inpDate_To_' + i).val();
			data.push(tmp);
			tmp = {};
		}
		
		data = JSON.stringify(data);
		var Add_educationURL = WebSiteURL + 'profile/user_add_education';
		
		console.log(data);
		
		/*
		 * Perform Ajax Request To Add new Education 
		 * or Update the value
		 */
		 
		
		$.ajax({
			url  : Add_educationURL,
			type :'post',
			data : {
				jsonData: data
			}
		}).done(function(serverData){
			//Clear input and update education widget 
			$('.input-group' , '#Education-widget').each(function(){
				$(this).remove();
			});
			
			//Add message to inform user that eucation has been updated
			/*
			$( '<div class="alert alert-success"></div>' ).insertAfter('#Education-widget');
			*/
			var node = document.createElement('div');
			node.id  = 'removeMsg';
			node.className  = 'alert alert-success';
			node.innerHTML = 'Your Education List has been updated successfully';
			var educationWidget = document.getElementById('Education-widget');
			var educationData = '';
			educationWidget.insertAdjacentElement('afterbegin' , node);
			
			//Repopulate #Education-widget with data 
			$.ajax({
				url  : WebSiteURL + 'profile/repopulateEducation',
				type :'get'
			}).done(function(serverData){
				//Make Time interval to hide the message 
				setTimeout(function(){
					document.getElementById("removeMsg").remove();
					educationWidget.innerHTML = '';
					educationWidget.innerHTML = serverData;
				}, 5000);
				
			}).fail(function(xhr, status, error){
				
			});
			
			
			
			
			
			
			
			
			
		}).fail(function(xhr, status, error) {
				  //Ajax request failed.
				  var errorMessage = xhr.status + ': ' + xhr.statusText
				  console.log('Error - ' + errorMessage);
		});
		
		
		
		e.preventDefault();
	});
	
	
	
	/*
	 *  Delete one Element
	 */
	
	$('.delete_education').on('click',function(e){
		console.log('clicked');
		$(this).closest('.education').remove();
		e.preventDefault();
	});
	
	
	/***********************************Add Education End**************************************************/
	
	
	
	/***********************************Add Expirence*************************************************************/
	var Btn_AddExperience = $('#add_experience' , '.employee-profile');
	var Btn_SaveExperience = $('#save_experience' , '.employee-profile');
	var experienceCount = 0;
	
	
	/**
	 * Add new Experience Input
	 */
	
	Btn_AddExperience.on('click',function(e){
		var inputAddExperience = "<div class='input-group'>";
		//Insititute Name
		inputAddExperience +=  "<label> Company Name </label>";
		inputAddExperience +=  "<input  type='text' id='inpCompanyName_"+ experienceCount +"' placeholder='Company Name'>";
		inputAddExperience += "</div>";
		
		//programTitle
		inputAddExperience += "<div class='input-group'>";
		inputAddExperience +=  "<label> Job Rule </label>";
		inputAddExperience +=  "<input  type='text' id='inp_jobRole_"+ experienceCount +"' placeholder='Your Rule'>";
		inputAddExperience += "</div>";
		
		//From Date
		inputAddExperience += "<div class='input-group'>";
		inputAddExperience +=  "<label> From </label>";
		inputAddExperience +=  "<input  type='date' id='inpDate_From_"+ experienceCount +"' placeholder='From'>";
		inputAddExperience += "</div>";
		
		//To Date
		inputAddExperience += "<div class='input-group'>";
		inputAddExperience +=  "<label> To </label>";
		inputAddExperience +=  "<input  type='date' id='inpDate_To_"+ experienceCount +"' placeholder='To'>";
		inputAddExperience += "</div>";
		
		experienceCount++;
		$(inputAddExperience).insertBefore($(this));
		e.preventDefault();
	});
	
	
	/*
	 *  Get All Experience List in the page 
	 */
	function GetAllExperienceList(){
		var arr =[];
		var tmp = {};
		$('.experience' , '#Experience-widget').each(function(){
			tmp.companyName = $('#companyName',$(this)).text();
			tmp.jobRole   = $('#jobRole',$(this)).text();
			tmp.fromDate = $('#fromDate',$(this)).text();
			tmp.to =$('#toDate',$(this)).text();
			arr.push(tmp);
			tmp = {};
		});
		return arr;
	}
	
	
	
	/**
	 *	Save New Education 
	 */
	 
	Btn_SaveExperience.on('click',function(e){
		//Get the data 
		var data = [];
		/******************************************************/
		//Get Previous Education Data Add it to data Array  
		/******************************************************/
		var previousData = GetAllExperienceList();
		
		if(previousData.length > 0){
			for(var i = 0 ; i < previousData.length; i++){
				data.push(previousData[i]);
			}
		}
		
		
		var tmp  = {};
		for(var i = 0; i  < experienceCount; i++){
			tmp.companyName = $('#inpCompanyName_' + i).val();
			tmp.jobRole   = $('#inp_jobRole_' + i).val();
			tmp.fromDate = $('#inpDate_From_' + i).val();
			tmp.to       = $('#inpDate_To_' + i).val();
			data.push(tmp);
			tmp = {};
		}
		
		data = JSON.stringify(data);
		var Add_experienceURL = WebSiteURL + 'profile/user_add_experience';
		
		console.log(data);
		
		/*
		 * Perform Ajax Request To Add new Education 
		 * or Update the value
		 */
		 
		
		$.ajax({
			url  : Add_experienceURL,
			type :'post',
			data : {
				jsonExpereience : data
			}
		}).done(function(serverData){
			//Clear input and update education widget 
			$('.input-group' , '#Experience-widget').each(function(){
				$(this).remove();
			});
			
			//Add message to inform user that eucation has been updated
			
			var node = document.createElement('div');
			node.id  = 'removeMsg';
			node.className  = 'alert alert-success';
			node.innerHTML = 'Your Experience List has been updated successfully';
			var experienceWidget = document.getElementById('Experience-widget');
			var experienceData = '';
			experienceWidget.insertAdjacentElement('afterbegin' , node);
			
			//Repopulate #Education-widget with data 
			$.ajax({
				url  : WebSiteURL + 'profile/repopulateExperience',
				type :'get'
			}).done(function(serverData){
				//Make Time interval to hide the message 
				setTimeout(function(){
					document.getElementById("removeMsg").remove();
					experienceWidget.innerHTML = '';
					experienceWidget.innerHTML = serverData;
				}, 5000);
				
			}).fail(function(xhr, status, error){
				 //Ajax request failed.
				  var errorMessage = xhr.status + ': ' + xhr.statusText
				  console.log('Error - ' + errorMessage);
			});
			
			
			
			
			
			
			
			
			
			
		}).fail(function(xhr, status, error) {
				  //Ajax request failed.
				  var errorMessage = xhr.status + ': ' + xhr.statusText
				  console.log('Error - ' + errorMessage);
		});
		
		
		
		e.preventDefault();
	});
	
	
	/*
	 *  Delete one  experience Element
	 */

	$('.delete_experience').on('click',function(e){
		console.log('clicked');
		$(this).closest('.experience').remove();
		e.preventDefault();
	});
	
	/***********************************Add Expirence End*************************************************************/
	
});