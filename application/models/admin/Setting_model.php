<?php
class Kategori_model extends CI_Model{
	function __construct(){
		$this->load->database(); // Berfungsi untuk memanggil database
	}

	public function detail_kategori($id = 1) {
		if ($id === FALSE) {
			$query = $this->db->get('categories');
			return $query->result_array();
		}
		$query = $this->db->get_where('categories', array('id' => $id));
		return $query->row_array();
	}

	public function edit_kategori($data) {
		$this->db->where('id', $data['id']);
		return $this->db->update('categories', $data);
	}
}