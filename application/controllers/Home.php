<?php if(!defined('BASEPATH')) exit('No direct access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
    
    public function __construct() {
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->model('about_model');
	}

    public function index() {
        $data = array('title'=>'Zeto-AS',
			'about' 	=>$this->about_model->about(), 
			'user_det'	=>$this->menu_model->auser(), 
			'menu'		=>$this->menu_model->menu()
			);
		$this->load->view('home/index_home',$data);
	}
}