$(document).ready(function(){
	var displayTag = $('#display-single-job');
	var jobPostSingleWidget = $('.job-post-single-widget');
	
	/**
	 * Make and ajax request 
	 * to get a single job post  
	 * 
	 */
	$(".job-post").on('click',function(e){
		var job_id = $(this).attr('id');
		var url = "http://localhost/indeed/jobs/singleJob?job_id=" + job_id;
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
					console.log(result);
				}
			}); 
		
		}, 600);
		
		e.preventDefault();
	});
	
	
	
	/**
	 * Construct Html to display single job  
	 * @returns
	 */
	function displaySingleJob(result){
		var templeate = '';
		templeate = '<div class="job-post-single-widget">';
		templeate += '<h3>'+ result.title +'</h3>';
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
});