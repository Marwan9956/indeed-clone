$(document).ready(function(){
	const HOSTNAME = "http://" + window.location.hostname + "/indeed";
	
	var displayTag = $('#display-single-job');
	var jobPostSingleWidget = $('.job-post-single-widget');
	
	var subscription_widget = $('.subscription-widget');
	var cls;
	
	/**
	 * Make and ajax request 
	 * to get a single job post  
	 * 
	 */
	$(".job-post").on('click',function(e){
		var job_id = $(this).attr('id');
		//http://localhost/indeed
		var url = HOSTNAME + "/jobs/singleJob?job_id=" + job_id;

		subscription_widget.fadeOut();
		displayTag.css('opacity','0');
		setTimeout(function(){ 
			$.ajax({
				url: url ,
				error: function(jqXHR,textStatus,errorThrown ){
				},
				success: function(result){
					result = displaySingleJob(JSON.parse(result));
					displayTag.html(result);
					displayTag.css('opacity','1');
					cls = document.getElementById('close');
					/*
					 *  Normal Javascript Because jquery Events 
					 *  didn't work Not sure why 
					 */
					cls.addEventListener("click",function(e){
						closeFunction(e);
					});
					
					
				}
			}); 
		
		}, 600);
		
		e.preventDefault();
	});
	
	
	
	
	/**
	 * Close Button display single job 
	 * And reshow subscription widget
	 * @returns
	 */
	function closeFunction(e){
		$('.job-post-single-widget' , displayTag).fadeOut();
		displayTag.css('opacity','0');
		subscription_widget.fadeIn();
		e.preventDefault();
	};
	
	
	/**
	 * Construct Html to display single job  
	 * @returns
	 */
	function displaySingleJob(result){
		var templeate = '';
		templeate = '<div class="job-post-single-widget">';
		templeate += '<h3>'+ result.title +'</h3> <span id="close">X</span>';
		templeate += '<h4>'+ result.Company_Name +'</h4>';
		templeate += '<h4>'+ result.country_name +'</h4>';
		
		templeate += '<p>' + result.description + '</p>';
		templeate += '<ul>';
		
		var tmp = result.required_skills.split('|');

		for(var i= 0; i< tmp.length; i++){
			templeate += '<li>'+ tmp[i] +'</li>';
		}
		templeate += '</ul>';

		templeate += '<ul>';
		
		var tmp = result.nice_to_have_skills.split('|');
		for(var i= 0; i< tmp.length; i++){
			templeate += '<li>'+ tmp[i] +'</li>';
		}
		templeate += '</ul>';

		templeate += '<div class="job-post-footer">';
		templeate += '<p>'+ result.create_date +' 30+ days ago .</p>';
			
			
		templeate += '<a href="#">Save job .</a>';
		templeate += '<a href="#">more ...</a>';
			
		templeate += '</div>';
		templeate += '</div>';
		return templeate;
	}
	
	
	/*
	 * Get All Countries
	 *
	 */
	var countries = document.getElementById('searchCountries');
	if(countries !== null){
		countries.addEventListener('keyup',function(e){
			 
			var key = countries.value;
			var countriesURL = encodeURI(HOSTNAME + "/jobs/countries?key=" + key);
			$.ajax({
					type: 'get',
					url  : countriesURL
				}).done(function (data){
					try{
						$('#countriesList').remove();
						data = JSON.parse(data);
						var countriesDiv = '<div id="countriesList"> <ul>';
						for(var i = 0 ; i < data.length; i++){
							countriesDiv += '<li>' +  data[i].name  + '</li>'; 
						}
						var rect = countries.getBoundingClientRect();
						var topPos = rect.top + rect.height;
						var widthPos = rect.width + 82;
						
						countriesDiv += '</ul></div>';
						
						$(countriesDiv).insertAfter('#searchCountries')
						.css({ 
							'top' : topPos,
							'width':widthPos
							});
					}catch(err){
						//console.log('Not Json Data Error');
					}
				}).fail(function(xhr, status, error) {
					  //Ajax request failed.
					  var errorMessage = xhr.status + ': ' + xhr.statusText
					  console.log('Error - ' + errorMessage);
				});
				
				
			 e.preventDefault();
		});
	 
	}
	 
});