<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Handle all search functionality
 * @author marwan
 * 
 */

class Search extends  CI_Controller{
	public  function __construct(){
		parent::__construct();
	}
	
	/**
	 * function : index    indeed/
	 * @access public 
	 * @param  0 
	 * @return return home page view of the site 
	 */
	public function index(){
		$data['title']		  =  "Indeed Clone";
		$data['view_content'] = 'home_page';
		$this->load->view('inc/main',$data);
	}
	
	public function search(){
		
	}
}