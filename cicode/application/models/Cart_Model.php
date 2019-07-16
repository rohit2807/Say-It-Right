<?php
class Cart_Model extends CI_Model{
    
    public function fetch_pro(){
        $query = $this->db->query("SELECT * FROM products WHERE p_id IN (" .implode(",",array_keys($_SESSION['cart'])).")");
        return $query->result();
    }
    
    public function punch_order(){
        $arr['o_email'] = $this->input->post('email');
	    $arr['o_fname'] = $this->input->post('fname');
	    $arr['o_lname'] = $this->input->post('lname');
	    $arr['o_address'] = $this->input->post('address');
	    $arr['o_apartment'] = $this->input->post('apt');
	    $arr['o_city'] = $this->input->post('city');
	    $arr['o_postal'] = $this->input->post('postal');
	    $arr['o_amount'] = $_SESSION['total'];
	    
	    $this->db->insert('orders', $arr);
    }   
}

?>