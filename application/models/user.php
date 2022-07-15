<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * User Model
 * Handle sign up and log in functionality 
 * with database
 * @author marwan
 *
 */
class User extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * Register new user 
	 * @param string $profile_img : holding profile_img name of the user
	 * @param string $resume      : holding resume name of the user
	 * @throws database_exception 
	 */
	public function signUp($profile_img = '' , $resume = ''){
		$firstName = $this->input->post('firstName');
		$lastName  = $this->input->post('lastName');
		$username  = $this->input->post('username');
		$password  = $this->input->post('password');
		$email     = $this->input->post('email');
		$country_code = $this->input->post('country');
		$company_id   = $this->input->post('company');
		$status    = $this->input->post('status');
		$phoneNum  = $this->input->post('phoneNum');
		
		//1-Check user name
		if($this->checkFieldName('users', 'username', $username)){
			throw new database_exception('Username is already been used try another name');
		}
		
		//1-Check user Email
		if($this->checkFieldName('users', 'email', $email)){
			throw new database_exception('Email is already been used try another name');
		}
		
		$data =[
				'first_name' => $firstName,
				'last_name'  => $lastName,
				'username'   => $username,
				'password'   => password_hash($password, PASSWORD_DEFAULT),
				'email'      => $email,
				'country_code' => $country_code,
				'phone_number' => $phoneNum,
				'resume_url'   => $resume,
				'profile_img'  => $profile_img,
				'company_id'   => $company_id,
				'current_status_id' => $status
		];
		
		if(!$this->db->insert('users',$data)){
			throw new database_exception("Database Error try again you didn't register ");
			die();
		}
		
		
	}
	
	/**
	 * Register new Company
	 * @param string $logo : holding logo img name of the user
	 * 
	 * @throws database_exception
	 */
	public function signUpCompany($logo = ''){
		
		$name      = $this->input->post('name');
		$password  = $this->input->post('password');
		$email     = $this->input->post('email');
		$website   = $this->input->post('website');
		$phoneNum  = $this->input->post('phoneNum');
		$emp_count = $this->input->post('emp_count');
		$country_code = $this->input->post('country');
		$industry    = $this->input->post('industry');
		$description = $this->input->post('description');
		
		//1-Check Company name
		if($this->checkFieldName('company', 'name', $name)){
			throw new database_exception('Comapny name is already been used submit another value');
		}
		
		if($this->checkFieldName('company', 'email', $email)){
			throw new database_exception('Email is already been used submit another value');
		}
		
		$data =[
				'name'       => $name,
				'password'   => password_hash($password, PASSWORD_DEFAULT),
				'logo_url'   => $logo,
				'description'   => $description,
				'email'      => $email,
				'website_url'   => $website,
				'phone_number' => $phoneNum,
				'country_code' => $country_code,
				'industry_id'  => $industry,
				'employee_count'  => $emp_count
		];
		
		if(!$this->db->insert('company',$data)){
			throw new database_exception("Database Error try again you didn't register ");
		}
	}
	
	
	/**
	 * Check Field Name: check agasint user submitted value if it is unique
	 * @param string  $tableName
	 * @param string  $fieldName
	 * @param string  $submitValue
	 * @return row or null if there is no value
	 */
	private function checkFieldName($tableName,$fieldName,$submitValue){
		$this->db->select('id');
		$this->db->from($tableName);
		$this->db->where($fieldName,$submitValue);
		$query = $this->db->get();
		return $query->row();
	}
	
	/**
	 * login function : handle login functionality
	 * @param  0
	 * @return true if user login and setting user data user data session 
	 * @throws database exception
	 */
	public function login(){
		$result ="";
		$userType = $this->input->post("userType");
		$tableName = "";
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		
		if($userType == "employee"){
			$tableName = "users";
		}else if($userType == "company"){
			$tableName = "company";
		}else{
			throw new database_exception("You Provide Wrong user Type try again with correct value");
		}
		
		$this->db->select("*");
		$this->db->from($tableName);
		$this->db->where("email" , $email);
		$query = $this->db->get();
		$result = $query->row();
		
		if($result){
			if(password_verify($password,$result->password)){
				$this->session->set_userdata('user_type', $userType);
				$this->setUserData($result);
				if($this->session->has_userdata('user_id')){
					return true;
				}else{
					throw new database_exception("Server Error please try again");
				}
			}else{
				throw new database_exception("You Provide Wrong user information try again");
			}
		}else{
			throw new database_exception("You Provide Wrong user information try again");
		}
	}
	
	/**
	 * login function : handle logout functionality
	 * @param  0
	 * @return true if user logout and destroy  user data session
	 * @throws session exception
	 */
	public function logout(){
		$data = [
				'user_type',
				'user_id',
				'first_name',
				'last_name',
				'username',
				'email',
				'country_code',
				'phone_number',
				'resume_url',
				'profile_img',
				'company_id',
				'current_status_id',
				'register_time'
		];
		$this->session->unset_userdata($data);
		if($this->session->has_userdata('user_id')){
			throw new session_exception("We couldn't log you out at the moment please try again .");
		}
	}
	
	/**
	 * setUserData : set user session information
	 * @param  $user object data from database 
	 * 
	 */
	private function setUserData($user){
		if($this->session->user_type == 'employee'){
			$data = [
					'user_id'    => $user->id,
					'first_name' => $user->first_name ,
					'last_name'  => $user->last_name,
					'username'   => $user->username,
					'email'      => $user->email,
					'country_code' => $user->country_code,
					'phone_number' => $user->phone_number,
					'resume_url'   => $user->resume_url,
					'profile_img'  => $user->profile_img,
					'company_id'   => $user->company_id,
					'current_status_id' => $user->current_status_id,
					'register_time' => $user->register_time
			];
		}else{
			$data = [
					'user_id'    => $user->id,
					'company_type'=> 'true',
					'name'       => $user->name ,
					'logo_url'   => $user->logo_url,
					'description'   => $user->description,
					'email'      => $user->email,
					'website_url'  => $user->website_url,
					'phone_number' => $user->phone_number,
					'country_code' => $user->country_code,
					'industry_id'  => $user->industry_id,
					'employee_count'  => $user->employee_count,
					'register_time' => $user->create_date
			];
			
		}
		$this->session->set_userdata($data);
		return ;
	}
	
	
	/**
	 * Update user Information
	 * @param $user_id
	 */
	public function updateSingleUser($user_id){
		
		$firstName = $this->input->post('firstName');
		$lastName  = $this->input->post('lastName');
		$username  = $this->input->post('username');
		$country_code = $this->input->post('country');
		$company_id= $this->input->post('company');
		$status_id = $this->input->post('status');
		$phoneNum  = $this->input->post('phoneNum');
		
		$data = [
				'first_name' => $firstName,
				'last_name'  => $lastName,
				'username'   => $username,
				'country_code' =>$country_code,
				'company_id'  => $company_id,
				'current_status_id' => $status_id,
				'phone_number' => $phoneNum
		];
		
		$this->db->where('id' , $user_id);
		if($this->db->update('users', $data)){
			
		}else{
			throw new database_exception("We couldn't update your data try again later or contact admin.");
		}
		
	}
	
	public function updateImg($imgName , $resumeName , $user_id){
		$this->db->where('id',$user_id );
		if(!empty($imgName) && !empty($resumeName)){
			$data = [
					'profile_img' => $imgName ,
					'resume_url'  => $resumeName
			];
		}else if(!empty($imgName) && empty($resumeName)){
			$data = [
					'profile_img' => $imgName 
			];
			
		}else if(empty($imgName) && !empty($resumeName)){
			$data = [
					'resume_url'  => $resumeName
			];
		}else{
			throw new database_exception("You didn't upload data try again.");
		}
		
		if($this->db->update('users' , $data )){
			return true;
		}else{
			throw new database_exception("We couldn't update your data  try again later or contact admin.");
		}
	}
	
	/**
	 * Change Password and Email for User
	 * @throws database_exception
	 */
	public function changePassword_email(){
		$user_id = $this->session->userdata('user_id');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		
		if($email == $this->session->userdata('email') && !empty($password)){
			$password = password_hash($password, PASSWORD_DEFAULT);
			$data = [
					'password' => $password
			];
		}elseif($email == $this->session->userdata('email') && empty($password)){
			return ;
		}elseif ($email !== $this->session->userdata('email') && empty($password)){
			if($this->checkFieldName('users', 'email', $email)){
				throw new database_exception('Email is already been used try another name');
			}else{
				$data = [
						'email'  => $email
				];
			}
		}
		$this->db->where('id' , $user_id);
		if($this->db->update('users',$data)){
			return;
		}else{
			throw new database_exception("We couldn't update your data right now please try again later or contact admin .");
		}
		
		/*
		//1-Check user Email
		if($this->checkFieldName('users', 'email', $email)){
			
		}*/
		
		
		
	}
	
	
	
	/**
	 * Get Signle User
	 * @return user object 
	 */
	
	public function getSignleUser($user_id){
		$this->db->select('users.id , first_name, last_name, username, users.email,users.country_code, countries.name as country_name , users.phone_number, users.resume_url, users.profile_img , users.company_id, current_status.name as current_status_name,users.current_status_id ,users.register_time');
		$this->db->from('users');
		$this->db->join('current_status', 'users.current_status_id = current_status.id' , 'inner');
		$this->db->join('countries', 'users.country_code = countries.code' , 'LEFT OUTER');
		$this->db->where('users.id' , $user_id);
		$query = $this->db->get();
		 $query = $query->row();
		 if($query){
		 	return $query;
		 }else{
		 	throw new database_exception('No User with this ID');
		 }
	}
	
	/**
	 * Get Company Name by id
	 * @param  $comp_id
	 * @return company name
	 */
	public function getCompanyName($comp_id){
		$this->db->select('name');
		$this->db->from('company');
		$this->db->where('id' , $comp_id);
		$query = $this->db->get();
		$query = $query->row();
		if($query){
			return $query->name;
		}
	}
	
	/**
	 * Get education list by 
	 * @param unknown $user_id
	 */
	public function getEducationByUser($user_id){
		$this->db->select('education_json');
		$this->db->from('educations');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		$query = $query->row();
		return $query;
	}
	
	/**
	 * Get Experience list by
	 * @param $user_id
	 */
	public function getExperienceByUser($user_id){
		$this->db->select('Experience_json');
		$this->db->from('experiences');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get();
		$query = $query->row();
		return $query;
	}
	
	
	/**
	 * Store Education for specific User
	 * @param int $user_id
	 * @param json $data
	 */
	public function storeEducation( $data ){
		$user_id  = $this->session->userdata('user_id');
		//check if there is a row with this user id 
		if($this->checkFieldName('educations', 'user_id', $user_id)){
			//update value
			$this->db->set('education_json', $data);
			$this->db->where('user_id', $user_id);
			if($this->db->update('educations')){
				return true;
			}else{
				throw new database_exception("We couldn't Update your data right now please try again later ");
			}
		}else{
			//Insert new Row 
			if($this->db->insert('educations',[
					'user_id'        => $user_id,
					'education_json' => $data
			])){
				return true;
			}else{
				throw new database_exception("We couldn't Store your data right now please try again later ");
			}
		}
		
	}
	
	/**
	 * Add New Experience OR Update it if it is there 
	 * @param  $data
	 * @throws database_exception
	 * @return boolean
	 */
	
	public function storeExperience($data){
		$user_id  = $this->session->userdata('user_id');
		//check if there is a row with this user id
		if($this->checkFieldName('experiences', 'user_id', $user_id)){
			//update value
			$this->db->set('Experience_json' , $data);
			$this->db->where('user_id', $user_id);
			if($this->db->update('experiences')){
				return true;
			}else{
				throw new database_exception("We couldn't Update your data right now please try again later ");
			}
		}else{
			//Insert new Row
			if($this->db->insert('`experiences',[
					'user_id'        => $user_id,
					'Experience_json' => $data
			])){
				return true;
			}else{
				throw new database_exception("We couldn't Store your data right now please try again later ");
			}
		}
	}
	
	
	/**
	 * Get Company Data For single Company
	 */
	public function getSignleCompany( $company_id){
		$this->db->select('company.id , company.name , company.logo_url  , company.description , company.email 
							, company.website_url , company.phone_number ,
							 countries.name as country_name,company.country_code  , industry.name as industry_name , company.industry_id,
							 company.employee_count , company.create_date');
		$this->db->from('company');
		$this->db->join('countries' , 'company.country_code = countries.code','inner');
		$this->db->join('industry' , 'company.industry_id = industry.id' , 'inner');
		$this->db->where('company.id' , $company_id);
		
		$query = $this->db->get();
		$query = $query->row();
		
		if($query){
			return $query;
		}else{
			throw new database_exception('No Company With this ID ');
		}
		
	}
	
	
	/**
	 * Return All Job posted by specific Company
	 * @param  $company_id
	 * @param  $limit
	 * @param  $offset
	 * @throws database_exception
	 * @return list of jobs by company_id 
	 */
	public function getJoblistByCompany($company_id , $limit , $offset){
		
		$this->db->select('jobs.id , jobs.title , jobs.company_id , jobs.create_date , COUNT(candidate.user_id) as candidate_count_indeed');
		$this->db->from('jobs');
		$this->db->join('candidate','jobs.id = candidate.job_id' , 'LEFT');
		$this->db->group_by('jobs.id');
		$this->db->where('company_id' , $company_id);
		$this->db->order_by('jobs.create_date');
		$this->db->limit($limit,$offset);
		$query = $this->db->get();
		$query = $query->result();
		if($query){
			
			return $query;
		}else{
			throw new database_exception('Database Error');
		}
	}
	
	
	/**
	 * Get Count number of jobs by company | For Pagination use 
	 * @param unknown $com_id
	 * @return unknown
	 */
	public function getCountJobsByCompany($com_id){
		$this->db->select('COUNT(id) as countJob');
		$this->db->from('jobs');
		$this->db->where('company_id', $com_id);
		$query = $this->db->get();
		$query= $query->row();
		return $query->countJob;
	}
	
	
	
	
}


