<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Handle all search functionality
 * @author marwan
 * 
 */
use \database_exception as database_exception;
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
		
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		/*************************************************************/
		
		
		$data['title']		  =  "Job Search";
		$data['view_content'] = 'search';
		/************************Initialize Pagination ************/
		$this->pagination->initialize($config);
		
		
		
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
	
	
	public function countries(){
		/*
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		{
			exit;
		}*/
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
	
}