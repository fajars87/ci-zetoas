<?php if(!defined('BASEPATH')) exit('No direct access allowed');

/**
 * 
 */
class About extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('about_model');
		$this->load->model('menu_model');
    }

    public function index() {
        
        $data['about'] = $this->about_model->about();
		$data = array('title'=>$data['about']['title'].' - Zeto-AS',
			'about'	    =>$this->about_model->about(), 
			'user_det'	=>$this->menu_model->auser(), 
			'menu'		=>$this->menu_model->menu(),
			'isi'		=>'home/about_view'
			);
		$this->load->view('layout/wrapper', $data);
	}
}
