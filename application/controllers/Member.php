<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Handle all user functionality
 * @author marwan
 *
 */
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
		if($this->session->has_userdata('user_id')){
			redirect(base_url());
		}
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
	
	/**
	 * handle Job post route 
	 * @access public
	 * @param  0
	 * @return ///redirect
	 */
	public function jobpost(){
		/*
		 array(
						'field' => 'nice_skills',
						'label' => 'Nice skills',
						'rules' => 'required|min_length[6]'
				),
		 */
		$config = array(
				array(
						'field' => 'title',
						'label' => 'Job Title',
						'rules' => 'required|min_length[4]'
				),
				array(
						'field' => 'required_skills',
						'label' => 'Required Skills',
						'rules' => 'required|min_length[6]'
				),
				array(
						'field' => 'description',
						'label' => 'Description',
						'rules' => 'required|min_length[10]'
				)
		);
		
		$this->form_validation->set_rules($config);
		
		if(!$this->session->has_userdata('user_type')){
			$this->session->set_flashdata("Err_msg","Your not a member sign in first ");
			redirect(base_url());
		}else{
			if($this->session->user_type == "company"){
				if($this->form_validation->run() == false){
					$data['title']		  =  "Post new job";
					$data['view_content'] =  'job-post';
					$this->load->view('inc/main',$data);
				}else{
					//Add job 
					try{
						$this->company->add_job();
						$this->session->set_flashdata('msg','your job post added successfully');
						//Change direct to company profile page 
						redirect(base_url());
						
					}catch (database_exception $e){
						
						$this->session->set_flashdata('Err_msg',$e->getMessage());
						redirect(base_url('member/jobpost'));
						
					}catch (Exception $e){
						
						$this->session->set_flashdata('Err_msg','Server Error please try again later');
						redirect(base_url('member/jobpost'));
					}
					
				}
			}else{
				$this->session->set_flashdata("Err_msg","Your employee not a company only company can post a job .");
				redirect(base_url());
			}
		}
		
	}
}