<?php
class Menu_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function menu() {
		$query = $this->db->query('SELECT * FROM menu_items ORDER BY menu_items.order');
	return $query->result_array();
    }

    function getMenu($parent,$hasil){
         $w = $this->db->query('SELECT * FROM menu_items WHERE parent_id="'.$parent.'" ORDER BY menu_items.order');
         foreach($w->result() as $h)
         {
                 $cek_parent=$this->db->query("SELECT * from menu_items WHERE parent_id=".$h->id."");
         if(($cek_parent->num_rows())>0){
                $hasil .= '<li class="dropdown"><a href="'.$h->url.'" class="dropdown-toggle" data-toggle="dropdown">'.$h->title.' &nbsp;<b class="caret"></b></a> ';
                }
          else {
                        $hasil.='<li><a href="'.$h->url.'">'.$h->title.'</a></li>';
                        }
                                $hasil .='<ul class="dropdown-menu">';
                                $hasil = $this->getMenu($h->id,$hasil);
                                $hasil .='</ul>';              
                                $hasil .= "</li></li>";
         }
         return str_replace('<ul class="dropdown-menu"></ul>','',$hasil);
     }           
     
     // fungsi untuk menampilkan menu yang di klik
     public function read($id){
        $this->db->where('id',$id);
        $sql_menu=$this->db->get('menu_items');
            if($sql_menu->num_rows()==1){
                return $sql_menu->row_array();   
            }        
        }



    public function auser() {
		$query = $this->db->get_where('users', array('id' => '1'));
	return $query->row_array();
    }
}