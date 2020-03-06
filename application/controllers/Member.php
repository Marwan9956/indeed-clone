<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * indeed/member -> direct user to login function 
	 */
	
	public function index(){
		redirect(base_url("member/login"));
	}
	
	/**
	 * handle Login page
	 * @access public
	 * @param  0
	 * @return redirect
	 */
	public function login($userType = ""){
		//$config = [];
		
		$this->form_validation->set_rules("userType" , "user Type" ,"required");
		
		$config = array(
				array(
						'field' => 'userType',
						'label' => 'user Type',
						'rules' => 'required'
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'required'
				),
				array(
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'required|valid_email'
				)
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE){
			$data['title']		  =  "Login";
			$data['view_content'] =  'sign-in';
			$this->load->view('inc/main-no-header',$data);
		}else{
			//Handle login 
			try{
				$this->user->login();
				$this->session->set_flashdata("msg","You Log in successfully");
				redirect(base_url());
			}catch (database_exception $e){
				$this->session->set_flashdata("Err_msg",$e->getMessage());
				redirect(base_url("member/login"));
			}catch (Exception $e){
				$this->session->set_flashdata("Err_msg","Server Error try again .");
				redirect(base_url());
			}
		}
		
	}
	
	/**
	 * handle Logout page
	 * @access public
	 * @param  0
	 * @return redirect
	 */
	public function logout(){
		if(!$this->session->has_userdata('user_id')){
			$this->session->set_flashdata("Err_msg","Your not member to log out first sign in ");
			redirect(base_url("member/login"));
		}else{
			try{
				$this->user->logout();
				$this->session->set_flashdata("msg","You Log out successully ");
				redirect(base_url());
			}catch (session_exception $e){
				$this->session->set_flashdata("Err_msg",$e->getMessage());
				redirect(base_url());
			}catch (Exception $e){
				$this->session->set_flashdata("Err_msg","Server Error try again .");
				redirect(base_url());
			}
		}
		
	}
	
	
	public function jobpost(){
		
	}
}