<?php 
//($_SERVER['HTTP_HOST']
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Handle all search functionality
 * @author marwan
 *
 */

class test extends  CI_Controller{
	public  function __construct(){
		parent::__construct();
	}
	
	public function index(){
		echo $_SERVER['HTTP_HOST'];
	}
}