<?php
class Eventmodel extends CI_Model{
    
    public function fetch_event(){
        
        $query = $this->db->get('event');
        return $query->result();
    }
    
}

?>