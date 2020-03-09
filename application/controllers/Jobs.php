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
	
	public function search(){
		$q = $this->input->get('q' , true);
		$city = $this->input->get('city' , true);
		$start = $this->input->get('start');
		
		/**
		 * Implement CI Pagintation Class  
		 * @var Ambiguous $config
		 */
		/*************************************************************/
		$config['per_page'] = 20;
		$config['page'] = $this->input->get('start');
		$config['enable_query_strings']= true;
		$config['page_query_string'] = true;
		$config['query_string_segment'] = 'start';
		$config['total_rows'] = $this->jobs_model->jobsCount($q);
		$config['base_url'] = base_url('jobs/search?&q='. $q.'&city='. $city );
		
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		/*************************************************************/
		
		$data['jobs'] = $this->jobs_model->getJobs($q,$config['per_page'],$start);
		
		/************************Initialize Pagination ************/
		$this->pagination->initialize($config);
		
		
		
		if($q == ''){
			redirect(base_url());
			
			/**********************REMOVE **************/
		}else{
			//implement Search 
			try{
				//$data = $this->jobs_model->getJobs($q, $config['per_page'] , $start);
				$data['title']		  =  "Job Search";
				$data['view_content'] = 'search';
			
				$this->load->view('inc/main-no-container',$data);
				
				//echo $this->pagination->create_links();
			}catch (database_exception $e){
				
			}catch (Exception $e){
				
			}
		}
	}
	
}