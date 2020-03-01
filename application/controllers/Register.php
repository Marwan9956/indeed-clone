<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends  CI_Controller{
	public  function __construct(){
		parent::__construct();
		$this->load->library('upload');
	}
	
	/**
	 * handle signup page
	 * @access public
	 * @param  0
	 * @return redirect to success sign up or same page
	 *  with the error message 
	 */
	public function index(){
		$data['title']		  =  "Sign up";
		$data['view_content'] =  'register';
		$this->load->view('inc/main',$data);
	}
	
	/**
	 * employee : handle signup of new user of type employee
	 * @access public
	 * @param   0
	 * @return  true of success or error message 
	 */
	public function employee(){
		/**
		 * Setting validation rules 
		 * @var array $config_validation
		 */
		
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
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]'
		],[
				'field' => 'conPassword',
				'label' => 'confirm password',
				'rules' => 'matches[password]'
		],[
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|valid_email'
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
		
		if($this->form_validation->run() == false){
			$data['title']		  =  "Join ";
			$data['view_content'] =  'register_employee';
			$this->load->view('inc/main',$data);
		}else{
			//success
			try{
				$this->checkFormatFile();
				$profile_img = $this->upload_img('./upload/user_profile','profile_img');
				$resume      = $this->upload_user_resume();
				$this->user->signUp($profile_img,$resume);
				$this->session->set_flashdata('msg','You have registed successfully');
				redirect(base_url());
			}catch(upload_exception $e){
				$this->session->set_flashdata('Err_msg',$e->getMessage());
				redirect(base_url('register/employee'));
			}catch (database_exception $e){
				$this->session->set_flashdata('Err_msg',$e->getMessage());
				redirect(base_url('register/employee'));
			}catch (Exception $e){
				$this->session->set_flashdata('Err_msg','Server Error please try again ');
				redirect(base_url('register/employee'));
			}
		}
		
	}
	
	/**
	 * comapny : handle signup of new user of type company
	 * @access public
	 * @param   0
	 * @return  true of success or error message
	 */
	public function company(){
		/**
		 * Setting validation rules
		 * @var array $config_validation
		 */
		
		$config_validation=array([
				'field' => 'name',
				'label' => 'Company Name',
				'rules' => 'required'
		],[
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[6]'
		],[
				'field' => 'conPassword',
				'label' => 'Confirm password',
				'rules' => 'matches[password]'
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
		
		//$this->form_validation->set_rules($config_validation);
		$this->form_validation->set_rules('name','Name','required');
		if($this->form_validation->run() == false){
			
			$data['title']		  =  "Join As Company";
			$data['view_content'] =  'register_company';
			$this->load->view('inc/main',$data);
			
		}else{
			//success
			
			try{
				
				$logo= $this->upload_img('./upload/company_logo','logo');
				$this->user->signUpCompany($logo);
				$this->session->set_flashdata('msg','You have registed successfully');
				redirect(base_url());
				
			}catch(upload_exception $e){
				
				$this->session->set_flashdata('Err_msg',$e->getMessage());
				redirect(base_url('register/employee'));
				
			}catch (database_exception $e){
				
				$this->session->set_flashdata('Err_msg',$e->getMessage());
				redirect(base_url('register/employee'));
				
			}catch (Exception $e){
				
				$this->session->set_flashdata('Err_msg','Server Error please try again ');
				redirect(base_url('register/employee'));
			}
			
		}
	}
	
	
	
	/**
	 * upload_img
	 * @access private
	 * @param  url : path for storing img
	 * @param  fieldName : input file name 
	 * @return string  of  img name  or empty string if there is no upload
	 */
	private function upload_img($url , $fieldName){
		/**
		 * setting upload configuration
		 * @var string $config
		 */
		$config['upload_path']= $url;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '2048';
		
		$this->upload->initialize($config);
		if($this->upload->do_upload($fieldName)){
			//store profile img
			$img_name = $this->upload->data('file_name');
		}else{
			$img_name= '';
		}
		return $img_name;
	}
	
	/**
	 * upload_user_resume: upload resume 
	 * @access private
	 * @param 0
	 * @return string  of resume  or empty string if there is no upload
	 */
	private function upload_user_resume(){
		/**
		 * setting upload configuration
		 * @var string $config
		 */
		$config['upload_path']= './upload/user_resume';
		$config['allowed_types'] = 'pdf|docx';
		$config['max_size']     = '2048';
		
		$this->upload->initialize($config);
		if($this->upload->do_upload('resume')){
			//store profile img
			$resume = $this->upload->data('file_name');
		}else{
			$resume= '';
		}
		return $resume;
	}
	
	
	/**
	 * check the uploaded file format 
	 * @throws upload_exception
	 */
	private function checkFormatFile(){
		if($_FILES['resume']['type'] != ''){
			if($_FILES['resume']['type'] == 'application/pdf'){
				//success
			}else{
				throw new upload_exception('Resume file must be in pdf format only ');
			}
		}
		if($_FILES['profile_img']['type'] != ''){
			if($_FILES['profile_img']['type'] == 'image/jpeg' || $_FILES['profile_img']['type'] == 'image/png'){
				//success
			}else{
				throw new upload_exception('Profile image file must be in jpg or png  format only ');
			}
		}
		
	}
}