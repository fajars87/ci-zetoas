<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('admin/login_model'); // Berfungsi untuk memanggil Login_model
	}

	// Berfungsi untuk menampilkan halaman login
	function index() { 
		$data=array('title'=>'Login Administrator',
		'isi' =>'admin/login_view');
		$this->load->view('admin/login_view',$data);
		}

	// Berfungsi untuk melakukan validasi login
	function validasi() { 
		$data=array(
			'email'=>$this->input->post('email'),
			'password'=>$this->input->post('password')
			);

		// Berfungsi untuk memanggil fungsi ambil_data pada class login_model
		$cek=$this->login_model->ambil_data($data);
		if($cek == 1) { // Berfungsi untuk mengecek kebenaran data login yang diinput (1 = true)

			// Berfungsi untuk menyimpan user data
			$sesi=$this->session->set_userdata($data);
			// Jika data yang dimasukkan valid maka akan redirect ke halaman Dashboard
			redirect('admin/dashboard');
		}else{ // Jika data yang diinput tidak valid maka akan dialihkan ke view login gagal
			$this->load->view('admin/login_gagal');
		}
		}

	// Berfungsi untuk menghapus session atau logout
	function logout() {
		session_destroy();
		redirect('admin/login');
		}	
}