<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventlist extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library(array('session','form_validation'));
        $this->load->model('Eventmodel');
    }
	
	public function index()
	{
	    $this->load->helper('url');
        $this->load->model('Eventmodel');
	    $data['event'] = $this->Eventmodel->fetch_event();
	    $this->load->view('eventlist', $data);
		

	}
	    
	
}
?>