<?php
class Contactmodel extends CI_Model{
    
    public function pushDetails(){
        $arr['c_phone'] = $this->input->post('c_phone');
	    $arr['c_fname'] = $this->input->post('c_fname');
	    $arr['c_lname'] = $this->input->post('c_lname');
	    $arr['c_message'] = $this->input->post('c_message');
	    
	    $this->db->insert('contact', $arr);
    }
}

?>