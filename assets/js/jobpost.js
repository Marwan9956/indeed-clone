$(document).ready(function(){
	/**
	 * Dom Elments 
	 */
	var jobpost_form        = '#jobpost_from';
	var btn_required_skills = $('#add_required_skill',jobpost_form);
	var btn_nice_skills = $('#add_nice_skill',jobpost_form);
	/**
	 * count variables and limit 
	 */
	var limit  = 10;
	var required_Count = 1;
	var nice_count = 1;
	

	/**
	 * Add new text box For Required Skills  
	 */
	btn_required_skills.on( "click",(function(e) {
		addSkills(btn_required_skills ,'required_skills',required_Count);
		required_Count++;
		e.preventDefault();
	}));
	
	
	/**
	 * Add new text box For nice Skills  
	 */
	btn_nice_skills.on( "click",(function(e) {
		addSkills(btn_nice_skills ,'nice_skills',nice_count);
		nice_count++;
		e.preventDefault();
	}));
	
	
	/**
	 * Add new input of type text to the html
	 * @param obj
	 * @param inputName : name of new input you've created 
	 * @param count : tracking count to concatinate with inputname
	 * @returns : false if count is more then limit 
	 */
	function addSkills(obj,inputName , count){
		var tmp = '';
		if(checkLimit(count)){
			tmp = '<input type="text" name="'+ inputName + count + '" />';
			$(obj).before(tmp);
		}
		
	}
	
	
	/**
	 * Check if the number is more then the limit provided
	 * @param count
	 * @returns ture when count is less then limit otherwise false and display 
	 * 			alert message for user 
	 */
	function checkLimit(count){
		if(count <= limit){
			return true;
		}else{
			alert("you are allowed To add more then " + limit 
					+" add the rest on description");
			return false;
		}
	}
	
	
	
});
