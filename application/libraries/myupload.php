<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myupload {
	private  $CI = '';
	
	public function __construct(){
		$this->CI = & get_instance();
		$this->CI->load->library('upload');
	}
	/**
	 * upload_img
	 * @access private
	 * @param  url : path for storing img
	 * @param  fieldName : input file name
	 * @return string  of  img name  or empty string if there is no upload
	 */
	public function upload_img($url , $fieldName){
		/**
		 * setting upload configuration
		 * @var string $config
		 */
		//$CI = & get_instance();
		//$CI->load->library('upload');
		//$CI =& get_instance();
		
		
		$config['upload_path']= $url;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '2048';
		
		$this->CI->upload->initialize($config);
		if($this->CI->upload->do_upload($fieldName)){
			//store profile img
			$img_name = $this->CI->upload->data('file_name');
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
	public function upload_user_resume($path = './upload/user_resume' , $fieldName = 'resume'){
		/**
		 * setting upload configuration
		 * @var string $config
		 */
		$config['upload_path']= $path ;
		$config['allowed_types'] = 'pdf|docx';
		$config['max_size']     = '2048';
		
		//$CI = & get_instance();
		//$CI->load->library('upload');
		
		
		
		$this->CI->upload->initialize($config);
		//$CI->upload->initialize($config);
		if($this->CI->upload->do_upload($fieldName)){
			//store profile img
			$resume = $this->CI->upload->data('file_name');
			//$resume = $CI->upload->data('file_name');
		}else{
			$resume= '';
		}
		return $resume;
	}
}