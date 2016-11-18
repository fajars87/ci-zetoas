<?php if (! defined ('BASEPATH')) exit ('No direct script access allowed');
class Artikel extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/artikel_model');
		$this->load->model('admin/user_model');
	}

	public function index() {
        // Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('email')) {
			$queryuser = $this->user_model->login_user($this->session->userdata('email'));
		    $query = $this->artikel_model->daftar_artikel();
		    $data = array('title' 	=> 'Daftar Artikel - ZetoAS',
                    'user_det' => $queryuser,
					'artikel'	=> $query,
					'isi' 		=> 'admin/artikel/artikel_view');
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
            $this->form_validation->set_rules('judul','Judul','required');
            $this->form_validation->set_rules('ringkasan','Ringkasan','required');
            $this->form_validation->set_rules('isi','Isi artikel','required');

            if ($this->form_validation->run() === FALSE) {
                $data = array('title' 	=> 'Menambah Artikel - ZetoAS',
                                'user_det' => $queryuser,
                                'isi'	=> 'admin/artikel/tambah_artikel'
                                );
                $this->load->view('admin/layout/wrapper', $data);
            } else {

                $slug = date("dmY-") . url_title($this->input->post('judul'), 'dash', TRUE);
                $data = array (
                    'title' 			=> $this->input->post('judul'),
                    'slug' 				=> $slug,
                    'excerpt'			=> $this->input->post('ringkasan'),
                    'body'				=> $this->input->post('isi'),
					'category_id'		=> $this->input->post('id_kategori'),
                    'status'	=> $this->input->post('status_artikel'),
                    'author_id'			=> $this->input->post('id_user')
                    );
                $this->artikel_model->tambah($data);
                redirect(base_url().'admin/artikel/');
            }
        }
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/login');
		}
		} // END FUNGSI TAMBAH
	
	// Kode untuk menampilkan halaman edit dan meng-update artikel
	public function edit($id) {
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
		$this->form_validation->set_rules('isi', 'Isi Artikel','required');

		if ($this->form_validation->run() === FALSE) {
			$data['artikel']	= $this->artikel_model->detail_artikel();
			$data['detail']		= $this->artikel_model->detail_artikel($id);
			$data = array (
				'title' 	=> 'Update Artikel : '.$data['detail']['judul'],
				'artikel'	=> $this->artikel_model->detail_artikel(),
				'detail'	=> $this->artikel_model->detail_artikel($id),
				'isi'		=> 'admin/artikel/edit_artikel'
				);
			$this->load->view('admin/layout/wrapper', $data);
			// Jika tidak terjadi error maka artikel akan diupdate
		}else{
			$slug = url_title($this->input->post('judul'), 'dash', TRUE);
			$data = array (
				'id_artikel'		=> $this->input->post('id_artikel'),
				'judul'				=> $this->input->post('judul'),
				'slug'				=> $slug,
				'ringkasan'			=> $this->input->post('ringkasan'),
				'isi'				=> $this->input->post('isi'),
				'status_artikel'	=> $this->input->post('status_artikel'),
				'id_user'			=> $this->input->post('id_user')
				);
			$this->artikel_model->edit_artikel($data);
			redirect(base_url().'admin/artikel/');
		}		
	} // END FUNGSI MENAMPILKAN HALAMAN EDIT DAN UPDATE ARTIKEL

	// Kode untuk menghapus artikel
	public function delete($id) {
		$this->artikel_model->delete_artikel($id);
		redirect(base_url().'admin/artikel/');
	} // END FUNGSI DELETE

} // END CLASS ARTIKEL