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
	
	/**
	 * Handle User Profile Page 
	 * @param  $user_id
	 */
	
	public function user($user_id){
	
		$data['title']		  =  "Profile";
		$data['view_content'] =  'profile/employee_profile_view';
		try{
			$data['user']         =  $this->user->getSignleUser($user_id);
			$data['user_Company'] =  $this->user->getCompanyName($data['user']->company_id);
			
			
			$data['educations']    =  $this->user->getEducationByUser($user_id);
			if(!empty($data['educations'])){
				$data['educations']    =  json_decode( $data['educations']->education_json);
			}
			
			
			$data['experiences'] =  $this->user->getExperienceByUser($user_id);
			if(!empty($data['experiences'])){
				$data['experiences'] =  json_decode( $data['experiences']->Experience_json);
			}
		}catch (database_exception $e){
			$data['error'] = $e->getMessage();
		}catch (Exception $e){
			$data['error'] ='Server Error Try again later';
		}
		
		$this->load->view('inc/main',$data);
	}
	
	/**
	 * Update User Profile
	 * @param $user_id
	 */
	public function editUser(){
		
		$data['title']		  =  "Profile";
		$data['view_content'] =  'profile/employee_profile_edit';
		$user_id = $this->session->userdata('user_id');
		
		$config_validation=array([
				'field' => 'firstName',
				'label' => 'First name',
				'rules' => 'required'
		],[
				'field' => 'lastName',
				'label' => 'Last name',
				'rules' => 'required'
		],[
				'field' => 'username',
				'label' => 'username',
				'rules' => 'required'
		],[
				'field' => 'country',
				'label' => 'Country',
				'rules' => 'required'
		],[
				'field' => 'phoneNum',
				'label' => 'Phone number',
				'rules' => 'required|integer|min_length[9]'
		]);
		
		$this->form_validation->set_rules($config_validation);
		if(!empty($user_id)){
			
			if($this->form_validation->run() == false){
				$data['user']         =  $this->user->getSignleUser($user_id);
				$this->load->view('inc/main',$data);
			}else{
				//perform update
				try{
					
					$this->user->updateSingleUser($user_id);
					$this->session->set_flashdata('msg' , 'Your Data has been updated successuflly');
					redirect(base_url('profile/user/') . $user_id );
					
				}catch(database_exception $e){
					
					$this->session->set_flashdata('Err_msg' , $e->getMessage());
					redirect(base_url('profile/user/') . $user_id );
					
				}catch(Exception $e){
					
					$this->session->set_flashdata('Err_msg' , "Server Error please try again later or cantact admin .");
					redirect(base_url('profile/user/') . $user_id );
				}
			}
			
		}else{
			redirect(base_url());
		}
	}
	
	/**
	 * Handle user Profile Img and resume update
	 */
	public function updateUser($param = ''){
		if($param == ''){
			$this->session->set_flashdata('Err_msg','Wrong Parameter .');
			redirect(base_url());
		}
		
		$data['title']		  =  "Profile";
		$data['view_content'] =  'profile/employee_profile_edit';
		$user_id = $this->session->userdata('user_id');
		$userType = $this->session->userdata('user_type');
		
		if($param == 'data' && !empty($user_id) && $userType == 'employee'){
			if (isset($_FILES['profile_img']['name']) && !empty($_FILES['profile_img']['name'])  ||
				isset($_FILES['resume']['name']) && !empty($_FILES['resume']['name'])){
				
				$img_path = './upload/user_profile';
				$imgName  = 'profile_img';
				
				$this->load->library('myupload');
				$result       =  $this->myupload->upload_img($img_path, $imgName);
				$resultResume =  $this->myupload->upload_user_resume();
				$redirectURL  =  base_url('profile/user/' . $user_id);
				
				if(!empty($result)){
					try{
						$this->user->updateImg($result , $resultResume ,$user_id);
						$this->session->set_flashdata('msg','Your Profile updated successfully');
						redirect($redirectURL);
						
					}catch (database_exception $e){
						
						$this->session->set_flashdata('Err_msg',$e->getMessage());
						redirect($redirectURL);
						
					}catch (Exception $e){
						$this->session->set_flashdata('Err_msg','Server Error please try again later.');
						redirect($redirectURL);
					}
					
				}else{
					$this->session->set_flashdata('Err_msg','No Data has been uploaded  try again.');
					redirect($redirectURL);
				}
				
				
			}else{
				if( !empty($user_id) && $userType == 'employee'){
					$data['title']		  =  "Edit Profile";
				
					$data['view_content'] =  'profile/employee_profile_edit_data';
					$this->load->view('inc/main',$data);
				}else{
					$this->session->set_flashdata('Err_msg','You Are not allowed .');
					redirect(base_url());
				}
			}
			
			
		}else{
			$this->session->set_flashdata('Err_msg','You Are not allowed .');
			redirect(base_url());
		}
	}
	
	/**
	 * Handle AJAX Request TO Add New Experience in Experience Table
	 */
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
	
	/**
	 * Handel ajax request to refill the data in the view
	 */
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
	
	
	/**
	 * Handel ajax request to refill the data in the view
	 */
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
	
	
	/**
	 * Change Password 
	 */
	public function change_password(){
		$config_validation=array([
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email'
		]);
		
		if($this->input->post('password')){
			$this->form_validation->set_rules('password', 'Password' , 'min_length[6]');
			$this->form_validation->set_rules('con-password' , 'Confirm password' , 'matches[password]');
		}
		$this->form_validation->set_rules($config_validation);
		//new email need to check it if it is not used
		//$this->session->userdata('email')
		
		if($this->session->has_userdata('user_id')){
			if($this->form_validation->run() == false){
				$data['title']		  =  "Edit";
				$data['view_content'] =  'profile/employee_profile_edit_pass';
		
				$this->load->view('inc/main',$data);
			}else{
				//Process
				try{
					$this->user->changePassword_email();
					$this->session->set_flashdata('msg' , 'Your data has been updated successfully.');
					redirect(base_url('profile/user/'. $this->session->userdata('user_id')));
					
					
				}catch (database_exception $e){
					$this->session->set_flashdata('Err_msg' , $e->getMessage());
					redirect(base_url('profile/change_password'));
				}catch (Exception $e){
					$this->session->set_flashdata('Err_msg' , 'Server Error Try again.');
					redirect(base_url('profile/change_password'));
				}
			}
		}else{
			$this->session->set_flashdata('Err_msg' , 'You Are not allowed .');
			redirect(base_url());
		}
	}
	
	
	/**
	 * Handle Company Profile Page
	 * @param $company_id
	 */
	
	public function company($company_id = ''){
		
		$data['title']		  =  "Company";
		$data['view_content'] =  'profile/company_profile_view';
		$data['page']         =  'profile';
		
		$comId = $this->input->get('comId');
		$joblist = $this->input->get('joblist');
		$edit    = $this->input->get('edit');
		$editPhoto = $this->input->get('editPhoto');
		$view    = '';
		//comId joblist  edit
		if($company_id == ''){
			$company_id = $comId;
		}
		try{
			
			$data['company']      =  $this->user->getSignleCompany($company_id);
			$this->load->library('pagination');
			if(!empty($comId) && !empty($joblist )){
				
				$config['per_page'] = 10;
				$config['page'] = $this->input->get('start');
				$config['enable_query_strings']= true;
				$config['page_query_string'] = true;
				$config['query_string_segment'] = 'start';
				$config['total_rows'] = $this->user->getCountJobsByCompany($comId);
				$config['base_url'] = base_url('profile/company?comId='. $comId .'&joblist=true');
				
				$config['full_tag_open'] = '<div class="pagination-links">';
				$config['full_tag_close'] = '</div>';
				/*************************************************************/
				
				
				
				/************************Initialize Pagination ************/
				$this->pagination->initialize($config);
				$data['joblist'] = $this->user->getJoblistByCompany($company_id , $config['per_page'], $config['page']);
				$data['view'] = 'company_profile_joblist';
				$data['canEdit'] = false;
				if($this->session->userdata('user_type') === 'company' && $this->session->userdata('user_id') === $comId){
					$data['canEdit'] = true;
				}
				
			}else{
				
				$data['view'] = 'company_profile_info';
				
			}
			
			
			
		}catch (database_exception $e){
			$data['error'] = $e->getMessage();
		}catch (Exception $e){
			$data['error'] ='Server Error Try again later';
		}
		
		$this->load->view('inc/main',$data);
	}
	
	
	/**
	 * Edit Company Profile 
	 * @param  $company_id
	 */
	public function edit_Profile($company_id){
		$data['title']		  =  "Edit Profile";
		$data['company']      =  $this->user->getSignleCompany($company_id);
		$data['view_content'] =  'profile/company_profile_view';
		$data['view'] = 'company_profile_edit';
		
		
		$config_validation=array([
				'field' => 'name',
				'label' => 'Company Name',
				'rules' => 'required'
		],[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email'
		],[
				'field' => 'website',
				'label' => 'Web site url',
				'rules' => 'required|valid_url'
		],[
				'field' => 'country',
				'label' => 'Country',
				'rules' => 'required'
		],[
				'field' => 'industry',
				'label' => 'Industry',
				'rules' => 'required'
		],[
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'required|min_length[20]'
		],[
				'field' => 'phoneNum',
				'label' => 'Phone number',
				'rules' => 'required|integer|min_length[9]'
		]);
		
		$this->form_validation->set_rules($config_validation);
		
		if($this->form_validation->run() == false){
			$this->load->view('inc/main',$data);
		}else{
			try {
				$this->company->updateProfile($company_id);
				$this->session->set_flashdata('msg','Your Profile updated successfully');
				redirect(base_url('profile/company/' . $company_id));
			}catch (database_exception $e){
				$this->session->set_flashdata('Err_msg',$e->getMessage());
				redirect(base_url('profile/company/' . $company_id));
			}catch (Exception $e){
				$this->session->set_flashdata('Err_msg','Server Error Please try again later or Contact Admin');
				redirect(base_url('profile/company/' . $company_id));
			}
		}
		
	}
	
	
	/**
	 * Edit Company Profile photo 
	 * @param unknown $company_id
	 */
	public function edit_Profile_photo($company_id){
		$data['company']      =  $this->user->getSignleCompany($company_id);
		
		if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])){
			
			$path = './upload/company_logo';
			$fieldName = 'logo';
			$result = $this->myupload->upload_img($path , $fieldName);
			if(!empty($result)){
				try{
					$this->company->updateLogo($result,$company_id);
					$this->session->set_flashdata('msg','Your Profile updated successfully');
					redirect(base_url('profile/company/' . $company_id));
					
				}catch (database_exception $e){
					
					$this->session->set_flashdata('Err_msg',$e->getMessage());
					redirect(base_url('profile/company/' . $company_id));
					
				}catch (Exception $e){
					$this->session->set_flashdata('Err_msg','Server Error please try again later.');
					redirect(base_url('profile/company/' . $company_id));
				}
				
			}else{
				$this->session->set_flashdata('Err_msg','No Data has been uploaded try again.');
				redirect(base_url('profile/company/' . $company_id));
			}
			
			
		}else{
			
			$data['title']		  =  "Edit Profile";
			
			$data['view_content'] =  'profile/company_profile_view';
			$data['view']         = 'company_profile_photo_edit';
			$this->load->view('inc/main',$data);
			
		}
		
			
			
		
		
		
		
	}

	
}