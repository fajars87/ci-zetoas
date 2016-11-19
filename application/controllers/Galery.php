<?php if(!defined('BASEPATH')) exit('No direct access allowed');

/**
 * 
 */
class Galery extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
		$this->load->model('menu_model');
    }

    public function index() {
		$data = array('title'=>'Galery - Zeto-AS',
			'user_det'	=>$this->menu_model->auser(), 
			'menu'		=>$this->menu_model->menu(),
			'isi'		=>'home/galery_view'
			);
		$this->load->view('layout/wrapper', $data);
	}
}
