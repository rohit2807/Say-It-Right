<?php
class Confmodel extends CI_Model{
    
    public function fetch_conf(){
        
        $query = $this->db->get('conference');
        return $query->result();
    }
    
}

?>