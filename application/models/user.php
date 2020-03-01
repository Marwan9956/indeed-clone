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
}