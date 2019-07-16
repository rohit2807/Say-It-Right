<?php
class Buyfromus_Model extends CI_Model{
    
    public function fetch_product(){
        $query = $this->db->get('products');
        return $query->result();
    }
    
}

?>