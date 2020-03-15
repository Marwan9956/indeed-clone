<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Company Model
 * Handle Job functionality 
 * with database
 * @author marwan
 *
 */
use \database_exception as database_exception;
class Jobs_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	
	/**
	 * get the total count of jobs in jobs Table
	 * @return int count of jobs
	 */
	public function jobsCountAll(){
		return $this->db->count_all('jobs');
	}
	
	/**
	 * get the total count of jobs by search query  
	 * @param string $q :query string
	 * @return int count of jobs
	 */
	public function jobsCount($q){
		$this->db->like('title',$q,'both');
		$this->db->order_by('create_date','DESC');
		$count = $this->db->get('jobs');
		$count = $count->num_rows();;
		return $count;
	}
	
	/**
	 * Get Jobs by query only 
	 * @param unknown $q
	 * @param unknown $limitCount
	 * @param unknown $offset
	 * @throws database_exception
	 * join($table, $cond[, $type = ''[, $escape = NULL]])
	 */
	public function getJobs($q, $country, $limitCount = 10, $offset = 0){
		$this->db->select('jobs.* , company.name as Company_Name , 
							company.country_code , countries.name as country_name');
		$this->db->from('jobs');
		$this->db->join('company','jobs.company_id =  company.id','INNER JOIN');
		$this->db->join('countries','company.country_code = countries.code');
		if($country !== ''){
			$this->db->where('countries.name',$country);
		}
		$this->db->like('jobs.title',$q,'both');
		$this->db->order_by('create_date','DESC');
		
		$this->db->limit( $limitCount , $offset);
		$query = $this->db->get();
		
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			throw new database_exception('no Jobs match your input .');
		}
		
	}
	
	
	/**
	 * Get Jobs by query only
	 * @param unknown $q
	 * @param unknown $limitCount
	 * @param unknown $offset
	 * @throws database_exception
	 * 
	 */
	public function getSingleJob($id){
		$this->db->select('jobs.* , company.name as Company_Name ,
							company.country_code , countries.name as country_name');
		$this->db->from('jobs');
		$this->db->join('company','jobs.company_id =  company.id','INNER JOIN');
		$this->db->join('countries','company.country_code = countries.code');
		$this->db->where('jobs.id',$id);
		$query = $this->db->get();
		
		if($query->num_rows() > 0 ){
			return $query->row();
		}else{
			throw new database_exception('no Jobs match your input .');
		}
		
	}
	
	/**
	 * Get All Countries Name
	 * @throws database_exception
	 * 
	 */
	public function getAllCountries($key){
		$this->db->select('name');
		$this->db->from('countries');
		$this->db->like('name',$key,'after');
		$this->db->limit(6);
		$this->db->order_by('name');
		$query = $this->db->get();
		if($query->result()){
			return $query->result();
		}else{
			throw new database_exception('No Countries');
		}
	}
}