<?php
class Artikel_model extends CI_Model {
	public function __construct() {
		$this->load->database(); // Untuk memanggil database
	}

	// Kode untuk menampilkan artikel
	public function daftar_artikel() {
		$query = $this->db->query(
			'SELECT posts.title, posts.status, posts.slug, 
			posts.id, posts.created_at, users.name 
			FROM posts, users WHERE posts.author_id = users.id 
			ORDER BY id DESC');
	return $query->result_array();
	}

	// Kode untuk menambah artikel baru
	public function tambah($data) {
		return $this->db->insert('posts', $data);
	}

	// Kode untuk menampilkan detail artikel
	public function detail_artikel($id = FALSE) {
		if ($id === FALSE) {
			$query = $this->db->get('posts');
			return $query->result_array();
		}
		$query = $this->db->get_where('posts', array('id' => $id));
		return $query->row_array();
	}

	// Kode untuk melakukan fungsi Update
	public function edit_artikel($data) {
		$this->db->where('id', $data['id']);
		return $this->db->update('posts', $data);
	}

	// Kode untuk melakukan fungsi Delete
	public function delete_artikel($id) {
		$this->db->where('is', $id);
		return $this->db->delete('posts');
	}

} // END CLASS ARTIKEL_MODEL