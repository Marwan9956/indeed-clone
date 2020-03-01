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