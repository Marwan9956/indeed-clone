<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Company Model
 * Handle Job functionality 
 * with database
 * @author marwan
 *
 */
class Jobs_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function jobsCountAll(){
		return $this->db->count_all('jobs');
	}
	
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
	 */
	public function getJobs($q, $limitCount = 10, $offset = 0){
		$this->db->select('*');
		$this->db->from('jobs');
		$this->db->like('title',$q,'both');
		$this->db->order_by('create_date','DESC');
		$this->db->limit( $limitCount , $offset);
		$query = $this->db->get();
		
		if($query->num_rows() > 0 ){
			return $query->result();
		}else{
			throw new database_exception('no Jobs match your input .');
		}
		
	}
}