<?php

/**
 * 
 */
class About_model extends CI_Model
{
    
    public function __construct() {
		$this->load->database();
	}

	public function about() {
		$query = $this->db->get_where('about', array('id' => '1'));
	return $query->row_array();
    }
}
