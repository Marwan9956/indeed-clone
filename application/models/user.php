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
	 * Get Signle User
	 * @return user object 
	 */
	
	public function getSignleUser($user_id){
		$this->db->select('users.id , first_name, last_name, username, users.email, countries.name as country_name , users.phone_number, users.resume_url, users.profile_img , users.company_id, current_status.name as current_status_name ,users.register_time');
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
}


