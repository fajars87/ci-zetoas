<?php
class Login_model extends CI_Model{
	function __construct(){
		$this->load->database(); // Berfungsi untuk memanggil database
	}

	// Berfungsi untuk mengambil data pada tabel user yang ada di database kita
	function ambil_data($data){		
		$user = $this->db->get_where('users',$data);	
		return $user->num_rows();
	}
}