<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Handle all search functionality
 * @author marwan
 * 
 */

class Jobs extends  CI_Controller{
	
	public  function __construct(){
		parent::__construct();
		$this->load->model('jobs_model');
		$this->load->library("pagination");
	}
	
	/**
	 * function : index    indeed/
	 * @access public 
	 * @param  0 
	 * @return return home page view of the site 
	 */
	public function index($sq = ''){
		$data['title']		  =  "Indeed Clone";
		$data['view_content'] = 'home_page';
		$this->load->view('inc/main',$data);
	}
	
	
	/**
	 * /jobs/search
	 * implement Search functionality 
	 * @param string q  : a query string search variable
	 * @param string country
	 * 
	 * @return list jobs object 
	 */
	public function search(){
		$q = $this->input->get('q' , true);
		$country = $this->input->get('country' , true);
		$start = $this->input->get('start');
		
		/**
		 * Implement CI Pagintation Class  
		 * @var Ambiguous $config
		 */
		/*************************************************************/
		$config['per_page'] = 10;
		$config['page'] = $this->input->get('start');
		$config['enable_query_strings']= true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'start';
		$config['total_rows'] = $this->jobs_model->jobsCount($q);
		$config['base_url'] = base_url('jobs/search?&q='. $q.'&country='. $country);
		
		$config['full_tag_open'] = '<div class="pagination-links">';
		$config['full_tag_close'] = '</div>';

		$config['cur_tag_open'] = '<strong class="current-page-link">';
		$config['cur_tag_close'] = '</strong>';
		/*************************************************************/
		
		$data['totalJobsCount'] = $config['total_rows'];
		$data['lastPage']       = ceil(intval($config['total_rows']) / 10); 
		$data['title']		  =  "Job Search";
		$data['view_content'] = 'search';
		/************************Initialize Pagination ************/
		$this->pagination->initialize($config);
		
		//Set variable if user is subscribe or not
		
		if($q == ''){
			redirect(base_url());
			
			/**********************REMOVE **************/
		}else{
			//implement Search 
			try{
				$data['jobs'] = $this->jobs_model->getJobs($q , $country , $config['per_page'] , $start);
				$this->load->view('inc/main-no-container',$data);
			}catch (database_exception $e){
				$this->session->set_flashdata('Err_msg',$e->getMessage());
				$this->load->view('inc/main-no-container',$data);
				redirect(base_url());
			}catch (Exception $e){
				$this->session->set_flashdata('Err_msg','Server Error please try again ');
				redirect(base_url('register/employee'));
			}
		}
	}
	
	/**
	 * Return single job 
	 * @param job id  -> get Variables sent by ajax
	 */
	public function singleJob(){
		$job_id = $this->input->get('job_id');
		if(gettype(intval($job_id)) == 'integer'){
			try{
				$singleJob= $this->jobs_model->getSingleJob($job_id);
				//echo json_encode($singleJob);
				echo json_encode($singleJob);
			}catch (database_exception $e){
				http_response_code(404);
			}catch (Exception $e){
				http_response_code(404);
			}
			
		}else{
			echo 'No';
		}
	}
	
	
	/**
	 * Return Countries as json object for ajax request only
	 */
	public function countries(){
		/**
		 * Check if it is ajax request 
		 */
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
			// this is ajax request, do something
			try{
				$key = $this->input->get('key');
				if(!empty(trim($key) )){
					$countries = $this->jobs_model->getAllCountries($key);
					echo json_encode($countries);
				}
			}catch (database_exception $e){
				http_response_code(404);
			}catch (Exception $e){
				http_response_code(404);
			}
		}
		
		
		
	}
	
	/**
	 * Edit Single Job post
	 * @param int $job_id
	 */
	public function edit($job_id){
		$company_type =  $this->session->userdata('company_type');
		$user_id      =  $this->session->userdata('user_id');
		$job = $this->jobs_model->getSingleJob($job_id);
		$company_id_for_job = $job->company_id ;
		
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
						'field' => 'nice_skills',
						'label' => 'Nice skills',
						'rules' => 'required|min_length[6]'
				),
				array(
						'field' => 'description',
						'label' => 'Description',
						'rules' => 'required|min_length[20]'
				)
		);
		
		$this->form_validation->set_rules($config);
		
		
		
		
		if($company_type == 'true'  && $user_id == $company_id_for_job){
			if($this->form_validation->run() == false){
				$data['title']		  =  "Edit Post";
				$data['view_content'] =  'edit-job-post';
				$data['job']          =  $job;
				$this->load->view('inc/main',$data);
			}else{
				//Implement Update here 
				try{
					$this->company->updateJob($job_id);
					$this->session->set_flashdata('msg' , 'Job Post has been updated successfully');
					redirect(base_url('profile/company/') . $this->session->userdata('user_id'));
				}catch (database_exception $e){
					$this->session->set_flashdata('Err_msg' , $e->getMessage());
					redirect(base_url('profile/company/') . $this->session->userdata('user_id'));
					
				}catch (Exception $e){
					$this->session->set_flashdata('Err_msg' , 'Server Error');
					redirect(base_url('profile/company/') . $this->session->userdata('user_id'));
				}
			}
			
		}else{
			$this->session->set_flashdata('Err_msg' , 'You Are not allowed ');
			redirect(base_url());
		}
	}
	
	
	/**
	 * handle subscribing of user in job search
	 */
	public function subscribe(){
		$searchJob = $this->input->post('searchJob');
		$country   = $this->input->post('country');
		$url = base_url('jobs/search?q='. $searchJob .'&country=' . $country);
		if($searchJob != null){
			try{
				$this->jobs_model->subscribeUser();
				$this->session->set_flashdata('msg' , 'You Subscribed thank you we will inform you with new jobs .');
				redirect($url);
			}catch(database_exception $e){
				$this->session->set_flashdata('Err_msg' , $e->getMessage());
				redirect($url);
			}catch (Exception $e){
				$this->session->set_flashdata('Err_msg' , 'Server Error ');
				redirect($url);
			}
			
		}else{
			redirect($url);
		}
	}
	
	
	/**
	 * Delete job post 
	 */
	public function delete($job_id){
		$job          = $this->jobs_model->getSingleJob($job_id);
		$company_id_for_job = $job->company_id ;
		if($this->session->has_userdata('user_id')){
			if($this->session->userdata('user_type') === 'company' && $this->session->userdata('user_id') === $company_id_for_job){
				
				$url = base_url('profile/company?comId=' . $company_id_for_job); //http://localhost/indeed/profile/company?comId=1
				//delete job post
				try{
					
					$this->company->delete($job_id);
					$this->session->set_flashdata('msg' , 'Job Post deleted successuflly');
					redirect($url);
				}catch (database_exception $e){
					$this->session->set_flashdata('Err_msg' , $e->getMessage());
					redirect($url);
				}catch (Exception $e){
					$this->session->set_flashdata('Err_msg' , 'Server Error.');
					redirect($url);
				}
			}else{
				$this->session->set_flashdata('Err_msg',"You Are not allowed .");
				redirect(base_url());
			}
			
		}else{
			$this->session->set_flashdata('Err_msg',"You Are not allowed .");
			redirect(base_url());
		}
		
	}
}