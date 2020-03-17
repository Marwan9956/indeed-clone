<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Handle all user Profiles
 * @author marwan
 *
 */

class Profile extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	
	
	/**
	 * Handle  /profile
	 */
	public function index(){
		redirect(base_url());
	}
	
	
	public function user($user_id){
		//print_r($this->session->userdata());
		$data['title']		  =  "Profile";
		$data['view_content'] =  'profile/employee_profile_view';
		try{
			$data['user']         =  $this->user->getSignleUser($user_id);
			$data['user_Company'] =  $this->user->getCompanyName($data['user']->company_id);
			
			
			$data['educations']    =  $this->user->getEducationByUser($user_id);
			$data['educations']    =  json_decode( $data['educations']->education_json);
			
			
			$data['experiences'] =  $this->user->getExperienceByUser($user_id);
			$data['experiences'] =  json_decode( $data['experiences']->Experience_json);
		}catch (database_exception $e){
			$data['error'] = $e->getMessage();
		}catch (Exception $e){
			$data['error'] ='Server Error Try again later';
		}
		
		$this->load->view('inc/main',$data);
	}
	
	public function user_add_education(){
		
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			// this is ajax request, do something
			$education = $this->input->post('jsonData');
			
			try{
				
				$this->user->storeEducation($education);
				echo 'Your Data Added successfully';
				
			}catch(database_exception $e){
				
				echo $e->getMessage();
				http_response_code(400);
				
			}catch (Exception $e){
				
				echo 'Server Error Please Try again later .';
				http_response_code(404);
			}
		}
		
	}
	
	public function repopulateEducation(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			try {
				if($this->session->userdata('user_id') !== null){
					$user_id  = $this->session->userdata('user_id');
					$educations    =  $this->user->getEducationByUser($user_id);
					$educations    =  json_decode( $educations->education_json);
					$data  = '<h3>Education</h3>';
					foreach ($educations as $education){
						$data .= "<div class='education'>";
						$data .= "<div class='flex'>";
						$data .= "<p id='instituteName' >" .  $education->InsitituteName  . "</p>";
						$data .= "<div></div>";
						$data .= "</div>";
						$data .= "<p id='programTitle' ><span>" .  $education->programTitle . "</span> </p>";
						$data .= "<p> <span id='fromDate'> " .  $education->fromDate . "</span>";
						$data .= "<span id='toDate'> " .  $education->to. "</span> </p>";
						$data .= "</div>";
					}
					
					echo $data;
				}
			}catch(database_exception $e){
				
				echo $e->getMessage();
				http_response_code(400);
				
			}catch (Exception $e){
				
				echo 'Server Error Please Try again later .';
				http_response_code(404);
			}
		}else{
			echo 'not an ajax request';
		}
		
	}
	
	/**
	 * Handle AJAX Request TO Add New Experience in Experience Table
	 */
	
	public function user_add_experience(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			// this is ajax request, do something
			$experience= $this->input->post('jsonExpereience');
			
			try{
				
				$this->user->storeExperience($experience);
				echo 'Your Data Added successfully';
				
			}catch(database_exception $e){
				
				echo $e->getMessage();
				http_response_code(400);
				
			}catch (Exception $e){
				
				echo 'Server Error Please Try again later .';
				http_response_code(404);
			}
		}
	}
	
	public function repopulateExperience(){
		
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			try {
				if($this->session->userdata('user_id') !== null){
					$user_id  = $this->session->userdata('user_id');
					$experiences=  $this->user->getExperienceByUser($user_id);
					$experiences=  json_decode( $experiences->Experience_json);
					
					$data  = '<h3>Experience</h3>';
					foreach ($experiences as $experience){
						$data .= "<div class='experience'>";
						$data .= "<div class='flex'>";
						$data .= "<p id='companyName' >" .  $experience->companyName. "</p>";
						$data .= "<div></div>";
						$data .= "</div>";
						$data .= "<p id='jobRole' ><span>" .  $experience->jobRole. "</span> </p>";
						$data .= "<p> <span id='fromDate'> " .  $experience->fromDate . "</span>";
						$data .= "<span id='toDate'> " .  $experience->to. "</span> </p>";
						$data .= "</div>";
					}
					
					echo $data;
				}
			}catch(database_exception $e){
				
				echo $e->getMessage();
				http_response_code(400);
				
			}catch (Exception $e){
				
				echo 'Server Error Please Try again later .';
				http_response_code(404);
			}
		}else{
			echo 'not an ajax request';
		}
		
	}
	
	public function company($comapny_id){
		$data['title']		  =  "Profile";
		$data['view_content'] =  'profile/company_profile_view';
		$this->load->view('inc/main',$data);
	}
	
}