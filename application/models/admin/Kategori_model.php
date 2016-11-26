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
}