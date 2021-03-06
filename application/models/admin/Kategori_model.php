<?php
class Kategori_model extends CI_Model{
	function __construct(){
		$this->load->database(); // Berfungsi untuk memanggil database
	}

	// Berfungsi untuk mengambil data pada tabel categories yang ada di database kita
	public function daftar_kategori() {
		$query = $this->db->query('SELECT * FROM categories');
	return $query->result_array();
	}

	public function tambah($data) {
		return $this->db->insert('categories', $data);
	}

	public function detail_kategori($id = FALSE) {
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

	public function delete_kategori($id) {
		$this->db->where('id', $id);
		return $this->db->delete('categories');
	}
}