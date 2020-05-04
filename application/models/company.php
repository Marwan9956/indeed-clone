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
	
	
	/**
	 * Update Job Post 
	 */
	public function updateJob($job_id){
		if($this->session->has_userdata('user_id')){
			
			$title = $this->input->post('title');
			
			 
			$requiredSkills = $this->returnSkills('required_skills');
			$niceSkills = $this->returnSkills('nice_skills');
			$description = $this->input->post('description');
			
			$data = [
					'title'  => $title,
					'description' => $description,
					'required_skills' => $requiredSkills,
					'nice_to_have_skills' => $niceSkills
			];
			
			$this->db->where('id', $job_id);
			if($this->db->update('jobs', $data)){
				return;
			}else{
				throw new database_exception("We couldn't update your data right now try again or cantact admin");
			}
			
		}else{
			throw new database_exception('You are not allowed to update Contatct admin');
		}
	}
	
	public function updateProfile($company_id){
		if($this->session->userdata('company_type') == 'true'  && $this->session->userdata('user_id') == $company_id){
			$company_name = $this->input->post('name');
			$company_email = $this->input->post('email');
			$website_url   = $this->input->post('website');
			$phoneNum      = $this->input->post('phoneNum');
			$emp_count     = $this->input->post('emp_count');
			$country_code  = $this->input->post('country');
			$industry      = $this->input->post('industry');
			$description   = $this->input->post('description');
			
			$data = [
					'name'  => $company_name,
					'email' => $company_email,
					'website_url' => $website_url,
					'phone_number' => $phoneNum,
					'country_code' => $country_code,
					'industry_id'  => $industry,
					'employee_count' => $emp_count,
					'description'    => $description
			];
			
			$this->db->where('id' , $company_id);
			if($this->db->update('company' , $data)){
				return ;
			}else{
				throw new database_exception("We couldn't update your profile please try again later or contact admin .");
			}
		}
	}
	
	public function updateLogo($url , $company_id){
		$this->db->where('id' , $company_id);
		if($this->db->update('company' , ['logo_url' => $url])){
			return true;
		}else{
			throw new database_exception("We couldn't update your Logo Right now please try again later or cantact Admin .");
		}
		
	}
	
	/**
	 * Delete Single Job
	 */
	
	public function delete($jobId){
		$this->db->where('id', $jobId);
		if($this->db->delete('jobs')){
			return true;
		}else{
			throw new database_exception("We couldn't delete job post right now try again later .");
		}
	}
	
	
	
	/**
	 * Helper function to add the skills sperated with | pipe
	 * @param string $skills_type
	 * @return string for skills
	 */
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