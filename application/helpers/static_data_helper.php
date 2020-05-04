<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
/*
 *	CodeIgniter Const var helpers
 *
 *	@package Array Helper
 *	@author Marwan Saleh
 */



/*
 *	Categories
 *	return all categories in the categories table 	
 *
 * 	@access	public
 * 	
 *	@return categories object
 *
 */


function categories(){
	$CI =& get_instance();
	
}

/*
 *	countries
 * 	@access	public
 *
 *	@return array of  country object
 *
 */

function countries(){
	$CI =& get_instance();
	//return 
	$CI->db->select('*');
	$CI->db->from('countries');
	$CI->db->order_by('name');
	$qurey = $CI->db->get();
	return $qurey->result();
}

/*
 *	companies
 * 	@access	public
 *
 *	@return array of  company object
 *
 */

function companies(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('company');
	$CI->db->order_by('name');
	$qurey = $CI->db->get();
	return $qurey->result();
}

/*
 *	job Status 
 * 	@access	public
 *
 *	@return status object from status table
 *
 */
function status(){
	$CI = & get_instance();
	$CI->db->select('*');
	$CI->db->from('current_status');
	$CI->db->order_by('name');
	$query = $CI->db->get();
	return $query->result();
}

/*
 *	industries
 * 	@access	public
 *
 *	@return industry object contain all industry form DB
 *
 */
function industries(){
	$CI = & get_instance();
	$CI->db->select('*');
	$CI->db->from('industry');
	$CI->db->order_by('name');
	$query = $CI->db->get();
	return $query->result();
}




/*
 *  is User subscribed or Not
 * 
 */
function isUserSubscribe(){
	$CI = & get_instance();
	if($CI->session->has_userdata('user_id')){
		
		$user_id = $CI->session->userdata('user_id');
		$CI->db->select('*');
		$CI->db->from('subscription');
		$CI->db->where('user_id' , $user_id);
		$query = $CI->db->get();
		$query = $query->row();
		if($query != null){
			return true;
		}else{
			return false;
		}
		
	}else{
		return false;		
	}
}
