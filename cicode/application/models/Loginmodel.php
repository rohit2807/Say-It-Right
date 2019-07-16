<?php
class Loginmodel extends CI_Model{
    
    public function credcheck(){
        $arr['user_email'] = $this->input->post('email');
	    $arr['user_password'] = $this->input->post('pass');
	    return $this->db->get_where('users', $arr)->row();
    }
    
}

?>