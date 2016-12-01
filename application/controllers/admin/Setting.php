<?php if (!defined('BASEPATH')) exit('No dirrect script access allowed');
class Setting extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/user_model');
		$this->load->model('admin/setting_model');
	}

	public function index(){

		// Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('email')) {
			$queryuser = $this->user_model->login_user($this->session->userdata('email'));
		    $query = $this->kategori_model->daftar_kategori();
			$data = array('title' => 'About - ZetoAS',
			'user_det' => $queryuser,
			'detail' => $query,
			'isi' => 'admin/setting/about_view'
			);

		// Jika ada session user yang login maka akan dialihkan ke halaman dashboard
		$this->load->view('admin/layout/wrapper', $data);
		}
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/login');
		}

	}

}