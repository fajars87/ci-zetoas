<?php if(!defined('BASEPATH')) exit('No direct access allowed');

class Blog extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('artikel_model'); // Berfungsi untuk me-load Artikel_model.php
		$this->load->model('menu_model');
	}

	public function index() {
		$data = array('title'=>'Zeto-AS',
			'artikels'	=>$this->artikel_model->daftar_artikel1(),  
			'artikel'	=>$this->artikel_model->daftar_artikel(),  
			'cat'		=>$this->artikel_model->daftar_kategori(),  
			'user_det'	=>$this->menu_model->auser(), 
			'menu'		=>$this->menu_model->menu(),
			'isi'		=>'home/blog_view'
			);
		$this->load->view('layout/wrapper', $data);
	}

	// Fungsi untuk membaca artikel
	public function Read($read) {
		$data['artikels'] 	= $this->artikel_model->daftar_artikel1();
		$data['cat']		= $this->artikel_model->daftar_kategori();  
		$data['detail'] 	= $this->artikel_model->daftar_artikel($read);
		$data = array('title' => $data['detail']['title'],
				'artikels' 	=> $this->artikel_model->daftar_artikel1(),
				'cat'	=>$this->artikel_model->daftar_kategori(),  
				'detail'	=> $this->artikel_model->daftar_artikel($read), 
				'user_det'	=>$this->menu_model->auser(), 
				'menu'		=>$this->menu_model->menu(),
				'isi'		=> 'home/read_view'
				);
		$this->load->view('layout/wrapper', $data);
	}

	public function Kategori($read) {
		$data['artikels'] 	= $this->artikel_model->daftar_artikel1();
		$data['cat']		= $this->artikel_model->daftar_kategori();
		$data['detail'] 	= $this->artikel_model->kategori_artikel($read);
		$data = array('title' => $read,
				'artikels' 	=> $this->artikel_model->daftar_artikel1(),
				'cat'	=>$this->artikel_model->daftar_kategori(),  
				'artikel'	=> $this->artikel_model->kategori_artikel($read), 
				'user_det'	=>$this->menu_model->auser(), 
				'menu'		=>$this->menu_model->menu(),
				'isi'		=> 'home/blog_view'
				);
		$this->load->view('layout/wrapper', $data);
	}
}