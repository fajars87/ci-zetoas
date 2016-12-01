<?php if (! defined ('BASEPATH')) exit ('No direct script access allowed');
class Kategori extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/user_model');
		$this->load->model('admin/kategori_model');
	}

	public function index() {
        // Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('email')) {
			$queryuser = $this->user_model->login_user($this->session->userdata('email'));
		    $query = $this->kategori_model->daftar_kategori();
		    $data = array('title' 	=> 'Daftar Kategori - ZetoAS',
                    'user_det' => $queryuser,
					'kategori'	=> $query,
					'isi' 		=> 'admin/kategori/kategori_view');
		    $this->load->view('admin/layout/wrapper', $data);
        }
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/login');
		}
	} // END FUNGSI INDEX

	// Kode untuk menambah artikel
	public function tambah() {
        // Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('email')) {
			$queryuser = $this->user_model->login_user($this->session->userdata('email'));
            $this->form_validation->set_rules('name','Name','required');

            if ($this->form_validation->run() === FALSE) {
                $data = array('title' 	=> 'Menambah Kategori - ZetoAS',
                                'user_det' => $queryuser,
                                'isi'	=> 'admin/kategori/tambah_kategori'
                                );
                $this->load->view('admin/layout/wrapper', $data);
            } else {

                $slug = date("dmY-") . url_title($this->input->post('name'), 'dash', TRUE);
                $data = array (
                    'name' 			=> $this->input->post('name'),
                    'slug' 				=> $slug
                    );
                $this->kategori_model->tambah($data);
                redirect(base_url().'admin/kategori/');
            }
        }
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/login');
		}
	} // END FUNGSI TAMBAH
	
	// Kode untuk menampilkan halaman edit dan meng-update artikel
	public function edit($id) {
        // Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('email')) {
			$queryuser = $this->user_model->login_user($this->session->userdata('email'));
			$this->form_validation->set_rules('name', 'Name', 'required');

			if ($this->form_validation->run() === FALSE) {
				$data['detail']		= $this->kategori_model->detail_kategori($id);
				$data = array (
					'title' 	=> 'Update Kategori : '.$data['detail']['name'],
                    'user_det' => $queryuser,
					'detail'	=> $this->kategori_model->detail_kategori($id),
					'isi'		=> 'admin/kategori/edit_kategori'
					);
				$this->load->view('admin/layout/wrapper', $data);
				// Jika tidak terjadi error maka artikel akan diupdate
			}else{
				$slug = date("dmY-") . url_title($this->input->post('name'), 'dash', TRUE);
				$data = array (
					'id'				=> $this->input->post('id'),
					'name' 				=> $this->input->post('name'),
                    'slug' 				=> $slug
					);
				$this->kategori_model->edit_kategori($data);
				redirect(base_url().'admin/kategori/');
			}	
        }
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/login');
		}	
	} // END FUNGSI MENAMPILKAN HALAMAN EDIT DAN UPDATE ARTIKEL

	// Kode untuk menghapus artikel
	public function delete($id) {
        // Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('email')) {
			$queryuser = $this->user_model->login_user($this->session->userdata('email'));
			$this->kategori_model->delete_kategori($id);
			redirect(base_url().'admin/kategori/');
        }
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/login');
		}
	} // END FUNGSI DELETE

} // END CLASS ARTIKEL