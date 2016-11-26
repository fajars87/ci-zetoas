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
        $this->_validate();
        $slug = date("dmY-") . url_title($this->input->post('name'), 'dash', TRUE);
        $data = array(
                'name' => $this->input->post('name'),
                'slug' => $slug
            );
        $insert = $this->kategori_model->save($data);
        echo json_encode(array("status" => TRUE));
	} // END FUNGSI TAMBAH
	
	// Kode untuk menampilkan halaman edit dan meng-update artikel
	public function edit($id) {
        // Berfungsi untuk mengecek apakah ada session user yang login
		if ($this->session->userdata('email')) {
			$queryuser = $this->user_model->login_user($this->session->userdata('email'));
			$this->form_validation->set_rules('judul', 'Judul', 'required');
			$this->form_validation->set_rules('ringkasan', 'Ringkasan', 'required');
			$this->form_validation->set_rules('isi', 'Isi Artikel','required');

			if ($this->form_validation->run() === FALSE) {
				$data['artikel']	= $this->artikel_model->detail_artikel();
				$data['detail']		= $this->artikel_model->detail_artikel($id);
				$data = array (
					'title' 	=> 'Update Artikel : '.$data['detail']['title'],
                    'user_det' => $queryuser,
					'artikel'	=> $this->artikel_model->detail_artikel(),
					'kategori' => $this->user_model->kategori_model->daftar_kategori(),
					'detail'	=> $this->artikel_model->detail_artikel($id),
					'isi'		=> 'admin/artikel/edit_artikel'
					);
				$this->load->view('admin/layout/wrapper', $data);
				// Jika tidak terjadi error maka artikel akan diupdate
			}else{
				$slug = date("dmY-") . url_title($this->input->post('judul'), 'dash', TRUE);
				$data = array (
					'id'				=> $this->input->post('id_artikel'),
					'title' 			=> $this->input->post('judul'),
                    'slug' 				=> $slug,
                    'excerpt'			=> $this->input->post('ringkasan'),
                    'body'				=> $this->input->post('isi'),
					'category_id'		=> $this->input->post('id_kategori'),
                    'status'			=> $this->input->post('status_artikel'),
                    'author_id'			=> $this->input->post('id_user')
					);
				$this->artikel_model->edit_artikel($data);
				redirect(base_url().'admin/artikel/');
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
			$this->artikel_model->delete_artikel($id);
			redirect(base_url().'admin/artikel/');
        }
		else{
			// jika tidak ada maka akan dikembalikan ke halaman login
			redirect('admin/login');
		}
	} // END FUNGSI DELETE

        private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('name') == '')
        {
            $data['inputerror'][] = 'name';
            $data['error_string'][] = 'First name is required';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

} // END CLASS ARTIKEL