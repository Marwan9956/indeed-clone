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
		
	}
	
	
	public function user($user_id){
		//print_r($this->session->userdata());
		$data['title']		  =  "Profile";
		$data['view_content'] =  'profile/employee_profile_view';
		try{
			$data['user']         =  $this->user->getSignleUser($user_id);
			$data['user_Company'] =  $this->user->getCompanyName($data['user']->company_id);
			$data['education'] ='';
			$data['experience'] ='';
		}catch (database_exception $e){
			$data['error'] = $e->getMessage();
		}catch (Exception $e){
			$data['error'] ='Server Error Try again later';
		}
		
		$this->load->view('inc/main',$data);
	}
	
	public function user_add_education($education){
		
	}
	
	public function user_add_experience($experience){
		
	}
	
	public function company($comapny_id){
		$data['title']		  =  "Profile";
		$data['view_content'] =  'profile/company_profile_view';
		$this->load->view('inc/main',$data);
	}
	
}