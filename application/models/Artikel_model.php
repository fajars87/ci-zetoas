<?php
class Artikel_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	// Kode untuk menampilkan data artikel pada database
	public function daftar_artikel($read = FALSE) {
		if ($read === FALSE) {
			$query = $this->db->query('SELECT posts.id, posts.title, posts.excerpt, posts.slug as pslug, posts.created_at, users.name as uname, categories.name as cname, categories.slug as cslug FROM posts, users, categories WHERE posts.author_id = users.id && posts.category_id = categories.id && posts.status ="PUBLISHED" ORDER BY id DESC');
			return $query->result_array();
		}
        $query = $this->db->query('SELECT posts.id, posts.title, posts.body, posts.slug as pslug, posts.created_at, users.name as uname, categories.name as cname, categories.slug as cslug FROM posts, users, categories WHERE posts.author_id = users.id && posts.category_id = categories.id && posts.slug ='.'"'.$read.'"'.' ORDER BY id DESC');
		return $query->row_array();
	}
}