<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Company Model
 * Handle Job functionality 
 * with database
 * @author marwan
 *
 */
class Company extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * Add new job to the database
	 */
	public function add_job(){
		if($this->session->has_userdata('user_id')){
			$company_id = $this->session->user_id;
			$title = $this->input->post('title');
			$requiredSkills = $this->returnSkills('required_skills');
			$niceSkills = $this->returnSkills('nice_skills');
			$description = $this->input->post('description');
			$requiredSkills .'<br>' . $niceSkills;
			
			$data = [
					'title'  => $title,
					'description' => $description,
					'required_skills' => $requiredSkills,
					'nice_to_have_skills' => $niceSkills,
					'company_id'      => $company_id
			];
			
			if(!$this->db->insert('jobs',$data)){
				throw new database_exception('Database Error try again');
			}
			
		}else{
			throw new database_exception('your not register contact Admin');
		}
	}
	
	private function returnSkills($skills_type){
		$skills = $this->input->post($skills_type);
		$newElment = '';
		$i = 1;
		while($i < 10){
			$newElment = $this->input->post($skills_type . $i);
			if($newElment != null){
				$skills = $skills . '|' . $newElment;
			}else{
				break;
			}
			$i++;
		}
		return $skills;
	}
}